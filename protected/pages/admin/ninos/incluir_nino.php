<?php
class incluir_nino extends TPage
{
   function check_codigo($sender,$param)
   { $contrato=$this->txt_contrato->Text;
     $param->IsValid=verificar_existencia('speakup.estudiantes','contrato',$contrato,null,$sender);
   }

public function contrato($cantidad)
{
    $contrato=$cantidad;
            while(strlen($contrato)<5)
            {
            $contrato='0'.$contrato;
            }
    return $contrato.'-1';

}

   public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {

          $this->listar_menores($this);

          }
    }


    public function listar_menores($sender)
    {
        $cedula = $this->txt_cedula->Text;
        $this->DataGrid->DataSource=menores_por_padre($cedula,$this);
        $this->DataGrid->dataBind();
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
    
    public function incluir($sender, $param)
    {
        if($this->IsValid)
        {
            $this->btn_incluir->Enabled="False";
            $cod_menor = proximo_numero('estudiantes_menores','cod_menor',null,$sender);  // codigo de la clase
            $cedula=$this->txt_cedula->Text;
            $nombres=$this->txt_nombres->Text;
            $apellidos=$this->txt_apellidos->Text;
            $fecha_nac=cambiaf_a_mysql($this->fecha_nac->Text);
            $edad=$this->txt_edad->Text;

            $sql="insert into speakup.estudiantes_menores (cod_menor,cedula,cedula_padre,nombres,apellidos,fecha_nacimiento,edad)
                  values ('$cod_menor','$cod_menor','$cedula','$nombres','$apellidos','$fecha_nac','$edad')";


            if (modificar_data($sql,$sender))
            {
            $this->mensaje->setSuccessMessage($sender, "Estudiante guardado exitosamente!!", 'grow');
            }
            else
            {
             $this->mensaje->setErrorMessage($sender, 'El estudiante no pudo ser guardado!!','grow');
            }

            $this->listar_menores($this);
        }

    }

}

?>
