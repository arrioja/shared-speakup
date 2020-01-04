<?php
class incluir_grupos extends TPage
{

    public function incluir_click($sender,$param)
    {
        if ($this->IsValid)
        {
            // Se capturan los datos provenientes de los Controles
            $codigo = proximo_numero("grupos","codigo",null,$this);
            $nombre = $this->txt_nombre->Text;

            /* Se guarda en la base de datos */
            $sql="insert into grupos(codigo,nombre)
                  values ('$codigo','$nombre')";
            $resultado=modificar_data($sql,$sender);

            /* Se incluye el rastro en el archivo de bitácora */
            $descripcion_log = "Insertado Grupo Cod:".$codigo." Cod. Org:".$codigo_organizacion." Nombre:".$nombre;
            inserta_rastro(usuario_actual('login'),usuario_actual('cedula'),'I',$descripcion_log,"",$sender);

            $this->Response->redirect($this->Service->constructUrl('admin.inicio'));
        }
    }
}
?>