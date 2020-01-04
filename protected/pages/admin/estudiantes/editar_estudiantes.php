<?php
class editar_estudiantes extends TPage
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
          $id=$this->Request['id'];
          $sql="select * from speakup.estudiantes where id='$id'";

        $estudiante=cargar_data($sql,$this);

        $this->txt_cedula->Text=$estudiante[0][cedula];
        $this->txt_nombres->Text=$estudiante[0][nombres];
        $this->txt_apellidos->Text=$estudiante[0][apellidos];
        $this->fecha_nac->Text=cambiaf_a_normal($estudiante[0][fecha_nacimiento]);
        $this->txt_edad->Text=$estudiante[0][edad];
        $this->txt_contrato->Text=$estudiante[0][contrato];
        $this->fecha_ini->Text=cambiaf_a_normal($estudiante[0][fecha_ini]);
        $this->txt_tlf_celular->Text=$estudiante[0][telefono1];
        $this->txt_tlf_casa->Text=$estudiante[0][telefono2];
        $this->txt_email->Text=$estudiante[0][email1];
        $this->txt_email2->Text=$estudiante[0][email2];
        $this->txt_dir_casa->Text=$estudiante[0][direccion_casa];
        $this->txt_dir_trabajo->Text=$estudiante[0][direccion_trabajo];
        $this->txt_profesion->Text=$estudiante[0][profesion];


            $this->drop_nivel_inicio->DataSource=niveles($this);
            $this->drop_nivel_inicio->dataBind();
            $this->drop_nivel_inicio->SelectedValue=$estudiante[0][nivel_ini];

            $this->drop_nivel_fin->DataSource=niveles($this);
            $this->drop_nivel_fin->dataBind();
            $this->drop_nivel_fin->SelectedValue=$estudiante[0][nivel_fin];

            $this->drop_nivel_actual->DataSource=niveles($this);
            $this->drop_nivel_actual->dataBind();
            $this->drop_nivel_actual->SelectedValue=$estudiante[0][nivel_actual];

            $this->drop_programa->DataSource=programas($this);
            $this->drop_programa->dataBind();
            $this->drop_programa->SelectedValue=$estudiante[0][programa];

            $this->drop_locaciones->DataSource=locaciones($this);
            $this->drop_locaciones->dataBind();
            $this->drop_locaciones->SelectedValue=$estudiante[0][locacion];

            $this->drop_status->DataSource=status($this);
            $this->drop_status->dataBind();
            $this->drop_status->SelectedValue=$estudiante[0][status];


          }
    }


    public function guardar($sender, $param)
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

        $resultado_drop = obtener_seleccion_drop($this->drop_nivel_actual);
        $nivel_actual = $resultado_drop[1];

        $resultado_drop = obtener_seleccion_drop($this->drop_status);
        $status = $resultado_drop[1];

$sql="update speakup.estudiantes set cedula='$cedula',nombres='$nombres',apellidos='$apellidos',contrato='$contrato',programa='$programa',niveles_adquiridos='$niveles_adquiridos',nivel_ini='$nivel_ini',nivel_fin='$nivel_fin',nivel_actual='$nivel_actual',
      fecha_ini='$fecha_ini',status='$status',locacion='$locacion',telefono1='$tlf_celular',telefono2='$tlf_casa',email1='$email',email2='$email2',direccion_casa='$dir_casa',direccion_trabajo='$dir_trabajo',profesion='$profesion',fecha_nacimiento='$fecha_nac',edad='$edad'";


if (modificar_data($sql,$sender))
{
$this->mensaje->setSuccessMessage($sender, "Estudiante actualizado exitosamente!!", 'grow');
}
else
{
 $this->mensaje->setErrorMessage($sender, 'El estudiante no pudo ser actualizado!!','grow');
}

//        $cod_articulo=$sender->CommandParameter;
//        $this->Response->redirect($this->Service->constructUrl('articulos.info_articulo',array('codigo'=>$cod_articulo)));
        }

    }

}

?>
