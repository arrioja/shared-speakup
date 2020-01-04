<?php

class admin_turnos extends TPage
{

  private $arreglo_dias = array(1=>"Lunes", 2=>"Martes",3=>"Miércoles",4=>"Jueves",5=>"Viernes",6=>"Sábado");
  private $arreglo_horas = array(9=>"9 am",10=>"10 am",11=>"11 am",12=>"12 m",13=>"1 pm",14=>"2 pm",15=>"3 pm",16=>"4 pm",17=>"5 pm",18=>"6 pm",19=>"7 pm",20=>"8 pm",);
  private $arreglo_cupo = array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9, 10=>10,
                                11=>11, 12=>12, 13=>13, 14=>14, 15=>15, 16=>16, 17=>17, 18=>18, 19=>19, 20=>20,
                                21=>21, 22=>22, 23=>23, 24=>24, 25=>25, 26=>26, 27=>27, 28=>28, 29=>29, 30=>30,);
    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
             $this->drop_dias->DataSource=$this->arreglo_dias;
             $this->drop_dias->dataBind();

             
             $this->drop_horas->DataSource=$this->arreglo_horas;
             $this->drop_horas->dataBind();

             $this->drop_tipo->DataSource=tipos_clases($this);
             $this->drop_tipo->SelectedIndex = 0;
             $this->drop_tipo->dataBind();

             $this->drop_salon->DataSource=salones($this);
             $this->drop_salon->dataBind();

             $this->drop_cupo->DataSource=$this->arreglo_cupo;
             $this->drop_cupo->dataBind();

             $this->cambiar_nivel($this);
             $this->listar_clases($this);

 /*
  * Para saber dia de la semana
function dia_semana ($dia, $mes, $ano) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    return $dias[date("w", mktime(0, 0, 0, $mes, $dia, $ano))];
}
   */
              //$this->incluir->Visible = "False";
/*              if ((!isset($this->Request['hr'])) || (!isset($this->Request['dia'])) || (!isset($this->Request['salon'])) || 
                  (!isset($this->Request['cod_clase'])) || ($this->Request['hr'] == '') || ($this->Request['dia'] == '') ||
                  ($this->Request['salon'] == ''))
              { // si falta algunos de los datos, se envía de nuevo al classboard, con eso se asegura que se reserve con todos los datos.
                  $this->Response->redirect($this->Service->constructUrl('admin.clases.class_board',null));
              }
              else
              { // si se encuentran los datos, se coloca la información para mostrar.

                switch ($this->Request['dia']) {
                    case 0:  $dia = "Lunes"; break;
                    case 1:  $dia = "Martes"; break;
                    case 2:  $dia = "Miércoles"; break;
                    case 3:  $dia = "Jueves"; break;
                    case 4:  $dia = "Viernes"; break;
                    case 5:  $dia = "Sábado"; break;
                    default: $dia = "???????"; break;
                }

                  $sesion=new THttpSession;
                  $sesion->open();
                  $lunes = $sesion['speakup_lunes'];
                  $sesion->close();

                  $this->lbldia->Text = $dia;
                  $this->lblfecha->Text = suma_dias($lunes, $this->Request['dia']);
                  $this->lblhora->Text = $this->Request['hr'];
                  $this->lblsalon->Text = $this->Request['salon'];
                  $this->lblcodclase->Text = $this->Request['cod_clase'];

//                  $this->drop_nivel->DataSource=niveles($this);
//                  $this->drop_nivel->dataBind();

                  $this->listar_alumnos($this);
             }*/ 
          }
    }


    public function listar_clases($sender)
    {
        $this->DataGrid_horas->DataSource = turnos_clases($sender);
        $this->DataGrid_horas->dataBind();
    }

    public function cambiar_nivel($sender)
    {
        $tipo = $this->drop_tipo->SelectedValue;
        $sql="Select t.nivel, t.descripcion
              From tipos_clases_nivel_imagen t
              Where (t.cod_tipo = '$tipo')";
        $resultado=cargar_data($sql,$sender);
        $this->drop_nivel->DataSource=$resultado;
        $this->drop_nivel->dataBind();
    }

    public function comprobar_cedula($sender, $param)
    {
/*        $cedula = $this->txt_cedula->Text;
        $sql="Select e.cedula, e.nombres, e.apellidos, e.nivel_actual
              From estudiantes e
              Where (e.cedula = '$cedula')";
        $resultado=cargar_data($sql,$sender);
        if (!empty($resultado))
        {
            $this->cambiar_nivel($sender); // para que tome los valores predeterminados
            $this->incluir->Visible = "True";
            $this->lblnombre->Text = $resultado[0]['nombres'].' '.$resultado[0]['apellidos'];
            $nivel_actual = $resultado[0]['nivel_actual'];

            $cod_clase = $this->lblcodclase->Text;
            $sql="Select c.nivel, c.tipo
                  From clases c
                  Where (c.cod_clase = '$cod_clase')";
            $resultado=cargar_data($sql,$sender);

            if (!empty($resultado))
            {
                $this->drop_tipo->SelectedValue = $resultado[0]['tipo'];
                $this->drop_nivel->SelectedValue = $resultado[0]['nivel'];
            }
            else
            {
                $sql="Select n.id
                      From niveles n
                      Where (n.nivel = '$nivel_actual')";
                $resultado=cargar_data($sql,$sender);
                $this->drop_nivel->SelectedValue = $resultado[0]['id'];

            }
        }
        else
        {
            $this->lblnombre->Text = "El número de cédula no se encuentra registrado.";
            $this->incluir->Visible = "False";
        }
*/
    }

    public function itemCreated($sender,$param)
    {
        $item=$param->Item;
        if($item->ItemType==='Item' || $item->ItemType==='AlternatingItem')
        {
            if ($sender->ID == "DataGrid_horas"){
                // añade confirmación al boton de finalizar publicación
                $item->detalle2->finaliza2->Attributes->onclick='if(!confirm(\'Eliminar este turno/horario creado?\')) return false;';
            }
        }
    }

    public function formatear($sender, $param)
    {
        $item=$param->Item;
        if ($item->ItemType=='Item' || $item->ItemType=='AlternatingItem')
        {
            $item->desde->Text = cambiaf_a_normal($item->desde->Text);
            $item->hasta->Text = cambiaf_a_normal($item->hasta->Text);
            $item->dia->Text = $this->arreglo_dias[$item->dia->Text];
            $item->hora->Text = $this->arreglo_horas[$item->hora->Text];
            if ($item->cupo_disp->Text == 0)
            {
                $item->cupo_disp->BackColor="#ff6363";
            }
            else
            {
                $item->cupo_disp->BackColor="#85ff8b";
            }
            if ($item->cupo_disp->Text < $item->cupo_max->Text)
            {
                $item->detalle2->finaliza2->Visible = False;
            }
        }
    }


    public function vaciar()
    {
        $this->listar_clases($this);
        $this->fecha_desde->Text = "";
        $this->fecha_hasta->Text = "";
        $this->drop_tipo->SelectedIndex = 0;
        $this->cambiar_nivel($this);
        $this->drop_dias->SelectedIndex = 0;
        $this->drop_horas->SelectedIndex = 0;
        $this->drop_salon->SelectedIndex = 0;
    }

    public function incluir_horario($sender, $param)
    {
        if ($this->IsValid)
        {
            $desde = cambiaf_a_mysql($this->fecha_desde->Text);
            $hasta = cambiaf_a_mysql($this->fecha_hasta->Text);
            $tipo = $this->drop_tipo->SelectedValue;
            $nivel = $this->drop_nivel->SelectedValue;
            $dia = $this->drop_dias->SelectedValue;
            $hora = $this->drop_horas->SelectedValue;
            $salon = $this->drop_salon->SelectedValue;
            $cupo = $this->drop_cupo->SelectedValue;

            $cod_turno = proximo_numero('turnos_clases','cod_turno',null,$sender);  // codigo de la clase

            $sql="insert into speakup.turnos_clases (cod_turno, desde, hasta, dia, hora, cedula_profesor,
                                                     status, observacion, nivel, tipo, cod_salon, cupo_max, cupo_disp)
                  values ('$cod_turno','$desde','$hasta','$dia','$hora','','ACTIVA','','$nivel','$tipo','$salon','$cupo','$cupo')";
            $result = modificar_data($sql,$sender);

            // se añaden cada una de las horas reservadas en el classboard.

            $numero_dias = num_dias_entre_fechas($this->fecha_desde->text,$this->fecha_hasta->text);
            $fecha = $this->fecha_desde->text;  // fecha de inicio de la comprobacion de conflictos
            $lu = 0; $ma = 0; $mi = 0; $ju = 0; $vi = 0; $sa = 0; $do = 0;  // valores iniciales para luego ver que dia es el seleccionado
//     $conflicto = false; // se asume que no hay problema.



//            $adicionales = array('hora' => $hora,
//                                 'salon' => $salon);

            

             switch ($dia) {
                 case 1:  $lu = 1; break;
                 case 2:  $ma = 1; break;
                 case 3:  $mi = 1; break;
                 case 4:  $ju = 1; break;
                 case 5:  $vi = 1; break;
                 case 6:  $sa = 1; break;
             }

             while ($numero_dias >= 0)
             {
                if (es_dia($fecha,$lu,$ma,$mi,$ju,$vi,$sa,$do) == true)
                { // si es la fecha es del dia que se quiere verificar, se busca en la bd a ver si hay clases en ese salon en ese dia y a esa hora
                    $fecha2 = cambiaf_a_mysql($fecha);
                    $cod_clase = proximo_numero('clases','cod_clase',null,$sender);  // codigo de la clase
                    // se inserta el registro en el classboard.
                    $sql="insert into speakup.clases (cod_clase, cod_turno, fecha, hora, cedula_profesor, status_clase, observacion, nivel, tipo, salon)
                          values ('$cod_clase','$cod_turno','$fecha2','$hora','','PENDIENTE','','$nivel','$tipo','$salon')";
                    $result = modificar_data($sql,$sender);

        //            if (verificar_existencia('speakup.clases','fecha',$fecha2,null,$this))
         //           {
        //                $conflicto = true;
        //            }

                }
                $fecha = suma_dias($fecha, 1);
                $numero_dias = $numero_dias -1;
             }




            $this->vaciar();

        }



/*

            $sql="insert into speakup.clases (cod_clase, fecha, hora, cedula_profesor, status_clase, observacion, nivel, tipo, salon)
                  values ('$cod_clase','$fecha','$hora','','PENDIENTE','','$nivel','$tipo','$salon')";
            $result = modificar_data($sql,$sender);

            // se registra el detalle de la clase

            $sql2="insert into detalle_clases (cod_clase, cedula)
                   values ('$cod_clase','$cedula') ";

            if (modificar_data($sql2,$sender))
            {
                $this->mensaje->setSuccessMessage($sender, "Se ha reservado la Clase!");
            }
            else
            {
                $this->mensaje->setErrorMessage($sender, 'No se pudo reservar la Clase');
            }

            // luego de la inclusión se limpian los valores
            $this->lblcodclase->Text = $cod_clase;
            $this->listar_alumnos($sender);
            $this->lblnombre->Text = "Coloque la Cédula y presione ENTER";
            $this->txt_cedula->Text = '';
            $this->drop_tipo->SelectedIndex = 0;
            $this->drop_nivel->SelectedIndex = 0;
            $this->incluir->Visible = "False";

        }
        else
        { $cod_clase = $this->lblcodclase->Text;

          $sql2="insert into detalle_clases (cod_clase, cedula)
                 values ('$cod_clase','$cedula') ";
          if (modificar_data($sql2,$sender))
          {
              $this->mensaje->setSuccessMessage($sender, "Se ha reservado la Clase!");
          }
          else
          {
              $this->mensaje->setErrorMessage($sender, 'NO se pudo reservar la Clase');
          }
          
          $this->listar_alumnos($sender);
          $this->lblnombre->Text = "Coloque la Cédula y presione ENTER";
          $this->txt_cedula->Text = '';
          $this->drop_tipo->SelectedIndex = 0;
          $this->drop_nivel->SelectedIndex = 0;
          $this->incluir->Visible = "False";
        }
*/

    }

    public function eliminar_hora($sender,$param)//sin revisar
    {
        $id=$sender->CommandParameter;
        $sql="DELETE FROM turnos_clases WHERE id = '$id'";
        $resultado=modificar_data($sql,$this);

/*        $cod_clase = $this->lblcodclase->Text;
        $sql="Select d.id
              From detalle_clases d
              Where (d.cod_clase = '$cod_clase')";
        $resultado=cargar_data($sql,$sender);
        if (empty($resultado))
        {
            $sql="DELETE FROM clases WHERE cod_clase = '$cod_clase'";
            $resultado=modificar_data($sql,$sender);
            $this->Response->redirect($this->Service->constructUrl('admin.clases.class_board'));
        }
*/
        $this->listar_clases($sender);
    }

    public function cancelar_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('admin.clases.class_board'));
    }


   function verifica_conflicto($sender,$param)
   {
     $numero_dias = num_dias_entre_fechas($this->fecha_desde->text,$this->fecha_hasta->text);
     $fecha = $this->fecha_desde->text;  // fecha de inicio de la comprobacion de conflictos
     $lu = 0; $ma = 0; $mi = 0; $ju = 0; $vi = 0; $sa = 0; $do = 0;  // valores iniciales para luego ver que dia es el seleccionado
     $conflicto = false; // se asume que no hay problema.
     $dia = $this->drop_dias->SelectedValue;
     $hora = $this->drop_horas->SelectedValue;
     $salon = $this->drop_salon->SelectedValue;
            $adicionales = array('hora' => $hora,
                                 'salon' => $salon);

     switch ($dia) {
         case 1:  $lu = 1; break;
         case 2:  $ma = 1; break;
         case 3:  $mi = 1; break;
         case 4:  $ju = 1; break;
         case 5:  $vi = 1; break;
         case 6:  $sa = 1; break;
     }

     while (($numero_dias > 0) && ($conflicto == false))
     {
        if (es_dia($fecha,$lu,$ma,$mi,$ju,$vi,$sa,$do) == true)
        { // si es la fecha es del dia que se quiere verificar, se busca en la bd a ver si hay clases en ese salon en ese dia y a esa hora
            $fecha2 = cambiaf_a_mysql($fecha);
            if (verificar_existencia('speakup.clases','fecha',$fecha2,null,$this))
            {
                $conflicto = true;
            }

        }
        $fecha = suma_dias($fecha, 1);
        $numero_dias = $numero_dias -1;
     }

$this->error->Text = "Error en la fecha:".$numero_dias." - ".$fecha2;
     if ($conflicto == true) 
     {         
         $param->IsValid = false;
     }
     else
     {
         $param->IsValid = true;
     }

     // control override
     $param->IsValid = true;

   }

    public function inscripciones($sender, $param)
    {
       $cod=$sender->CommandParameter;
       $this->Response->redirect($this->Service->constructUrl('admin.kids.inscribir_en_turno',array('cod'=>$cod)));
    }
}
?>