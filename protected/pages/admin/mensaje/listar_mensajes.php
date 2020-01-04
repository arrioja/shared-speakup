<?php
/*****************************************************  INFO DEL ARCHIVO
 * Creado por: 	Pedro E. Arrioja M.
 * Descripción: Muestra un listado de los mensajes que han sido registrados en
 *              el sistema.
 *****************************************************  FIN DE INFO.
*/
class listar_mensajes extends TPage
{ 

public function onLoad($param)
	{
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
            $sql="select * from mensajes";
            $mensaje=cargar_data($sql,$this);
            $this->Repeater->DataSource=$mensaje;
            $this->Repeater->dataBind();
          }
    }
}
?>
