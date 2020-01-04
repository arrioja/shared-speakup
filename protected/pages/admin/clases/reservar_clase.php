<?php

class reservar_clase extends TPage
{

    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
              //$this->incluir->Visible = "False";
              if ((!isset($this->Request['hr'])) || (!isset($this->Request['dia'])) || (!isset($this->Request['salon'])) || 
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

                  $this->drop_tipo->DataSource=tipos_clases($this);
                  $this->drop_tipo->dataBind();
                  

                  
                  $this->listar_alumnos($this);
              }
          }
    }


    public function listar_alumnos($sender)
    {
        $cod_clase = $this->lblcodclase->Text;
        $sql="Select d.id, e.cedula, e.nombres, e.apellidos
              From estudiantes e, detalle_clases d
              Where (e.cedula = d.cedula) and (d.cod_clase = '$cod_clase')";
        $resultado=cargar_data($sql,$sender);

         $sql2="Select d.id, e.cedula, e.nombres, e.apellidos
              From estudiantes_menores e, detalle_clases d
              Where (e.cedula = d.cedula) and (d.cod_clase = '$cod_clase')";
        $resultado2=cargar_data($sql2,$sender);
$i=0;
            foreach($resultado as $undato) {
                $resultado_total[$i]['id'] = $undato['id'];
                $resultado_total[$i]['cedula'] = $undato['cedula'];
                $resultado_total[$i]['nombres'] = $undato['nombres'];
                $resultado_total[$i]['apellidos'] = $undato['apellidos'];
                $i++;
            }

            foreach($resultado2 as $undato) {
                $resultado_total[$i]['id'] = $undato['id'];
                $resultado_total[$i]['cedula'] = $undato['cedula'];
                $resultado_total[$i]['nombres'] = $undato['nombres'];
                $resultado_total[$i]['apellidos'] = $undato['apellidos'];
                $i++;
            }

 //       $resultado_total = array_push($resultado,$resultado2);

        $this->DataGrid->DataSource=$resultado_total;
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

    public function incluir_estudiante($sender, $param)
    {
        $cedula = $this->txt_cedula->Text;
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


    }

    public function eliminar_estudiante($sender,$param)//sin revisar
    {
        $id=$sender->CommandParameter;
        $sql="DELETE FROM detalle_clases WHERE id = '$id'";
        $resultado=modificar_data($sql,$this);

        $cod_clase = $this->lblcodclase->Text;
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

        $this->listar_alumnos($sender);
    }

    public function cancelar_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('admin.clases.class_board'));
    }
    
}
?>