<?php

class listar_estados extends TPage
{
	public function onLoad($param)
	{
        if (!$this->IsPostBack)
        {
            $sql="select cod_pais, nombre_pais from paises order by nombre_pais";
            $paises=cargar_data($sql,$this);
            $this->drop_paises->DataSource=$paises;
            $this->drop_paises->dataBind();
        }
	}
/* esta función se encarga de implementar el evento on_intemchange del dropdown*/
    public function actualiza_listado($sender,$param)
    {
        //Busqueda de Registros
        $pais = $this->drop_paises->SelectedValue;
        $sql="select * from estados where (cod_pais='$pais' )order by nombre_estado";
        $resultado=cargar_data($sql,$this);
		$this->DataGrid->DataSource=$resultado;
		$this->DataGrid->dataBind();
    }
}

?>
