<?php
class incluir_paises extends TPage
{
    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {

          }
    }

	public function btn_incluir_click($sender, $param)
	{
        if ($this->IsValid)
        {
            // Se capturan los datos provenientes de los Controles
            $codigo = proximo_numero("paises","cod_pais",null,$sender);
            $codigo = rellena($codigo,6,"0");
            $nombre = $this->txt_nombre->Text;

            // se guarda en la base de datos
            $sql="insert into paises (cod_pais, nombre_pais)
                  value ('$codigo','$nombre')";
            $resultado=modificar_data($sql,$sender);

            /* Se incluye el rastro en el archivo de bitácora */
            $descripcion_log = "Se ha incluido el país: ".$codigo." / ".$nombre;
            inserta_rastro(usuario_actual('login'),usuario_actual('cedula'),'I',$descripcion_log,"",$sender);

        //    $this->Response->redirect($this->Service->constructUrl('admin.inicio'));
        }
	}




}
?>