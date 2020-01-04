<?php
/* 
****************************************************  INFO DEL ARCHIVO
  		   Creado por: 	Pedro E. Arrioja M.
  Descripción General:  Se encuentran funciones de aplicación genérica para la extracción
 *                      y listado de datos desde bases de datos.
****************************************************  FIN DE INFO
 */
/* Esta es una función genérica que devuelde un arreglo con el set
 * resultante de la consulta que se le pase como parámetro, se tomó la creada por
 * Axzel Marín y se modificó para que trabajase con el objeto contenedor (sender)
 */
function cargar_data($consulta,$sender)
{
   try
    {
        $db = $sender->Application->Modules["db"]->DbConnection;
        $db->Active=true;
        $resultado = $db->createCommand($consulta)->query();
        $dataset=$resultado->readAll();
        $db->Active=false;
        return $dataset;
    }
    catch(Exception $e)
    {
       $mensaje=$e->getMessage();
       // el error 5 es consultando datos
       $sender->Response->redirect($sender->Service->constructUrl('admin.mensaje.mensaje',array('codigo'=>'00005','adic'=>$mensaje)));
    }
}

/* Esta función sirve para los UPDATE, INSERTS Y DELETE, la decisión de llamarla
 * "modificar_data" obedece a que es la manera mas generica de denominarla, ya
 * que no importa el tipo de oprtacion que esta realice, al final es siempre
 * una modificacion de los datos contenidos en la base.
 */
function modificar_data($consulta,$sender)
{
 /*   $db = $sender->Application->Modules["db"]->DbConnection;
    $db->Active=true;
    $ejecucion = $db->createCommand($consulta)->execute();
    $db->Active=false;
    return $ejecucion;*/


    try
    {
        $db = $sender->Application->Modules["db"]->DbConnection;
        $db->Active=true;
        $ejecucion = $db->createCommand($consulta)->execute();
        $db->Active=false;
        return $ejecucion;
    }
    catch(Exception $e)
    {
        $mensaje=$e->getMessage();
        // el error 8 es error grardando datos
        $sender->Response->redirect($sender->Service->constructUrl('admin.mensaje.mensaje',array('codigo'=>'00008','adic'=>$mensaje)));
    }

/*
    try
    {
    $db = $sender->Application->Modules["db"]->DbConnection;
    $db->Active=true;
    $ejecucion = $db->createCommand($consulta)->execute();
    $db->Active=false;
    return true;
    }
    catch(Exception $e)
    {
        return false;//reenviar a la pag de error
    }*/
}

/* Esta función se encarga de incluir en el sistema las marcas de rastreos
 * necesarias para dar seguimiento a las actividades de los usuarios en
 * el sistema.
 * Con respecto a esta función, el parámetro tipo puede tener uno de los siguientes valores:
 * L: Login y Logout de la Intranet.
 * C: Consulta de Datos, sea en forma de Listado o individualmente.
 * I: Inclusión de Datos en el Sistema.
 * M: Modificación de Datos en el Sistema.
 * E: Eliminación de Datos en el Sistema.
 * R: Error en la insersión de Datos.
 * A: Aprobaciones o Autorizaciones.
 * D: Desaprobaciones o Rechazos
 */
  function inserta_rastro($login,$cedula,$tipo,$descripcion,$ip,$sender)
    {
        try
        {
            $db = $sender->Application->Modules["db"]->DbConnection;
            $db->Active=true;
            $consulta="insert into rastreo(login,cedula,tipo,descripcion,ip)
                       values ('$login','$cedula','$tipo','$descripcion','$ip')";
            $ejecucion = $db->createCommand($consulta)->execute();
            $db->Active=false;
            return $ejecucion;
        }
        catch(Exception $e)
        {
            $mensaje=$e->getMessage();
            // el error 8 es error grardando datos
            $sender->Response->redirect($sender->Service->constructUrl('admin.mensaje.mensaje',array('codigo'=>'00008','adic'=>$mensaje)));
        }
	}

/* Esta función se encarga de traer el siguiente número consecutivo del campo
 * de la tabla que se haya seleccionado, es útil para separar códigos únicos
 * de identificación de los índices (id) de la tabla, ya que si se llega a
 * reindexar la tabla por labores de mantenimiento y han existido eliminaciones,
 * la integridad de los datos se perdería.
 *
 * Se le añade a la función la habilidad
 * de localizar el proximo numero del campo en la tabla dependiendo de otros
 * valores condicionales que se debe cumplir tambien. Por ejemplo, cuando el
 * código depende de si es de una organización u otra. 000001 -> 001
 * 000002 -> 001, así tanto la organizacion 000001 como la 000002 tienen 001 y
 * el siguiente es 002 invididualmente por cada organizacion.
 *
 * Al momento de la llamada, el parámetro arreglo, se puede definir como nulo
 * si solo interesa que se busque en un solo campo, si no, es necesario que se
 * defina de la manera   indice => valor
 */
  function proximo_numero($tabla,$campo,$arreglo,$sender)
    {
        $db = $sender->Application->Modules["db"]->DbConnection;
        $db->Active=true;
        $consulta = "select max($campo) as maximo from $tabla";

        /* se añaden las extensiones de la consulta que hagan falta si en el
           arreglo de entrada vienen datos adicionales */
        if (empty($arreglo) == false)
        {
            $consulta = $consulta." where ";
            $solo_un_valor = true;
            foreach($arreglo as $indice => $valor)
              {
                  /* si la siguiente condicion se cumple, quiere decir que por lo
                   * menos es la segunda vez que se entra
                   */
                  if ($solo_un_valor == false)
                  {
                      $consulta=$consulta." and ";
                  }
                  $consulta = $consulta."(".$indice." = '".$valor."')";
                  $solo_un_valor = false;
              }            
        }

        $resultado = $db->createCommand($consulta)->query();
        $dataset=$resultado->readAll();
        $codigo_nuevo=$dataset[0]["maximo"]+1;
        $db->Active=false;

        return $codigo_nuevo;
	}

 /* Esta función se encarga de verificar la existencia de un valor dada una
  * tabla(bd.tabla) y el nombre del campo, además comprueba los valores adicionales
  * pasados como parámetros en el arreglo recibido. Si solo se desea buscar un valor individual,
  * el valor del arreglo pasado como parámetro debe ser null. Ver organizacion.incluir_persona
  */
    function verificar_existencia($tabla,$campo,$valor,$arreglo,$sender)
    {
        $db = $sender->Application->Modules["db"]->DbConnection;
        $db->Active=true;
        $consulta = "select $campo from $tabla where ($campo='$valor')";
        /* se añaden las extensiones de la consulta que hagan falta si en el
           arreglo de entrada vienen datos adicionales */
        if (empty($arreglo) == false)
        {
            $consulta = $consulta." and ";
            $solo_un_valor = true;
            foreach($arreglo as $indice => $valor)
              {
                  /* si la siguiente condicion se cumple, quiere decir que por lo
                   * menos es la segunda vez que se entra
                   */
                  if ($solo_un_valor == false)
                  {
                      $consulta=$consulta." and ";
                  }
                  $consulta = $consulta."(".$indice." = '".$valor."')";
                  $solo_un_valor = false;
              }
        }
        $resultado = $db->createCommand($consulta)->query();
        $dataset=$resultado->readAll();
        $encontrado=$dataset[0][$campo];
        $db->Active=false;
           if ($encontrado=='')//si no encuentra el valor devuelve true
           return True;
           else
           return False;
    }


/*Esta función se encarga de verificar la existencia de un registro en la base
 * de datos dados dos valores a buscar en dos campos CARLOS: DOCUMENTA TUS FUNCIONES!!!.
 */
    function verificar_existencia_doble($tabla,$campo,$valor,$campo2,$valor2,$sender)//cuando verificas 2 campos de la bd
    {
        $db = $sender->Application->Modules["db"]->DbConnection;
        $db->Active=true;
        $consulta = "select $campo , $campo2 from $tabla where $campo='$valor' and $campo2='$valor2'";
        $resultado = $db->createCommand($consulta)->query();
        $dataset=$resultado->readAll();
        $encontrado=$dataset[0][$campo];
        $db->Active=false;
           if ($encontrado=='')//si no encuentra el valor devuelve true
           return true;
           else
           return false;
    }

?>