<?php


class inscribir_en_turno extends TPage
{

  private $arreglo_dias = array(1=>"Lunes", 2=>"Martes",3=>"Miércoles",4=>"Jueves",5=>"Viernes",6=>"Sábado");
  private $arreglo_horas = array(9=>"9 am",10=>"10 am",11=>"11 am",12=>"12 m",13=>"1 pm",14=>"2 pm",15=>"3 pm",16=>"4 pm",17=>"5 pm",18=>"6 pm",19=>"7 pm",20=>"8 pm",);

    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
              //$this->incluir->Visible = "False";
              if ((!isset($this->Request['cod'])) || ($this->Request['cod'] == ''))
              { // si falta algunos de los datos, se envía de nuevo al classboard, con eso se asegura que se reserve con todos los datos.
                  $this->Response->redirect($this->Service->constructUrl('admin.kids.inscripciones_turnos',null));
              }
              else
              {   // si se encuentran los datos, se coloca la información para mostrar.
                  $cod = $this->Request['cod'];
                  $turno = un_turno_clase($cod,$this);
                  $this->lbldia->Text = $this->arreglo_dias[$turno[0]['dia']];
                  $this->lbldesde->Text = cambiaf_a_normal($turno[0]['desde']);
                  $this->lblhasta->Text = cambiaf_a_normal($turno[0]['hasta']);
                  $this->lblhora->Text = $this->arreglo_horas[$turno[0]['hora']];
                  $this->lblsalon->Text = $turno[0]['nombre_salon'];
                  $this->lblcodclase->Text = $cod;
                  $this->listar_alumnos($this);
                  $this->actualizar_cupo($this);
              }
          }
    }

    public function actualizar_cupo($sender)
    {
          $cod = $this->Request['cod'];
          $turno = un_turno_clase($cod,$this);
          $this->DataGrid->Caption = "Quedan (".$turno[0]['cupo_disp'].") cupos disponibles";
    }

    public function listar_menores($sender)
    {
/*        $cedula = $this->txt_cedula->Text;
        $this->DataGrid2->DataSource=menores_por_padre($cedula,$this);
        $this->DataGrid2->dataBind();*/

        $cedula = $this->txt_cedula->Text;
        $cod_turno = $this->lblcodclase->Text;
        $this->DataGrid2->DataSource=menores_no_inscritos($cedula,$cod_turno,$this);
        $this->DataGrid2->dataBind();
    }

    public function listar_alumnos($sender)
    {
        $cod_turno = $this->lblcodclase->Text;
        $this->DataGrid->DataSource=inscritos_en_turno_clase($cod_turno,$this);
        $this->DataGrid->dataBind();

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
        $cedula = $this->txt_cedula->Text;
        $sql="Select e.cedula, e.nombres, e.apellidos, e.nivel_actual
              From estudiantes e
              Where (e.cedula = '$cedula')";
        $resultado=cargar_data($sql,$sender);
        if (!empty($resultado))
        {
//            $this->cambiar_nivel($sender); // para que tome los valores predeterminados
//            $this->incluir->Visible = "True";
            $this->lblnombre->Text = $resultado[0]['nombres'].' '.$resultado[0]['apellidos'];
            $this->listar_menores($this);
/*            $nivel_actual = $resultado[0]['nivel_actual'];

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

            }*/
        }
        else
        {
            $this->lblnombre->Text = "El número de cédula no se encuentra registrado.";
//            $this->incluir->Visible = "False";
        }

    }

    public function itemCreated($sender,$param)
    {
        $item=$param->Item;
        if($item->ItemType==='Item' || $item->ItemType==='AlternatingItem')
        {
            if ($sender->ID == "DataGrid"){
                // añade confirmación al boton de finalizar publicación
                $item->detalle->finaliza->Attributes->onclick='if(!confirm(\'Eliminar este estudiante de esta clase?\')) return false;';
            }
        }
    }

    public function formatear($sender, $param)
    {
/*        $item=$param->Item;
        if ($item->ItemType=='Item' || $item->ItemType=='AlternatingItem')
        {
            $item->precio->Text = "Bs.F: ".number_format($item->precio->Text, 2, ',', '.');
        }*/
    }

    public function formatear2($sender, $param)
    {
        $item=$param->Item;
        if ($item->ItemType=='Item' || $item->ItemType=='AlternatingItem')
        {
//            $item->detalle2->add->visible = "Bs.F: ".number_format($item->precio->Text, 2, ',', '.');
        }
    }

    public function incluir_estudiante($sender, $param)
    {
/*        $cedula = $this->txt_cedula->Text;
        if ($this->lblcodclase->Text == '')
        {
            // se obtienen los datos necesarios para registrar la clase y luego su detalle.
            $cod_clase = proximo_numero('clases','cod_clase',null,$sender);  // codigo de la clase
            $sesion=new THttpSession;
            $sesion->open();
            $lunes = $sesion['speakup_lunes'];
            $sesion->close();
            $fecha = cambiaf_a_mysql(suma_dias($lunes, $this->Request['dia'])); // fecha de la clase
            $hora = $this->Request['hr'];  // hora
            $salon = $this->Request['salon']; // salon
            $tipo = $this->drop_tipo->SelectedValue;
            $nivel = $this->drop_nivel->SelectedValue;
            

            // se registra la clase

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


    public function inscribir($sender, $param)
    {
        $cod_menor=$sender->CommandParameter;
        $cod_turno = $this->lblcodclase->Text;

          $turno = un_turno_clase($cod_turno,$this);
          if ($turno[0]['cupo_disp'] > 0)
          {
            $sql="insert into speakup.turnos_alumnos (cod_turno, cod_menor)
                  values ('$cod_turno','$cod_menor')";
            $result = modificar_data($sql,$sender);
            $this->listar_alumnos($this);
            $this->listar_menores($this);

            // se modifica el cupo del turno
             $uno = 1;
            $sql="UPDATE speakup.turnos_clases set cupo_disp=cupo_disp-'$uno' where cod_turno='$cod_turno'";
            $resultado=modificar_data($sql,$this);
            $this->actualizar_cupo($sender);


            // se registra en todas las clases del turno

            $sql="select cod_clase from speakup.clases
              where cod_turno = '$cod_turno'";
            $datos = cargar_data($sql,$this);

            foreach($datos as $undato) {
                $codigo_clase = $undato['cod_clase'];

            $sql2="insert into detalle_clases (cod_clase, cedula)
                   values ('$codigo_clase','$cod_menor') ";
            $resultado=modificar_data($sql2,$this);
            }


          }
          else
          {
              $this->mensaje->setErrorMessage($sender, 'NO HAY CUPOS DISPONIBLES','grow');
          }

    }


    public function eliminar_estudiante($sender,$param)//sin revisar
    {
        $id=$sender->CommandParameter;
        $cod_turno = $this->lblcodclase->Text;

        $sql="select cod_menor from speakup.turnos_alumnos
          where id = '$id'";
        $datos = cargar_data($sql,$this);
        $cod_menor = $datos[0]['cod_menor'];

        $sql="DELETE FROM turnos_alumnos WHERE id = '$id'";
        $resultado=modificar_data($sql,$this);

        $this->listar_alumnos($sender);
        $this->listar_menores($this);
        $uno = 1;
		$sql="UPDATE speakup.turnos_clases set cupo_disp = cupo_disp + '$uno' where cod_turno = '$cod_turno'";
        $resultado=modificar_data($sql,$this);
        $this->actualizar_cupo($sender);

            // se registra en todas las clases del turno

        $sql="select cod_clase from speakup.clases
          where cod_turno = '$cod_turno'";
        $datos = cargar_data($sql,$this);

        foreach($datos as $undato) {
            $codigo_clase = $undato['cod_clase'];

        $sql2="DELETE FROM detalle_clases WHERE ((cod_clase = '$codigo_clase') and (cedula = '$cod_menor'))";
        $resultado=modificar_data($sql2,$this);
        }

    }

    public function cancelar_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('admin.clases.class_board'));
    }
    
}
?>