<?php
class admin_layout extends TTemplateControl
{

    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->page->IsPostBack)
          {
            comprueba_sesion($this);
            $this->lbl_usuario_top->Text = usuario_actual('login')." / ".usuario_actual('nombre')." ".usuario_actual('apellido');
            $menu_elaborado = elabora_menu($this);
            $this->menu->Text=$menu_elaborado;
            // se llena la información del usuario logeado si es el caso.
            $sesion = new THttpSession;
            $sesion->open();
             if (isset($sesion['speakup_login']))
            {
               $this->lbl_usuario_top->Text="Bienvenido ".$sesion['speakup_login']."!&nbsp;&nbsp;&nbsp;";
               $this->salir->Visible="true";
               $this->entrar->Visible="false";
            }else
            {
               $this->lbl_usuario_top->Text="Usted No ha iniciado una sesión.";
               $this->salir->Visible="false";
               $this->entrar->Visible="true";
            }
            $sesion->close();
            $this->lbl_mensaje_al_usuario->Text = ver_mensaje_al_usuario($this);
          }
    }

    public function inicio_click($sender,$param)
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

    public function inicio_sesion_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('admin.inicio'));
    }

    public function ir_a_classboard($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('admin.clases.class_board'));
    }

    public function logout_clicked($sender,$param)
    {
        logout_usuario($sender);
    }

}
?>
