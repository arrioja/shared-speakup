<?php

class class_board extends TPage
{
    protected $ancho = "25px";  // ancho de las imágenes que se muestran y de la celda que la contiene
    protected $alto = "25px"; // alto de las imágenes que se muestran y de la celda que la contiene
    protected $ancho_hora = "50px"; // ancho de la celda que dice "Hora"
    protected $ancho_encabezado = "75px";

    protected $lunes;
    protected $martes;
    protected $miercoles;
    protected $jueves;
    protected $viernes;
    protected $sabado;

    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
            $sesion=new THttpSession;
            $sesion->open();
            $proximo_lunes = $sesion['speakup_lunes'];
            $sesion->close();

            if (isset($proximo_lunes) && ($proximo_lunes <> '') && 
                     (checkdate($proximo_lunes[3].$proximo_lunes[4],$proximo_lunes[0].$proximo_lunes[1],
                                $proximo_lunes[6].$proximo_lunes[7].$proximo_lunes[8].$proximo_lunes[9]== true)))
            {
                $this->lunes = $proximo_lunes;
            }
            else
            {
                $this->lunes = $this->saber_lunes();
            }
            $this->martes = suma_dias($this->lunes, 1);
            $this->miercoles = suma_dias($this->lunes, 2);
            $this->jueves = suma_dias($this->lunes, 3);
            $this->viernes = suma_dias($this->lunes, 4);
            $this->sabado = suma_dias($this->lunes, 5);

            $misgrids = elabora_menu_grid($this);
            
            $this->construir_classboard();
          }
    }



    public function construir_classboard()
    {
        /* Colores:
         * Clase Nivel 1: #ffa800
         * Clase Nivel 2: #04b800
         * Clase Nivel 3: #ff1200
         * Tests        : #5c58ff
         * Grammar Class: #ffa6a6
         * Orange Class : #ff5400
         * Blocked      : #808080
         */
        $horas=array();
        $board=array();

        // $hora[dia][hora][salon]

        // hacer tres for anidados colocando valores predeterminados y luego cargar de la base los dias que tienen datos

        // Le coloco a todos unos valores predeterminados, color en blanco y imagen Blank (Free)
        for ($hora = 9 ; $hora <= 20 ; $hora++) {
            for ($dia = 0 ; $dia < 6 ; $dia++) {
                for ($salon = 1 ; $salon <= 3 ; $salon++) {
                    $board[$hora]['horas'] = $hora;
                    $board[$hora][$dia][$salon]['color'] = "";
                    $board[$hora][$dia][$salon]['imagen'] = 'blank.png';
                    $board[$hora][$dia][$salon]['nivel'] = "0";
                    $board[$hora][$dia][$salon]['tipo'] = "0";
                    $board[$hora][$dia][$salon]['cod_clase'] = "";
                }
            }
        }
        
        // Le coloco las horas del sabado desde las dos en Gris (Blocked)
        for ($hora = 14 ; $hora <= 20 ; $hora++) {
            for ($dia = 5 ; $dia < 6 ; $dia++) {
                for ($salon = 1 ; $salon <= 3 ; $salon++) {
                    $board[$hora][$dia][$salon]['color'] = "#808080";
                    $board[$hora][$dia][$salon]['imagen'] = ''; // si quiero que el link funcione, solo hay que asignarle una imagen 'blocked.png';
                }
            }
        }

        // Consulto la base de datos para ver las clases que se encuentran disponibles.

        $lunes = cambiaf_a_mysql($this->lunes);
        $sabado = cambiaf_a_mysql($this->sabado);
        $sql="select c.*, t.color, t.imagen
              from clases c, tipos_clases_nivel_imagen t
              where (fecha >= '$lunes') and (fecha <= '$sabado') and
                (t.cod_tipo = c.tipo) and (t.nivel = c.nivel)";
        $resultado=cargar_data($sql,$this);

        foreach ($resultado as $undato) {
            $hora = $undato['hora'];
            $salon = $undato['salon'];
            $fecha = cambiaf_a_normal($undato['fecha']);

            if (es_dia($fecha,1,0,0,0,0,0,0) == true)
                {$dia = 0;}
            else
                {if (es_dia($fecha,0,1,0,0,0,0,0) == true)
                    {$dia = 1;}
                 else
                     {if (es_dia($fecha,0,0,1,0,0,0,0) == true)
                        {$dia = 2;}
                      else
                          {if (es_dia($fecha,0,0,0,1,0,0,0) == true)
                              {$dia = 3;}
                           else
                               {if (es_dia($fecha,0,0,0,0,1,0,0) == true)
                                   {$dia = 4;}
                                else
                                    {if (es_dia($fecha,0,0,0,0,0,1,0) == true)
                                        {$dia = 5;}
                                    }
                               }
                          }
                     }
                }
                $board[$hora][$dia][$salon]['imagen'] = $undato['imagen'];
                $board[$hora][$dia][$salon]['color'] = $undato['color'];
                $board[$hora][$dia][$salon]['cod_clase'] = $undato['cod_clase'];
            }



        
        $this->repeater_horas->DataSource=$board;
        $this->repeater_horas->dataBind();




        
    }



    public function saber_lunes()
    {
        $hoy = date("d/m/Y");
        while (es_dia($hoy,1,0,0,0,0,0,0) <> true)
        {
            $hoy = suma_dias($hoy, -1);
        }
        $sesion=new THttpSession;
        $sesion->open();
        $sesion['speakup_lunes'] = $hoy;
        $sesion->close();
        return $hoy;
    }



    public function reservar_clase($sender, $param)
    {
        $hora = $sender->CommandParameter[0];
        $dia = $sender->CommandParameter[1];
        $salon = $sender->CommandParameter[2];
        $cod_clase = $sender->CommandParameter[3];
        $this->Response->redirect($this->Service->constructUrl('admin.clases.reservar_clase',array('hr'=>$hora,'dia'=>$dia,'salon'=>$salon,'cod_clase'=>$cod_clase)));

    }


/* Muestra el classboard de la siguiente semana a la que se encuentre*/
    public function ir_derecha($sender, $param)
    {
        $sesion=new THttpSession;
        $sesion->open();
        $este_lunes = $sesion['speakup_lunes'];
        $sesion->close();

            if (isset($este_lunes) && ($este_lunes <> '') &&
                     (checkdate($este_lunes[3].$este_lunes[4],$este_lunes[0].$este_lunes[1],
                                $este_lunes[6].$este_lunes[7].$este_lunes[8].$este_lunes[9]== true)))
        {
            $proximo_lunes = suma_dias($este_lunes, 7);
        }
        else
        {
            $proximo_lunes = $this->saber_lunes();
        }
        
        $sesion=new THttpSession;
        $sesion->open();
        $sesion['speakup_lunes'] = $proximo_lunes;
        $sesion->close();
        $this->Response->redirect($this->Service->constructUrl('admin.clases.class_board',null));
    }

/* Muestra el classboard de la siguiente semana a la que se encuentre*/
    public function ir_izquierda($sender, $param)
    {
        $sesion=new THttpSession;
        $sesion->open();
        $este_lunes = $sesion['speakup_lunes'];
        $sesion->close();

            if (isset($este_lunes) && ($este_lunes <> '') &&
                     (checkdate($este_lunes[3].$este_lunes[4],$este_lunes[0].$este_lunes[1],
                                $este_lunes[6].$este_lunes[7].$este_lunes[8].$este_lunes[9]== true)))
        {
            $proximo_lunes = suma_dias($este_lunes, -7);
        }
        else
        {
            $proximo_lunes = $this->saber_lunes();
        }

        $sesion=new THttpSession;
        $sesion->open();
        $sesion['speakup_lunes'] = $proximo_lunes;
        $sesion->close();
        $this->Response->redirect($this->Service->constructUrl('admin.clases.class_board',null));
    }

    public function ir_actual($sender, $param)
    {
        $proximo_lunes = $this->saber_lunes();
        
        $sesion=new THttpSession;
        $sesion->open();
        $sesion['speakup_lunes'] = $proximo_lunes;
        $sesion->close();
        $this->Response->redirect($this->Service->constructUrl('admin.clases.class_board',null));
    }

}
?>