<?php
class incluir_estudiantes extends TPage
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

          // color de speakup c85401

            $this->drop_nivel_inicio->DataSource=niveles($this);
            $this->drop_nivel_inicio->dataBind();

            $this->drop_nivel_fin->DataSource=niveles($this);
            $this->drop_nivel_fin->dataBind();

            $this->drop_programa->DataSource=programas($this);
            $this->drop_programa->dataBind();

            $this->drop_locaciones->DataSource=locaciones($this);
            $this->drop_locaciones->dataBind();

            $sql="select count(*)cantidad from speakup.estudiantes";
            $datos=cargar_data($sql,$this);
            $cantidad=$datos[0][cantidad]+1;
            $this->txt_contrato->Text=$this->contrato($cantidad);


          }
    }


    public function incluir($sender, $param)
    {
        if($this->IsValid)
        {
            $this->btn_incluir->Enabled="False";

            $cedula=$this->txt_cedula->Text;
            $nombres=$this->txt_nombres->Text;
            $apellidos=$this->txt_apellidos->Text;
            $fecha_nac=cambiaf_a_mysql($this->fecha_nac->Text);
            $edad=$this->txt_edad->Text;
            $contrato=$this->txt_contrato->Text;
            $fecha_ini=cambiaf_a_mysql($this->fecha_ini->Text);
            $tlf_celular=$this->txt_tlf_celular->Text;
            $tlf_casa=$this->txt_tlf_casa->Text;
            $email=$this->txt_email->Text;
            $email2=$this->txt_email2->Text;
            $dir_casa=$this->txt_dir_casa->Text;
            $dir_trabajo=$this->txt_dir_trabajo->Text;
            $profesion=$this->txt_profesion->Text;

            $resultado_drop = obtener_seleccion_drop($this->drop_niveles_adquiridos);
            $niveles_adquiridos = $resultado_drop[1];

            $resultado_drop = obtener_seleccion_drop($this->drop_nivel_inicio);
            $nivel_ini = $resultado_drop[1];

            $resultado_drop = obtener_seleccion_drop($this->drop_nivel_fin);
            $nivel_fin = $resultado_drop[1];

            $resultado_drop = obtener_seleccion_drop($this->drop_programa);
            $programa = trim($resultado_drop[1]);

            $resultado_drop = obtener_seleccion_drop($this->drop_locaciones);
            $locacion = $resultado_drop[1];

            $sql="insert into speakup.estudiantes (cedula,nombres,apellidos,contrato,programa,niveles_adquiridos,nivel_ini,nivel_fin,nivel_actual,
                  fecha_ini,status,locacion,telefono1,telefono2,email1,email2,direccion_casa,direccion_trabajo,profesion,fecha_nacimiento,edad)
                  values ('$cedula','$nombres','$apellidos','$contrato','$programa','$niveles_adquiridos','$nivel_ini','$nivel_fin','$nivel_ini',
                  '$fecha_ini','ACTIVO','$locacion','$tlf_celular','$tlf_casa','$email','$email2','$dir_casa','$dir_trabajo','$profesion','$fecha_nac','$edad')";


            if (modificar_data($sql,$sender))
            {
            $this->mensaje->setSuccessMessage($sender, "Estudiante guardado exitosamente!!", 'grow');
            }
            else
            {
             $this->mensaje->setErrorMessage($sender, 'El estudiante no pudo ser guardado!!','grow');
            }
        }

    }

}

?>
