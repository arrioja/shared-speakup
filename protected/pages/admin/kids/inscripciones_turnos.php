<?php

class inscripciones_turnos extends TPage
{
  private $arreglo_dias = array(1=>"Lunes", 2=>"Martes",3=>"Miércoles",4=>"Jueves",5=>"Viernes",6=>"Sábado");
  private $arreglo_horas = array(9=>"9 am",10=>"10 am",11=>"11 am",12=>"12 m",13=>"1 pm",14=>"2 pm",15=>"3 pm",16=>"4 pm",17=>"5 pm",18=>"6 pm",19=>"7 pm",20=>"8 pm",);

    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
             $this->listar_clases($this);
          }
    }


    public function listar_clases($sender)
    {
        $this->DataGrid_horas->DataSource = turnos_clases($sender);
        $this->DataGrid_horas->dataBind();
    }

    public function formatear($sender, $param)
    {
        $item=$param->Item;
        if ($item->ItemType=='Item' || $item->ItemType=='AlternatingItem')
        {
            $item->desde->Text = cambiaf_a_normal($item->desde->Text);
            $item->hasta->Text = cambiaf_a_normal($item->hasta->Text);
            $item->dia->Text = $this->arreglo_dias[$item->dia->Text];
            $item->hora->Text = $this->arreglo_horas[$item->hora->Text];
            if ($item->cupo_disp->Text == 0)
            {
                $item->cupo_disp->BackColor="#ff6363";
            }
            else
            {
                $item->cupo_disp->BackColor="#85ff8b";
            }
        }
    }

    public function cancelar_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('admin.clases.class_board'));
    }

    public function inscripciones($sender, $param)
    {
       $cod=$sender->CommandParameter;
       $this->Response->redirect($this->Service->constructUrl('admin.kids.inscribir_en_turno',array('cod'=>$cod)));
    }
}
?>