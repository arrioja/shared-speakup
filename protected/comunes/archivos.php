<?php
/*
****************************************************  INFO DEL ARCHIVO
  		   Creado por: 	Pedro E. Arrioja M.
  Descripción General:  Funciones relacionadas con el manejo de archivos de todo
 *                      tipo, creación, acceso, adición de información, etc.
****************************************************  FIN DE INFO
 */

function elimina_archivo($arch)
{
    if (file_exists($arch))
       { unlink($arch);}
}


?>