<?php

class listar_estudiantes extends TPage
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
        
        $sql="select * from speakup.estudiantes e
              where (e.Programa IS NOT NULL)
              order by e.id asc";
        $resultado=cargar_data($sql,$this);
        return $resultado;
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
