<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<com:THead Title="MercadoPana.com">
</com:THead>
<body leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 class="dropdown">
    <com:TForm ID="form">
        <table border="0" cellpadding=0 cellspacing=0 height=100% width=100%>
            <tr valign="top" height=2% >
                <td width=2%><img src=<%~ top_1.png %> width=361 height=43 border=0></td>
                <td width=2%><img src=<%~ top_2.png %> width=350 height=43 border=0></td>
                <td width=96%><img src=<%~ top_pa_fill.png %> width=100% height=43 border=0></td>
            </tr>
          <tr bgcolor="#03007a">
            <td class="vinculos" >
                <div align="left">Usuario: <com:TLabel ID="lbl_usuario_top" Text="SIN SESI&Oacute;N INICIADA"/> </div>
            </td>
            <td colspan="2"><div align="right"><span class="vinculos"><a href="?page=admin.inicio" class="vinculos">Inicio</a>&nbsp;&nbsp;/&nbsp;&nbsp;
             <com:TLinkButton Text="Salir"
                OnClick="logout_clicked"
                Visible="<%= !$this->User->IsGuest %>"
                CausesValidation="false" />
                        &nbsp;&nbsp;</span></div></td>
          </tr>
            <tr valign="top" height=94%>
              <td colspan="3"><div align="left"> <com:TContentPlaceHolder ID="cuerpo" /></div></td>
            </tr>
        </table>
    </com:TForm>
</body>
</html>