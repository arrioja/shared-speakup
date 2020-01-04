<?php
class login_layout extends TTemplateControl
{
    public function onLoad($param)
    {

  //      $this->menu->Text=$menu_elaborado;
    }

    public function logout_clicked($sender,$param)
    {
        logout_usuario($sender);
    }

}
?>
