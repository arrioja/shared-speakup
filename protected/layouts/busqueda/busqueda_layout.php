<?php
class busqueda_layout extends TTemplateControl
{
    public function inicio_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('Home'));
    }

    public function inicio_sesion_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('admin.inicio'));
    }

    public function registrarse_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('admin.usuarios.incluir_usuarios'));
    }

}
?>
