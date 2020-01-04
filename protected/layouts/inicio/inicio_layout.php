<?php
class inicio_layout extends TTemplateControl
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
    public function acerca_de_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('acerca_de'));
    }
    public function privacidad_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('privacidad'));
    }
    public function servicios_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('servicios'));
    }
    public function contactos_click($sender,$param)
    {
      $this->Response->redirect($this->Service->constructUrl('contactos'));
    }
}
?>
