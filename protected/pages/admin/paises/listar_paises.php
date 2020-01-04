<?php

class listar_paises extends TPage
{

	public function onLoad($param)
	{
			//Busqueda de Registros
        $sql="select * from paises order by nombre_pais";
        $resultado=cargar_data($sql,$this);
		$this->DataGrid->DataSource=$resultado;
		$this->DataGrid->dataBind();
	}

	public function changePage($sender,$param)
	{
        $sql="select * from paises order by nombre_pais";
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
