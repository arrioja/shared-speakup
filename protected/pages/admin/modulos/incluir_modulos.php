<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class incluir_modulos extends TPage
{
    public function incluir_click($sender,$param)
    {
        if ($this->IsValid)
        {
        // Se capturan los datos provenientes de los Controles
        $codigo = $this->txt_codigo->Text;
        $nombre_corto = $this->txt_nombre_corto->Text;
        $nombre_largo = $this->txt_nombre_largo->Text;
        $archivo_php = $this->txt_archivo_php->Text;
        $visible = $this->chk_visible->Checked;
        $imagen_p = $this->txt_imagen_p->Text;

        /* Se Inicia el procedimiento para guardar en la base de datos
         */
		$sql="insert into modulos(codigo_modulo,nombre_corto,nombre_largo,archivo_php, visible_en_menu, imagen_p)
              values ('$codigo','$nombre_corto','$nombre_largo','$archivo_php', '$visible', '$imagen_p')";
        $resultado=modificar_data($sql,$sender);

        /* Se incluye el rastro en el archivo de bitácora */
        $descripcion_log = "Insertado M&oacute;dulo Cod:".$codigo." Nom:".$nombre_largo." Arch:".$archivo_php;
        inserta_rastro(usuario_actual('login'),usuario_actual('cedula'),'I',$descripcion_log,"",$sender);

        $this->Response->redirect($this->Service->constructUrl('admin.inicio'));
        }        
    }
}
?>
