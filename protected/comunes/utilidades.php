<?php
/*****************************************************  INFO DEL ARCHIVO
 * Creado por: 	Pedro E. Arrioja M. / Carlos A. Ávila P
 * Descripción: Contiene funciones de uso común principalmente relacionadas con
 *              el tratamiento de cadenas de caracteres, fechas, etc.
 *****************************************************  FIN DE INFO
*/

/* Esta función limpia la cadena de caracteres de entrada para que solo queden
 * números en la cadena de salida.
 */
function solo_numeros($cadena)
{
    $numeros = array ('0','1','2','3','4','5','6','7','8','9');
    for ($n = 0; $n < strlen($cadena)  ; $n++)
    {
        if (in_array($cadena[$n],$numeros))
        {
            $solonumeros = $solonumeros.$cadena[$n];
        }
    }
    return $solonumeros;
}


/* Esta función permite llenar con un caracter a la izquierda la cadena o el numero
 * que le haya sido suministrado como parámetro, devuelve tantos caracteres como
 * se le indique concatenado al parámetro de entrada.
 * Pedro Arrioja.
 */
function rellena($entrada,$maximo,$caracter)
{
    $salida = $entrada;
    for ($num = strlen($entrada) ; $num < ($maximo) ; $num++)
    {
        $salida=$caracter.$salida;
    }
    return $salida;
}

/* Esta función permite llenar con un caracter a la derecha la cadena o el numero
 * que le haya sido suministrado como parámetro, devuelve tantos caracteres como
 * se le indique concatenado al parámetro de entrada.
 * Nota Adicional: Se ha realizado una nueva función en vez de modificar la anterior
 * para mantener compatibilidad con el codigo que se haya escrito antes de crear esta
 * nueva funcion.
 * Pedro Arrioja.
 */
function rellena_derecha($entrada,$maximo,$caracter)
{
    $salida = $entrada;
    for ($num = strlen($entrada) ; $num < ($maximo) ; $num++)
    {
        $salida=$salida.$caracter;
    }
    return $salida;
}

/* Esta función se encarga de construir un esquema de menú utilizando ul y li
 * para ser implementado con los Css de cssmenu.co.uk
 * Pedro Arrioja
 */
function elabora_menu_backup($sender_local)
{
    /* Se saca los datos de la base de datos para comenzar la elaboración del
     * menú en base a los módulos que se encuentren disponibles.
     */
//	$sql="select codigo_modulo,nombre_corto,archivo_php from intranet.modulos order by codigo_modulo";
    $login = usuario_actual('login');
   // $login = "arrioja";
    $sql="SELECT distinct (b.codigo_modulo), m.nombre_corto, m.archivo_php
	  					   FROM usuarios_grupos as a, permisos_grupos as b,
                                modulos as m
						   WHERE ((a.login='$login') and (a.codigo=b.codigo_grupo) and (m.codigo_modulo = b.codigo_modulo))
						   ORDER BY b.codigo_modulo";
    $resul=cargar_data($sql,$sender_local);

    $submenu='<a href="#url"><b>';
    $submenu_2='<a class="sub" href="#url"><b>';
    $submenu_3='<a class="fly" href="#url"><b>';

    $sender_local->Service->constructUrl('Home');
    $menu_ul_li='<ul id="menu">';
    $maximo=false;
    $nivel = 0;
    for ($x = 0 ; $x < count($resul) ; $x++)
    {
        // un par de valores que acompañan al registro actual sin importar cual sea su nivel
        $nombre_modulo=$resul[$x]['nombre_corto'];
        $link='<a href="'.$sender_local->Service->constructUrl($resul[$x]['archivo_php']).'"><b>';


        $codigo_actual=$resul[$x]['codigo_modulo'][0].$resul[$x]['codigo_modulo'][1];
        $codigo_siguiente=$resul[$x+1]['codigo_modulo'][0].$resul[$x+1]['codigo_modulo'][1];
        if ($codigo_actual != $codigo_siguiente)
        {
            $menu_ul_li=$menu_ul_li."<li>".$link.$nombre_modulo."</b></a></li>";
            /* Este for permite devolver el nivel al principio, desde donde este */
             for ($xnivel = $nivel ; $xnivel > 1 ; $xnivel--)
            {
                 $menu_ul_li= $menu_ul_li."</ul>";
            }
            $nivel=1;
            $maximo=false;
        }
        else
        {
            $codigo_actual=$resul[$x]['codigo_modulo'][2].$resul[$x]['codigo_modulo'][3];
            $codigo_siguiente=$resul[$x+1]['codigo_modulo'][2].$resul[$x+1]['codigo_modulo'][3];
            if ($codigo_actual != $codigo_siguiente)
            {
                if ($nivel >= 2)
                {
                    $menu_ul_li=$menu_ul_li."<li>".$link.$nombre_modulo."</a></li>";
                    /* Este for permite devolver el nivel 2, desde donde este */
                    for ($xnivel = $nivel ; $xnivel > 2 ; $xnivel--)
                    {
                         $menu_ul_li= $menu_ul_li."</ul>";
                    }
                }
                else
                {
                    $menu_ul_li=$menu_ul_li.'<li>'.$submenu_2.$nombre_modulo."</b></a>";
                    $menu_ul_li= $menu_ul_li.'<ul class = "sub1">';
                }
                $nivel=2;
                $maximo=false;
            }
            else
            {
                $codigo_actual=$resul[$x]['codigo_modulo'][4].$resul[$x]['codigo_modulo'][5];
                $codigo_siguiente=$resul[$x+1]['codigo_modulo'][4].$resul[$x+1]['codigo_modulo'][5];
                if ($codigo_actual != $codigo_siguiente)
                {
                    if ($nivel >= 3)
                    {
                        $menu_ul_li=$menu_ul_li."<li>".$link.$nombre_modulo."</a></li>";
                        /* Este for permite devolver el nivel 2, desde donde este */
                        for ($xnivel = $nivel ; $xnivel > 3 ; $xnivel--)
                        {
                             $menu_ul_li= $menu_ul_li."</ul>";
                        }
                    }
                    else
                    {
                        $menu_ul_li=$menu_ul_li.'<li>'.$submenu_3.$nombre_modulo."</b></a>";
                        $menu_ul_li= $menu_ul_li.'<ul class = "fly1">';
                    }
                    $nivel=3;
                    $maximo=false;
                }
                else
                {
                    $codigo_actual=$resul[$x]['codigo_modulo'][6].$resul[$x]['codigo_modulo'][7];
                    $codigo_siguiente=$resul[$x+1]['codigo_modulo'][6].$resul[$x+1]['codigo_modulo'][7];
                    if ($codigo_actual != $codigo_siguiente)
                    {
                        $nivel=4;
                        if ($maximo==false)
                        {
                            $menu_ul_li=$menu_ul_li.'<li>'.$submenu_3.$nombre_modulo."</b></a>";
                            $menu_ul_li= $menu_ul_li.'<ul class = "fly1">';
                            $maximo=true;
                        }
                        else
                        {
                            $menu_ul_li=$menu_ul_li."<li>".$link.$nombre_modulo."</a></li>";
                        }
                    }
                }
            }
        }
    }
  $menu_ul_li= $menu_ul_li."</ul>";
  return $menu_ul_li;
}










/* Esta función se encarga de construir un esquema de menú utilizando ul y li
 * para ser implementado con los Css de cssmenu.co.uk
 * Pedro Arrioja
 */
function elabora_menu($sender_local)
{
    /* Se saca los datos de la base de datos para comenzar la elaboración del
     * menú en base a los módulos que se encuentren disponibles.
     */
//	$sql="select codigo_modulo,nombre_corto,archivo_php from intranet.modulos order by codigo_modulo";
    $login = usuario_actual('login');
   // $login = "arrioja";
    $sql="SELECT distinct (b.codigo_modulo), m.nombre_corto, m.archivo_php
	  					   FROM usuarios_grupos as a, permisos_grupos as b,
                                modulos as m
						   WHERE ((a.login='$login') and (a.codigo=b.codigo_grupo) and (m.codigo_modulo = b.codigo_modulo))
						   ORDER BY b.codigo_modulo";
    $resul=cargar_data($sql,$sender_local);

    $submenu='<a href="#url"><b>';
    $submenu_2='<a class="sub" href="#url"><b>';
    $submenu_3='<a class="fly" href="#url"><b>';

    $sender_local->Service->constructUrl('Home');
    $menu_ul_li='<ul id="menu">';
    $maximo=false;
    $nivel = 0;
    for ($x = 0 ; $x < count($resul) ; $x++)
    {
        // un par de valores que acompañan al registro actual sin importar cual sea su nivel
        $nombre_modulo=$resul[$x]['nombre_corto'];
        $link='<a href="'.$sender_local->Service->constructUrl($resul[$x]['archivo_php']).'"><b>';


        $codigo_actual=$resul[$x]['codigo_modulo'][0].$resul[$x]['codigo_modulo'][1];
        $codigo_siguiente=$resul[$x+1]['codigo_modulo'][0].$resul[$x+1]['codigo_modulo'][1];
        if ($codigo_actual != $codigo_siguiente)
        {
            $menu_ul_li=$menu_ul_li."<li>".$link.$nombre_modulo."</b></a></li>";
            /* Este for permite devolver el nivel al principio, desde donde este */
             for ($xnivel = $nivel ; $xnivel > 1 ; $xnivel--)
            {
                 $menu_ul_li= $menu_ul_li."</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->";
            }
            $nivel=1;
            $maximo=false;
        }
        else
        {
            $codigo_actual=$resul[$x]['codigo_modulo'][2].$resul[$x]['codigo_modulo'][3];
            $codigo_siguiente=$resul[$x+1]['codigo_modulo'][2].$resul[$x+1]['codigo_modulo'][3];
            if ($codigo_actual != $codigo_siguiente)
            {
                if ($nivel >= 2)
                {
                    $menu_ul_li=$menu_ul_li."<li>".$link.$nombre_modulo."</a></li>";
                    /* Este for permite devolver el nivel 2, desde donde este */
                    for ($xnivel = $nivel ; $xnivel > 2 ; $xnivel--)
                    {
                         $menu_ul_li= $menu_ul_li."</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->";
                    }
                }
                else
                {
                    $menu_ul_li=$menu_ul_li.'<li>'.$submenu_2.$nombre_modulo."</b><!--[if gte IE 7]><!--></a><!--<![endif]-->";
                    $menu_ul_li= $menu_ul_li.'<!--[if lte IE 6]><table><tr><td><![endif]--> <ul class = "sub1">';
                }
                $nivel=2;
                $maximo=false;
            }
            else
            {
                $codigo_actual=$resul[$x]['codigo_modulo'][4].$resul[$x]['codigo_modulo'][5];
                $codigo_siguiente=$resul[$x+1]['codigo_modulo'][4].$resul[$x+1]['codigo_modulo'][5];
                if ($codigo_actual != $codigo_siguiente)
                {
                    if ($nivel >= 3)
                    {
                        $menu_ul_li=$menu_ul_li."<li>".$link.$nombre_modulo."</a></li>";
                        /* Este for permite devolver el nivel 2, desde donde este */
                        for ($xnivel = $nivel ; $xnivel > 3 ; $xnivel--)
                        {
                             $menu_ul_li= $menu_ul_li."</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->";
                        }
                    }
                    else
                    {
                        $menu_ul_li=$menu_ul_li.'<li>'.$submenu_3.$nombre_modulo."</b><!--[if gte IE 7]><!--></a><!--<![endif]-->";
                        $menu_ul_li= $menu_ul_li.'<!--[if lte IE 6]><table><tr><td><![endif]--> <ul class = "fly1">';
                    }
                    $nivel=3;
                    $maximo=false;
                }
                else
                {
                    $codigo_actual=$resul[$x]['codigo_modulo'][6].$resul[$x]['codigo_modulo'][7];
                    $codigo_siguiente=$resul[$x+1]['codigo_modulo'][6].$resul[$x+1]['codigo_modulo'][7];
                    if ($codigo_actual != $codigo_siguiente)
                    {
                        $nivel=4;
                        if ($maximo==false)
                        {
                            $menu_ul_li=$menu_ul_li.'<li>'.$submenu_3.$nombre_modulo."</b><!--[if gte IE 7]><!--></a><!--<![endif]-->";
                            $menu_ul_li= $menu_ul_li.'<!--[if lte IE 6]><table><tr><td><![endif]--> <ul class = "fly1">';
                            $maximo=true;
                        }
                        else
                        {
                            $menu_ul_li=$menu_ul_li."<li>".$link.$nombre_modulo."</a></li>";
                        }
                    }
                }
            }
        }
    }
  $menu_ul_li= $menu_ul_li."</ul>";
  return $menu_ul_li;
}






/* Esta función se encarga de construir un grid de opciones y botones que se
 * presentan en la pantalla principal del usuario logueado
 * Pedro Arrioja
 */
function elabora_menu_grid($sender_local)
{
    $login = usuario_actual('login');
    $sql="SELECT distinct (b.codigo_modulo), m.nombre_corto, m.archivo_php, m.imagen_p
	  					   FROM usuarios_grupos as a, permisos_grupos as b,
                                modulos as m
						   WHERE ((a.login='$login') and (a.codigo=b.codigo_grupo) and 
                                  (m.codigo_modulo = b.codigo_modulo) and (visible_en_menu = '1'))
						   ORDER BY b.codigo_modulo";
    $resul=cargar_data($sql,$sender_local);

    $num_bot = 1;   

    $grid = '';

    foreach ($resul as $undato) {
        if ($num_bot == 1)
             { $grid = $grid.'<tr>'; }
        if ($num_bot <= 5)
        {
            $imagen = $undato['imagen_p'];
            $descripcion = $undato['nombre_corto'];
            $archivo_php = $undato['archivo_php'];
            $grid = $grid.'<td class="datos_centrados_claro_1">
                              <a href="index.php?page='.$archivo_php.'"><img src="imagenes/botones/'.$imagen.'" alt="'.$descripcion.'" width="64" height="64" border="0" /></a><br>
                                '.$descripcion.'
                           </td>';
            $num_bot++;
            if ($num_bot == 5)
            {
                $grid = $grid.'  </tr>';
                $num_bot = 1;
            }
        }
//        else
//        {
//            $grid = $grid.'</com:TTableRow>';
//            $num_bot = 1;
//        }
    }

  return $grid;
}



?>
