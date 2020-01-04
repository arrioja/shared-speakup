<?php
/*   ****************************************************  INFO DEL ARCHIVO
  Creado por:   Pedro E. Arrioja M.
  Descripción:  Este archivo implementa la inclusión de usuarios en el sistema.
     ****************************************************  FIN DE INFO
*/

class incluir_usuarios extends TPage
{
    public function onLoad($param)
    {
        parent::onLoad($param);
        if(!$this->IsPostBack)
          {
            /* actualiza el listado de paises */
          }
    }


    /* Comprueba que la cedula introducida no exista en la base de datos. */
    public function validar_cedula($sender, $param)
    {
        $param->isValid = true;
        $cedula=$this->txt_cedula->Text;
        $sql="select cedula from usuarios where cedula='$cedula'";
        $datos=cargar_data($sql,$sender);
        $param->isValid = empty($datos);
    }

    /* Comprueba que la cedula introducida no exista en la base de datos. */
    public function validar_login($sender, $param)
    {
        $param->isValid = true;
        $login=$this->txt_login->Text;
        $sql="select login from usuarios where login='$login'";
        $datos=cargar_data($sql,$sender);
        $param->isValid = empty($datos);
    }

    /* Se incluyen los datos del nuevo usuario en la base */
	public function btn_incluir_click($sender, $param)
	{
        if ($this->IsValid)
        {
            // Se capturan los datos provenientes de los Controles
            $cedula = $this->txt_cedula->Text;
            $nombre = $this->txt_nombre->Text;
            $apellido = $this->txt_apellido->Text;
            $sexo = $this->drop_sexo->SelectedValue;
            $telefono_hab = $this->txt_telefono_hab->Text;
            $telefono_cel = $this->txt_telefono_cel->Text;
            $login = $this->txt_login->Text;
            $clave=substr(MD5($this->txt_clave->Text), 0, 200);
            $email = $this->txt_email->Text;

            $incluir = $this->ch1->Checked;
            $listar = $this->ch2->Checked;
            $consultar = $this->ch3->Checked;
            $modificar = $this->ch4->Checked;
            $eliminar = $this->ch5->Checked;


            $codigo = proximo_numero("usuarios","cod_usuario",null,$sender);
            $codigo = rellena($codigo,6,"0");

            /* Se guardan los datos del usuario. */
            $sql="insert into usuarios (cod_usuario,cedula,nombres,apellidos,login, clave, email,
                                        sexo,telefono1,telefono2, insertar, listar, consultar, modificar, eliminar)
                  values ('$codigo','$cedula','$nombre','$apellido','$login','$clave','$email',
                          '$sexo','$telefono_hab','$telefono_cel',
                          '$incluir','$listar','$consultar','$modificar','$eliminar')";
            $resultado=modificar_data($sql,$sender);

            /* Se asigna un permiso basico al nuevo usuario; el grupo 000002
             * llamado Usuario Basico le permite al nuevo usuario hacer
             * operaciones basicas como cambiar su propia clave, publicar sus datos
             * etc, ademas de ver reportes relacionados con su estado de cuenta.
             */
            $sql="insert into usuarios_grupos (login, codigo)
                  values ('$login','000002')";
            $resultado=modificar_data($sql,$sender);

            /* Se incluye el rastro en el archivo de bitácora */
            $descripcion_log = "Incluido el usuario C.I.: ".$cedula." Nombre: ".$nombre." ".$apellido." / Login: ".$login;
            inserta_rastro(usuario_actual('login'),usuario_actual('cedula'),'I',$descripcion_log,"",$sender);

            $this->Response->redirect($this->Service->constructUrl('admin.inicio'));
        }
 	}
}

?>
