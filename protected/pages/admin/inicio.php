<?php

// <com:THyperLink NavigateUrl="#'?page=Test:Products&removeProduct=' . $this->Parent->Data['name']" Text="Remove" />
class inicio extends TPage
{
    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
              // se consulta la información del usuario
//              $login = usuario_actual('login');
//              $this->lbl_titulo->Text = "Hello!, ".usuario_actual('nombre')." (".$login.")";
                $misgrids = elabora_menu_grid($this);
               
          }
    }

    public function ver_mis_articulos_click($sender, $param)
    {
//        $this->Response->redirect($this->Service->constructUrl('perfil.mis_articulos',null));
    }
    
    public function ver_preguntas_click($sender, $param)
    {
//        $this->Response->redirect($this->Service->constructUrl('perfil.preguntas_pendientes',null));
    }

    public function ver_mi_perfil($sender, $param)
    {
//        $this->Response->redirect($this->Service->constructUrl('perfil.mi_perfil',null));
    }

    public function ver_calificaciones_click($sender, $param)
    {
//        $this->Response->redirect($this->Service->constructUrl('perfil.calificaciones_pendientes',null));
    }
    public function cargar_favoritos($cod_usuario)
    {
        // Se coloca la información de los artículos marcados como interesantes.
/*        $sql="select a.cod_articulo, a.titulo, a.precio, a.imagen_1
                    from articulos a, articulos_interesantes i
                    where ((i.cod_usuario = '$cod_usuario') and
                           (a.estatus = 'OK') and
                           (a.cod_articulo = i.cod_articulo))";
        $resultado=cargar_data($sql,$this);
        $this->DataGrid->DataSource = $resultado;
        $this->DataGrid->dataBind();*/
    }


    public function itemCreated($sender,$param)
    {
/*        $item=$param->Item;
        if($item->ItemType==='Item' || $item->ItemType==='AlternatingItem')
        {
            if ($sender->ID == "DataGrid"){
                // añade confirmación al boton de finalizar publicación
                $item->detalle->finaliza->Attributes->onclick='if(!confirm(\'Eliminar este artículo de su lista de favoritos?\')) return false;';
            }
        }*/
    }

    public function formatear($sender, $param)
    {
/*        $item=$param->Item;
        if ($item->ItemType=='Item' || $item->ItemType=='AlternatingItem')
        {
            $item->precio->Text = "Bs.F: ".number_format($item->precio->Text, 2, ',', '.');
        }*/
    }

/* Marca el producto en la lista de interesantes*/
    public function eliminar_favorito($sender, $param)
    {
/*        $cod_usuario=usuario_actual('cod_usuario');
        $cod_articulo=$sender->CommandParameter;
        $sql="Delete from articulos_interesantes
              Where (cod_usuario = '$cod_usuario') and
                    (cod_articulo = '$cod_articulo')";
        $resultado=modificar_data($sql,$this);
        $this->cargar_favoritos($cod_usuario);*/
    }

}
?>