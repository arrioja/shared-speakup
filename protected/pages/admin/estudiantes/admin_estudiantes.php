<?php

class admin_estudiantes extends TPage
{
    		function createMultiple($link, $array) {
                        $item = $link->Parent->Data;
                        $return = array();
                        foreach($array as $key) {
                              $return[] = $item[$key];
                         }
                         return implode(",", $return);
                }

    public function cargar()
    {
        
        $sql="select * from speakup.estudiantes order by id asc";
        $resultado=cargar_data($sql,$this);
        return $resultado;
    }

    public function eliminar($sender,$param)
    {
/*
   $parametros=$sender->CommandParameter;//recibe un array
   $datos=explode(",", $parametros); 
   $cod=$datos[0];
   $tipo_nomina=$datos[1];
   $cod_org=usuario_actual('cod_organizacion');//codigo de la organizacion del usuario logueado

   $sql="delete from nomina.nomina where cod='$cod' and tipo_nomina='$tipo_nomina' and '$cod_org'";
   $resultado=modificar_data($sql,$this);

        $this->DataGrid->DataSource=$this->cargar();
        $this->DataGrid->dataBind();*/
    }

public function editar($sender,$param)
    {

     $parametros=$sender->CommandParameter;//recibe un array
     $datos=explode(",", $parametros);
     $id=$datos[0];
     $this->Response->redirect($this->Service->constructUrl('admin.estudiantes.editar_estudiantes',array('id'=>$id)));
       
    }

    public function archivo_banco($sender,$param)
    {

   $parametros=$sender->CommandParameter;//recibe un array
   $datos=explode(",", $parametros);
   $cod=$datos[0];//codigo de nomina
   $tipo_nomina=$datos[1];//tipo de nomina
   $cod_org=usuario_actual('cod_organizacion');//codigo de la organizacion del usuario logueado

        $this->Response->redirect($this->Service->constructUrl('nomina.nominas.archivo_banco',array('cod_nomina'=>$cod,'tipo_nomina'=>$tipo_nomina)));

    }

    public function reset()
    {
        $this->DataGrid->EditItemIndex=-1;
        $this->txt_cadena->Text="";

        $this->DataGrid->DataSource=$this->cargar();
        $this->DataGrid->dataBind();

    }

    function regresar($serder,$param)
    {
        $sesion = new THttpSession;
        $sesion->open();
        if (isset($sesion['speakup_login']))
        {
            $this->Response->redirect($this->Service->constructUrl('admin.inicio'));
        }
        else
        {
            $this->Response->redirect($this->Service->constructUrl('Home'));
        }
    }

public function onLoad($param)
	{
       parent::onLoad($sender,$param);
       if (!$this->IsPostBack)
		{

        $this->DataGrid->DataSource=$this->cargar();
		$this->DataGrid->dataBind();
        }

   }
    public function cancelItem($sender,$param)
    {
        $this->DataGrid->EditItemIndex=-1;
        $this->DataGrid->DataSource=$this->cargar();
		$this->DataGrid->dataBind();

    }
    public function editItem($sender,$param)
    {
        $this->DataGrid->EditItemIndex=$param->Item->ItemIndex;
        $this->DataGrid->DataSource=$this->cargar();
		$this->DataGrid->dataBind();

    }

    public function saveItem($sender,$param)
    {
        $item=$param->Item;

        $id=$this->DataGrid->DataKeys[$item->ItemIndex];//cod
        $f_pago=$item->f_pago->TextBox->Text;

		$sql="UPDATE nomina.nomina_actual set f_pago='$f_pago' where cod='$id'";

        $resultado=modificar_data($sql,$this);

        $this->DataGrid->EditItemIndex=-1;
        $this->DataGrid->DataSource=$this->cargar();
        $this->DataGrid->dataBind();

    }

    public function itemCreated($sender,$param)
    {          // Sender is the datagrid object
  // Param is a TDataGridEventParameter  which contains the item newly created

        $item=$param->Item;
        //echo $item->ItemType;
        if($item->ItemType==='EditItem')
        {
            // set column width of textboxes
            //$item->cod->TextBox->ReadOnly="True";
            /*$item->anos->TextBox->Columns=8;*/

        }

    }

  public function formatear($sender,$param)
    {
        $item=$param->Item;
            if ($item->f_pago->Text!='Fecha Pago')
            $item->f_pago->Text=cambiaf_a_normal($item->f_pago->Text);

    }




    public function deleteItem($sender,$param)//sin revisar
    {
        $id=$this->DataGrid->DataKeys[$param->Item->ItemIndex];
        echo $id;
        /*$sql="DELETE FROM nomina.integrantes WHERE id = '$id'";
        $this->DataGrid->EditItemIndex=-1;
        $resultado=modificar_data($sql,$this);
        $this->Response->redirect($this->Service->constructUrl('nomina.integrantes.admin_integrantes'));
*/
    }



    public function changePage($sender,$param)
	{
       		$this->DataGrid->CurrentPageIndex=$param->NewPageIndex;
            $this->DataGrid->DataSource=$this->cargar();
            $this->DataGrid->dataBind();
	}

	public function pagerCreated($sender,$param)
	{
		$param->Pager->Controls->insertAt(0,'Pagina: ');
	}
}

/*
        */
?>
