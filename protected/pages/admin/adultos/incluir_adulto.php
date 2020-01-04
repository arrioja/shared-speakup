<?php
class incluir_adulto extends TPage
{

   public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {

          // color de speakup c85401

//            $sql="select count(*)cantidad from speakup.estudiantes";
//            $datos=cargar_data($sql,$this);
//            $cantidad=$datos[0][cantidad]+1;
//            $this->txt_contrato->Text=$this->contrato($cantidad);


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
            $tlf_celular=$this->txt_tlf_celular->Text;
            $tlf_casa=$this->txt_tlf_casa->Text;
            $email=$this->txt_email->Text;
            $email2=$this->txt_email2->Text;
            $dir_casa=$this->txt_dir_casa->Text;
            $dir_trabajo=$this->txt_dir_trabajo->Text;
            $profesion=$this->txt_profesion->Text;

            $sql="insert into speakup.estudiantes (cedula,nombres,apellidos,status,telefono1,telefono2,email1,email2,direccion_casa,direccion_trabajo,profesion,fecha_nacimiento,edad)
                  values ('$cedula','$nombres','$apellidos','INACTIVO','$tlf_celular','$tlf_casa','$email','$email2','$dir_casa','$dir_trabajo','$profesion','$fecha_nac','$edad')";


            if (modificar_data($sql,$sender))
            {
                $this->mensaje->setSuccessMessage($sender, "Los datos de la Persona se guardaron exitosamente !", 'grow');
            }
            else
            {
                $this->mensaje->setErrorMessage($sender, 'ERROR al guardar datos','grow');
            }
        }

    }

    public function incluir_nino($sender, $param)
    {
        $cedula = $this->txt_cedula->Text;
        $this->Response->redirect($this->Service->constructUrl('admin.ninos.incluir_nino',array('ced_padre'=>$cedula)));
    }

}

?>
