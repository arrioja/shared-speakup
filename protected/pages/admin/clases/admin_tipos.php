<?php
class admin_tipos extends TPage
{
    public function onLoad($param)
    {
       parent::onLoad($this,$param);
       if (!$this->IsPostBack)
		{
            $this->cargar();
        }
    }
// carga el listado de los salones registrados en el sistema
    public function cargar()
    {
        $sql="select * from speakup.tipos_clases";
        $resultado=cargar_data($sql,$this);
        $this->DataGrid->DataSource=$resultado;
        $this->DataGrid->dataBind();
    }
	public function btn_incluir_click($sender, $param)
	{
        if ($this->IsValid)
        {
            // Se capturan los datos provenientes de los Controles
            $codigo = proximo_numero("tipos_clases","cod_tipo",null,$sender);
            $codigo = rellena($codigo,1,"0");
            $nombre = $this->txt_nombre->Text;

            // se guarda en la base de datos
            $sql="insert into tipos_clases (cod_tipo, descripcion)
                  value ('$codigo','$nombre')";
            $resultado=modificar_data($sql,$sender);

            /* Se incluye el rastro en el archivo de bitácora */
            $descripcion_log = "Se ha incluido un nuevo tipo de clase: ".$codigo." / ".$nombre;
            inserta_rastro(usuario_actual('login'),usuario_actual('cedula'),'I',$descripcion_log,"",$sender);

            $this->txt_nombre->Text = "";
            $this->cargar();
            $this->DataGrid->dataBind();
        }
	}

    public function itemCreated($sender,$param)
    {
        $item=$param->Item;
        if($item->ItemType==='Item' || $item->ItemType==='AlternatingItem')
        {
            if ($sender->ID == "DataGrid"){
                // añade confirmación al boton de finalizar publicación
                $item->eliminar->elimina_salon->Attributes->onclick='if(!confirm(\'Eliminar este tipo de clases del Sistema?\')) return false;';
            }
        }
    }

    public function eliminar_salon($sender,$param)//sin revisar
    {
        $id=$sender->CommandParameter;
        echo $id;
        $sql="DELETE FROM speakup.tipos_clases WHERE id = '$id'";
        $this->DataGrid->EditItemIndex=-1;
        $resultado=modificar_data($sql,$this);
        $this->cargar();
    }




}
?>