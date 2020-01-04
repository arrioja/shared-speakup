<?php
class normal_layout extends TTemplateControl
{

    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->page->IsPostBack)
          {
            // se llena la información del usuario logeado si es el caso.
            $sesion = new THttpSession;
            $sesion->open();
             if (isset($sesion['speakup_login']))
            { // si hay una sesión iniciada, el usuario entra en el Home autenticado
               $this->lbl_usuario_top->Text="Bienvenido ".$sesion['speakup_login']."!&nbsp;&nbsp;&nbsp;";
               $this->salir->Visible="true";
               $this->entrar->Visible="false";
            }
            else
            {
               $this->lbl_usuario_top->Text="Usted No ha iniciado una sesión.";
               $this->salir->Visible="false";
               $this->entrar->Visible="true";
            }
            $sesion->close();
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

    public function logout_clicked($sender,$param)
    {
        logout_usuario($sender);
    }

}
?>
