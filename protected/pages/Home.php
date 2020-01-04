<?php
class Home extends TPage
{
    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {

          // color de speakup c85401


//            srand(); // para hacer seed del número random
            // Se seleccionan los 3 impelables que se mostrarán.
/*            $sql ="select a.cod_articulo, a.titulo, a.imagen_1, a.precio from articulos a
                   where ((a.impelables = '1') and
                          (a.estatus = 'OK'))
                   order by a.fecha_desde";
            $impelables=cargar_data($sql,$this);
            if (count($impelables) < 3)
            { // si no hay suficientes impelables, se colocan los que haya.
                $cont=1;
                foreach ($impelables as $un_dato) {
                    $esta_img = "img_impelable_".$cont;
                    $este_tit = "lbl_titulo_impelable_".$cont;
                    $este_pre = "lbl_precio_impelable_".$cont;
                    $this->$esta_img->ImageUrl = $un_dato['imagen_1'];
                    $this->$esta_img->CommandParameter = $un_dato['cod_articulo'];
                    $this->$este_tit->Text = substr($un_dato['titulo'], 0, 25)."...";
                    $this->$este_pre->Text = "Bs.F: ".$un_dato['precio'];
                    $cont=$cont+1;
                }
            }
            else
            { // si hay suficientes, se seleccionan los que van a aparecer

                $indice1 = $indice2 = $indice3 = -1;
                $indice1=rand(0,count($impelables)-1);
                $indice2=rand(0,count($impelables)-1);
                $indice3=rand(0,count($impelables)-1);
                while ($indice1 == $indice2)
                {$indice2=rand(0,count($impelables)-1);}
                while (($indice1 == $indice3) or ($indice2 == $indice3))
                {$indice3=rand(0,count($impelables)-1);}

                $this->img_impelable_1->ImageUrl = $impelables[$indice1]['imagen_1'];
                $this->img_impelable_1->CommandParameter = $impelables[$indice1]['cod_articulo'];
                $this->lbl_titulo_impelable_1->Text = substr($impelables[$indice1]['titulo'], 0, 25)."...";
                $this->lbl_precio_impelable_1->Text = "Bs.F: ".$impelables[$indice1]['precio'];

                $this->img_impelable_2->ImageUrl = $impelables[$indice2]['imagen_1'];
                $this->img_impelable_2->CommandParameter = $impelables[$indice2]['cod_articulo'];
                $this->lbl_titulo_impelable_2->Text = substr($impelables[$indice2]['titulo'], 0, 25)."...";
                $this->lbl_precio_impelable_2->Text = "Bs.F: ".$impelables[$indice2]['precio'];

                $this->img_impelable_3->ImageUrl = $impelables[$indice3]['imagen_1'];
                $this->img_impelable_3->CommandParameter = $impelables[$indice3]['cod_articulo'];
                $this->lbl_titulo_impelable_3->Text = substr($impelables[$indice3]['titulo'], 0, 25)."...";
                $this->lbl_precio_impelable_3->Text = "Bs.F: ".$impelables[$indice3]['precio'];
 
            }
            // Ahora se seleccionan los 6 Destacados que se mostrarán
            $sql ="select a.cod_articulo, a.titulo, a.imagen_1, a.precio from articulos a
                   where ((a.destacados = '1') and
                          (a.estatus = 'OK'))
                   order by a.fecha_desde";
            $destacados=cargar_data($sql,$this);

            if (count($destacados) < 6)
            { // si no hay suficientes impelables, se colocan los que haya.
                $cont=1;
                foreach ($destacados as $un_dato) {
                    $esta_img = "img_destacado_".$cont;
                    $este_tit = "lbl_titulo_destacado_".$cont;
                    $este_pre = "lbl_precio_destacado_".$cont;
                    $this->$esta_img->ImageUrl = $un_dato['imagen_1'];
                    $this->$esta_img->CommandParameter = $un_dato['cod_articulo'];
                    $this->$este_tit->Text = substr($un_dato['titulo'], 0, 25)."...";
                    $this->$este_pre->Text = "Bs.F: ".$un_dato['precio'];
                    $cont=$cont+1;
                }
            }
            else
            { // si hay suficientes, se seleccionan los que van a aparecer

                $indice1 = $indice2 = $indice3 = -1;
                $indice1=rand(0,count($destacados)-1);
                $indice2=rand(0,count($destacados)-1);
                $indice3=rand(0,count($destacados)-1);
                $indice4=rand(0,count($destacados)-1);
                $indice5=rand(0,count($destacados)-1);
                $indice6=rand(0,count($destacados)-1);
                // para que no existan articulos repetidos en el listado
                while ($indice1 == $indice2)
                {$indice2=rand(0,count($destacados)-1);}
                while (($indice1 == $indice3) or ($indice2 == $indice3))
                {$indice3=rand(0,count($destacados)-1);}
                while (($indice1 == $indice4) or ($indice2 == $indice4) or ($indice3 == $indice4))
                {$indice4=rand(0,count($destacados)-1);}
                while (($indice1 == $indice5) or ($indice2 == $indice5) or ($indice3 == $indice5)
                       or ($indice4 == $indice5))
                {$indice5=rand(0,count($destacados)-1);}
                while (($indice1 == $indice6) or ($indice2 == $indice6) or ($indice3 == $indice6)
                       or ($indice4 == $indice6) or ($indice5 == $indice6))
                {$indice6=rand(0,count($destacados)-1);}


                $this->img_destacado_1->ImageUrl = $destacados[$indice1]['imagen_1'];
                $this->img_destacado_1->CommandParameter = $destacados[$indice1]['cod_articulo'];
                $this->lbl_titulo_destacado_1->Text = substr($destacados[$indice1]['titulo'], 0, 25)."...";
                $this->lbl_precio_destacado_1->Text = "Bs.F: ".$destacados[$indice1]['precio'];

                $this->img_destacado_2->ImageUrl = $destacados[$indice2]['imagen_1'];
                $this->img_destacado_2->CommandParameter = $destacados[$indice2]['cod_articulo'];
                $this->lbl_titulo_destacado_2->Text = substr($destacados[$indice2]['titulo'], 0, 25)."...";
                $this->lbl_precio_destacado_2->Text = "Bs.F: ".$destacados[$indice2]['precio'];

                $this->img_destacado_3->ImageUrl = $destacados[$indice3]['imagen_1'];
                $this->img_destacado_3->CommandParameter = $destacados[$indice3]['cod_articulo'];
                $this->lbl_titulo_destacado_3->Text = substr($destacados[$indice3]['titulo'], 0, 25)."...";
                $this->lbl_precio_destacado_3->Text = "Bs.F: ".$destacados[$indice3]['precio'];

                $this->img_destacado_4->ImageUrl = $destacados[$indice4]['imagen_1'];
                $this->img_destacado_4->CommandParameter = $destacados[$indice4]['cod_articulo'];
                $this->lbl_titulo_destacado_4->Text = substr($destacados[$indice4]['titulo'], 0, 25)."...";
                $this->lbl_precio_destacado_4->Text = "Bs.F: ".$destacados[$indice4]['precio'];

                $this->img_destacado_5->ImageUrl = $destacados[$indice5]['imagen_1'];
                $this->img_destacado_5->CommandParameter = $destacados[$indice5]['cod_articulo'];
                $this->lbl_titulo_destacado_5->Text = substr($destacados[$indice5]['titulo'], 0, 25)."...";
                $this->lbl_precio_destacado_5->Text = "Bs.F: ".$destacados[$indice5]['precio'];

                $this->img_destacado_6->ImageUrl = $destacados[$indice6]['imagen_1'];
                $this->img_destacado_6->CommandParameter = $destacados[$indice6]['cod_articulo'];
                $this->lbl_titulo_destacado_6->Text = substr($destacados[$indice6]['titulo'], 0, 25)."...";
                $this->lbl_precio_destacado_6->Text = "Bs.F: ".$destacados[$indice6]['precio'];
            }

            // Se selecciona cual lobo solitario se mostrará.
            $sql ="select a.cod_articulo, a.titulo, a.imagen_1, a.precio from articulos a
                   where ((a.solitario = '1') and
                          (a.estatus = 'OK'))
                   order by a.fecha_desde";
            $solitario=cargar_data($sql,$this);

            if (!empty($solitario))
            {
                $indice=rand(0,count($solitario)-1);
                $this->img_solitario->ImageUrl = $solitario[$indice]['imagen_1'];
                $this->img_solitario->CommandParameter = $solitario[$indice]['cod_articulo'];
                $this->lbl_titulo_solitario->Text = substr($solitario[$indice]['titulo'], 0, 25)."...";
                $this->lbl_precio_solitario->Text = "Bs.F: ".$solitario[$indice]['precio'];
            }*/
          }
    }


    public function ver_articulo($sender, $param)
    {
//        $cod_articulo=$sender->CommandParameter;
//        $this->Response->redirect($this->Service->constructUrl('articulos.info_articulo',array('codigo'=>$cod_articulo)));
    }

}

?>
