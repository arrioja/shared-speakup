<?php

class asignar_permisos_grupos extends TPage
{

	public function onLoad($param)
	{
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
            $sql="select codigo, nombre from grupos order by nombre";
            $resultado=cargar_data($sql,$this);
            $this->drop_grupos->DataSource=$resultado;
            $this->drop_grupos->dataBind();
          }
	}

/* esta función se encarga de implementar el evento on_intemchange del dropdown
 * de los grupos, en la cual se actualiza el listado de los modulos que el grupo
 * tiene disponible y el listado de los que no tiene disponibles.
 */
    public function actualiza_listado()
    {
        // se captura el valor del drop de los grupos
        $codigo_grupo = $this->drop_grupos->SelectedValue;
        //Se actualiza el grid de los modulos a los que SI tiene permiso el grupo
        $sql="SELECT m.id, m.codigo_modulo, m.nombre_largo, g.codigo_grupo, g.id as id2
			 		    	  FROM modulos m, permisos_grupos g
						      WHERE ((m.codigo_modulo = g.codigo_modulo) and (g.codigo_grupo='$codigo_grupo')) order by m.codigo_modulo";
        $resultado=cargar_data($sql,$this);
		$this->DataGrid_tiene->DataSource=$resultado;
		$this->DataGrid_tiene->dataBind();
        // se actualiza el grid de los modulos a los que NO tiene permiso el grupo
        $sql2="SELECT id,codigo_modulo,nombre_largo from modulos where codigo_modulo not in
									(SELECT m1.codigo_modulo
			 		    	  		 FROM modulos as m1, permisos_grupos as g1
						      		 WHERE ((m1.codigo_modulo = g1.codigo_modulo) and (g1.codigo_grupo='$codigo_grupo'))) order by codigo_modulo";
        $resultado2=cargar_data($sql2,$this);
		$this->DataGrid_no_tiene->DataSource=$resultado2;
		$this->DataGrid_no_tiene->dataBind();
    }

	public function agregar($sender,$param)
	{
        $resultado_drop = obtener_seleccion_drop($this->drop_grupos);
        $codigo_grupo = $resultado_drop[1]; // el segundo valor que corresponde con el codigo
        $codigo_modulo=$this->DataGrid_no_tiene->DataKeys[$param->Item->ItemIndex];
        $sql="insert into permisos_grupos(codigo_grupo,codigo_modulo) values ('$codigo_grupo','$codigo_modulo')";
        $resultado=modificar_data($sql,$this);
        /* Se incluye el rastro en el archivo de bitácora */
        $descripcion_log = "Concedido permiso al grupo ".$codigo_grupo." para acceder al m&oacute;dulo ".$codigo_modulo;
        inserta_rastro(usuario_actual('login'),usuario_actual('cedula'),'I',$descripcion_log,"",$sender);
        $this->actualiza_listado();
	}

	public function eliminar($sender,$param)
	{
		$id=$this->DataGrid_tiene->DataKeys[$param->Item->ItemIndex];
        /* Se incluye el rastro en el archivo de bitácora */
        $sql="Select * FROM permisos_grupos WHERE id='$id'";
        $resul=cargar_data($sql,$this);
        $codigo_modulo = $resul[0]['codigo_modulo'];
        $codigo_grupo = $resul[0]['codigo_grupo'];

        $descripcion_log = "Restringido el grupo ".$codigo_grupo." de acceder al m&oacute;dulo ".$codigo_modulo;
        inserta_rastro(usuario_actual('login'),usuario_actual('cedula'),'E',$descripcion_log,"",$sender);

        $sql="DELETE FROM permisos_grupos WHERE id='$id'";
        $resultado=modificar_data($sql,$this);
        $this->actualiza_listado();
	}
}

?>
