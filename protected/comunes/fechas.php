<?php
/*
****************************************************  INFO DEL ARCHIVO
  		   Creado por: 	Pedro E. Arrioja M.
  Descripción General:  Funciones principalmente relacionadas con el manejo de
 *                      fechas y horas, tengan o no que ver con base de datos,
 *                      son funciones de uso comun, pero generalmente usadas por
 *                      los modulos del sistema de asistencias.
****************************************************  FIN DE INFO
 */

/* Esta función cambia una fecha en formato normal dd/mm/aaaa a un formato que
 * sea aceptado por MySql aaaa-mm-dd.
 * Carlos Avila
 */
function cambiaf_a_mysql($fecha)
{
    ereg("([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
    return $lafecha;
}

/* Esta función cambia una fecha en formato aceptado por MySql aaaa-mm-dd a un
 * formato normal dd/mm/aaaa.
 * Carlos Avila
 */
function cambiaf_a_normal($fecha)
{
    ereg("([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
    return $lafecha;
}

/* Ésta función comprueba que la fecha corresponda con alguno de los días de la
 * semana marcados para comparar, es útil en la comprobación de los permisos
 * recurrentes de los reportes de asistencias; p.e. 05/05/2008,1,0,1,0,1 da como
 * resultado true porque se consulta la fecha (Lunes) y si cae lunes, miercoles
 * o viernes, la función se evalua cierta si la fecha cae en alguno de los dias
 * de la semana marcados con 1*/
function es_dia($fecha,$lu,$ma,$mi,$ju,$vi,$sa,$do)
{
 $resultado=false;
 list($dia, $mes, $anio) = split("/", $fecha);
 $mes=intval($mes);
 $dia=intval($dia);
 $anio=intval($anio);
 if ((date("D", mktime(0, 0, 0, $mes, $dia, $anio)) == 'Mon') && ($lu==1))
   {$resultado=true;}
 else
   {
     if ((date("D", mktime(0, 0, 0, $mes, $dia, $anio)) == 'Tue') && ($ma==1))
       {$resultado=true;}
     else
       {
         if ((date("D", mktime(0, 0, 0, $mes, $dia, $anio)) == 'Wed') && ($mi==1))
           {$resultado=true;}
         else
           {
             if ((date("D", mktime(0, 0, 0, $mes, $dia, $anio)) == 'Thu') && ($ju==1))
               {$resultado=true;}
             else
               {
                 if ((date("D", mktime(0, 0, 0, $mes, $dia, $anio)) == 'Fri') && ($vi==1))
                   {$resultado=true;}
                 else
                 {
                    if ((date("D", mktime(0, 0, 0, $mes, $dia, $anio)) == 'Sat') && ($sa==1))
                      {$resultado=true;}
                    else
                    {
                       if ((date("D", mktime(0, 0, 0, $mes, $dia, $anio)) == 'Sun') && ($do==1))
                         {$resultado=true;}  
                    }
                 }
               } // del else del jueves
           }// del else del miércoles
       } // del else del martes
   }// del else del lunes
return $resultado;
}


/* Esta Función devuelve el número de días de diferencia que existe entre dos fechas dadas*/
function num_dias_entre_fechas($fecha1,$fecha2)
{	// Separo los datos de fechamayor y fechamenor
    list($dia1,$mes1,$ano1) = explode("/",$fecha1);
    list($dia2,$mes2,$ano2) = explode("/",$fecha2);
    //calculo timestam de las dos fechas
    $mes1=intval($mes1);
    $dia1=intval($dia1);
    $ano1=intval($ano1);
    $mes2=intval($mes2);
    $dia2=intval($dia2);
    $ano2=intval($ano2);
    $timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
    $timestamp2 = mktime(0,0,0,$mes2,$dia2,$ano2);

    //resto a una fecha la otra
    $segundos_diferencia = $timestamp1 - $timestamp2;
    //convierto segundos en d�as
    $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);
    //obtengo el valor absoulto de los d�as (quito el posible signo negativo si me mandan las fechas menor y mayor invertidas)
    $dias_diferencia = abs($dias_diferencia);
    //quito los decimales a los d�as de diferencia
    $dias_diferencia = intval($dias_diferencia);
    return $dias_diferencia;
}

/* Esta función le suma $ndias a una $fecha dada y devuelve la nueva fecha resultante*/
function suma_dias($fecha, $ndias)
{
    list($dia, $mes, $ano) = split("/", $fecha);
    $mes=intval($mes);
    $dia=intval($dia);
    $ano=intval($ano);
    $nueva = mktime(0, 0, 0, $mes, $dia, $ano) + $ndias * 24 * 60 * 60;
    $nuevafecha = date("d/m/Y", $nueva);
    return $nuevafecha;
}

?>