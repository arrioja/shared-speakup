<?php

class listar_grupos extends TPage
{

	public function onLoad($param)
	{
        $sql="select codigo, nombre from grupos order by nombre";
        $resultado=cargar_data($sql,$this);
		$this->DataGrid->DataSource=$resultado;
		$this->DataGrid->dataBind();
	}

/* esta función se encarga de implementar el evento on_intemchange del dropdown*/
    public function actualiza_listado()
    {
        //Busqueda de Registros
    //    $resultado_drop = obtener_seleccion_drop($this->drop_organizaciones);
    //    $codigo_organizacion = $resultado_drop[1]; // el segundo valor que corresponde con el codigo

    }


	public function editItem($sender,$param)
	{
	//	$id=$this->DataGrid->DataKeys[$param->Item->ItemIndex];
	//	$this->Response->redirect($this->Service->constructUrl('IncluirDecla',array('id'=>$id)));
	}

	public function anularItem($sender,$param)
	{
	/*	$id=$this->DataGrid->DataKeys[$param->Item->ItemIndex];
		$this->Response->redirect($this->Service->constructUrl('Anular',array('id'=>$id)));*/
	}

	public function changePage($sender,$param)
	{
   //     $resultado_drop = obtener_seleccion_drop($this->drop_organizaciones);
   //     $codigo_organizacion = $resultado_drop[1]; // el segundo valor que corresponde con el codigo
        $sql="select codigo, nombre from grupos order by nombre";
        $this->DataGrid->CurrentPageIndex=$param->NewPageIndex;
        $resultado=cargar_data($sql,$this);
        $this->DataGrid->DataSource=$resultado;
        $this->DataGrid->dataBind();
	}

	public function pagerCreated($sender,$param)
	{
		$param->Pager->Controls->insertAt(0,'Pagina: ');
	}

}

?>
