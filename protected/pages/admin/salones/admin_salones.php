<?php
class admin_salones extends TPage
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
        $sql="select * from speakup.salones";
        $resultado=cargar_data($sql,$this);
        $this->DataGrid->DataSource=$resultado;
        $this->DataGrid->dataBind();
    }
	public function btn_incluir_click($sender, $param)
	{
        if ($this->IsValid)
        {
            // Se capturan los datos provenientes de los Controles
            $codigo = proximo_numero("salones","cod_salon",null,$sender);
            $codigo = rellena($codigo,1,"0");
            $nombre = $this->txt_nombre->Text;
            $capacidad = $this->txt_capacidad->Text;

            // se guarda en la base de datos
            $sql="insert into salones (cod_salon, nombre, capacidad)
                  value ('$codigo','$nombre','$capacidad')";
            $resultado=modificar_data($sql,$sender);

            /* Se incluye el rastro en el archivo de bitácora */
            $descripcion_log = "Se ha incluido el Salón: ".$codigo." / ".$nombre." / Capacidad: ".$capacidad;
            inserta_rastro(usuario_actual('login'),usuario_actual('cedula'),'I',$descripcion_log,"",$sender);

            $this->txt_nombre->Text = "";
            $this->txt_capacidad->Text = "10";
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
                $item->eliminar->elimina_salon->Attributes->onclick='if(!confirm(\'Eliminar este Salón de clases?\')) return false;';
            }
        }
    }

    public function eliminar_salon($sender,$param)//sin revisar
    {
        $id=$sender->CommandParameter;
        echo $id;
        $sql="DELETE FROM speakup.salones WHERE id = '$id'";
        $this->DataGrid->EditItemIndex=-1;
        $resultado=modificar_data($sql,$this);
        $this->cargar();
    }




}
?>