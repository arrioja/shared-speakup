<?php
class incluir_estados extends TPage
{
    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
            $sql="select cod_pais, nombre_pais from paises order by nombre_pais";
            $paises=cargar_data($sql,$this);
            $this->drop_paises->DataSource=$paises;
            $this->drop_paises->dataBind();
          }
    }

	public function btn_incluir_click($sender, $param)
	{
        if ($this->IsValid)
        {
            // Se capturan los datos provenientes de los Controles
            $cod_pais = $this->drop_paises->SelectedValue;
            $criterios_adicionales=array('cod_pais' => $cod_pais);
            $cod_estado=proximo_numero("estados","cod_estado",$criterios_adicionales,$sender);
            $cod_estado = rellena($cod_estado,6,"0");
            
            $nombre = $this->txt_nombre->Text;

            // se guarda en la base de datos
            $sql="insert into estados (cod_pais, cod_estado, nombre_estado)
                  value ('$cod_pais','$cod_estado','$nombre')";
            $resultado=modificar_data($sql,$sender);

            /* Se incluye el rastro en el archivo de bitácora */
            $descripcion_log = "Se ha incluido el Estado: ".$cod_estado." / ".$nombre. "en el pais: ".$cod_pais;
            inserta_rastro(usuario_actual('login'),usuario_actual('cedula'),'I',$descripcion_log,"",$sender);

            $this->Response->redirect($this->Service->constructUrl('admin.inicio'));
        }
	}




}
?>