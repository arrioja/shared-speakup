<?php
/*****************************************************  INFO DEL ARCHIVO
 * Creado por: 	Pedro E. Arrioja M.
 * Descripcion: Muestra una pagina mediante la cual se puede consultar las actividades
 *              que los usuarios realizan en el sistema; es necesario que cada modulo implemente
 *              la inclusion de la informacion necesaria en la tabla rastreo para que este modulo
 *              pueda obtener la informaci�n que requiere.
 *
 * Nota: Falta implementar una opción en el DropDown para ver los logs de TODOS los usuarios.
 *****************************************************  FIN DE INFO
*/
class consultar_logs extends TPage
{

	public function onLoad($param)
	{
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
            $sql="select distinct u.cedula, u.login, u.email, CONCAT(u.cedula,' - ',u.nombres,' ',u.apellidos) as nombre_completo
                            FROM usuarios as u
                            ORDER BY u.nombres, u.apellidos";
            $resultado=cargar_data($sql,$this);
            $this->drop_usuarios->DataSource=$resultado;
            $this->drop_usuarios->dataBind();
          }
	}

/* esta función se encarga de implementar el evento on_intemchange del dropdown
 */
    public function btn_consultar_click($sender,$param)
    {
        $this->actualizar_listado(false,$param);
    }

/* esta función se encarga actualizar el listado registro de actividades del
 * usuario seleccionado.
 */
    public function actualizar_listado($paginar,$param)
    {
        // se captura el valor del drop de usuarios
        $cedula=$this->drop_usuarios->SelectedValue;
        
        /* convierto los valores "desde" y "hasta" para que sirvan para hacer la
         * comparación con los timestamps de la tabla en la base de datos.
         */
        $desde = $this->txt_fecha_desde->Text;
        $hasta = $this->txt_fecha_hasta->Text;

	    list($dia1,$mes1,$ano1) = explode("/",$desde); 
	    list($dia2,$mes2,$ano2) = explode("/",$hasta);	
		//calculo timestam de las dos fechas
		$t1 = date('Y-m-d H:i:s',mktime(0,0,0,$mes1,$dia1,$ano1));
		$t2 = date('Y-m-d H:i:s',mktime(23,59,59,$mes2,$dia2,$ano2));

        //Se actualiza el grid de los grupos a los que pertenece
        $sql="select r.id, u.cedula, u.login, CONCAT(u.nombres,' ',u.apellidos) as nomb, r.descripcion, r.timestamp
 					  	    FROM usuarios as u, rastreo as r
 						    WHERE ((r.timestamp>='$t1') and (r.timestamp<='$t2')) and
							      (u.cedula=r.cedula) and (u.cedula=$cedula)
						    ORDER BY r.timestamp DESC, r.id, u.nombres, u.apellidos";

        if ($paginar == true)
        {
            $this->DataGrid_logs->CurrentPageIndex=$param->NewPageIndex;
        }

        $resultado=cargar_data($sql,$this);
		$this->DataGrid_logs->DataSource=$resultado;
		$this->DataGrid_logs->dataBind();
    }

    public function changePage($sender,$param)
	{
         $this->actualizar_listado(true,$param);
	}

	public function pagerCreated($sender,$param)
	{
		$param->Pager->Controls->insertAt(0,'P&aacute;gina: ');
	}

}

?>
