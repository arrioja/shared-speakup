<?php
/*   ****************************************************  INFO DEL ARCHIVO
  Creado por:   Pedro E. Arrioja M.
  Descripción:  En este archivo se permite modificar las restricciones de un usuario
 *              en cuanto a diversas opciones:
 *              Por ahora si puede o no insertar, eliminar, listar y modificar
 *              En un futuro se pueden establecer horarios permitidos de acceso al sistema
 *              bloqueos y desbloqueos de claves, etc.
     ****************************************************  FIN DE INFO
*/

class restricciones extends TPage
{
    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
            /* actualiza el listado de paises */
            $sql="select id, CONCAT(nombres, ' ', apellidos) as info from usuarios";
            $dataset=cargar_data($sql,$this);
            $seleccione = array('id'=>'X', 'info'=>'Seleccione...');
            array_unshift($dataset, $seleccione);
            $this->drop_cargos->DataSource=$dataset;
            $this->drop_cargos->dataBind();
            
          }
    }


    public function muestra_datos($sender, $param)
    {
        $id = $this->drop_cargos->SelectedValue;
        $sql="select insertar, modificar, eliminar, listar, consultar from usuarios
              where (id = '$id')";
        $data=cargar_data($sql,$this);
        if (!empty($data))
        {
            $this->btn_incluir->Enabled = true;
            $this->ch1->Checked = $data[0]['insertar'];
            $this->ch2->Checked = $data[0]['listar'];
            $this->ch3->Checked = $data[0]['consultar'];
            $this->ch4->Checked = $data[0]['modificar'];
            $this->ch5->Checked = $data[0]['eliminar'];
        }
        else
        {
            $this->ch1->Checked = false;
            $this->ch2->Checked = false;
            $this->ch3->Checked = false;
            $this->ch4->Checked = false;
            $this->ch5->Checked = false;
            $this->ch6->Checked = false;
            $this->btn_incluir->Enabled = false;
        }
    }



    /* Se incluyen los datos del nuevo usuario en la base */
	public function btn_incluir_click($sender, $param)
	{
        if ($this->IsValid)
        {
            // Se capturan los datos provenientes de los Controles
            $incluir = $this->ch1->Checked;
            $listar = $this->ch2->Checked;
            $consultar = $this->ch3->Checked;
            $modificar = $this->ch4->Checked;
            $eliminar = $this->ch5->Checked;

            $id = $this->drop_cargos->SelectedValue;
            /* Se guardan los datos del usuario. */
            $sql="Update usuarios set    
                    insertar = '$incluir',
                    listar = '$listar',
                    modificar = '$modificar',
                    eliminar = '$eliminar',
                    consultar = '$consultar'
                Where (id = '$id')";
            $resultado=modificar_data($sql,$sender);

            /* Se asigna un permiso basico al nuevo usuario; el grupo 2
             * llamado Usuario Sin privilegios le permite al nuevo usuario hacer
             * operaciones basicas como cambiar su propia clave.
             */
            /* Se incluye el rastro en el archivo de bitácora */
            $descripcion_log = "Se han modificado las restricciones al usuario con el id: ".$id;
            inserta_rastro(usuario_actual('login'),usuario_actual('cedula'),'I',$descripcion_log,"",$sender);

            $this->Response->redirect($this->Service->constructUrl('admin.inicio'));
        }
 	}
}

?>
