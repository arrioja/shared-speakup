<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<com:THead Title="MercadoPana.com">
<link rel=stylesheet href= <%~ st.css %> type=text/css>
<style type="text/css">
<!--
.fo{
	background-image : url(<%~ foot.gif %>);
	background-repeat : repeat-x;
	background-position: bottom;
	vertical-align: middle;
	text-align: center;
	height: 30px;
	font-weight: bold;
}

-->
</style>
</com:THead>
<script type="text/javascript" src="protected/comunes/java/llamada_mensaje.js"></script>
<body leftmargin=0 topmargin=0 marginheight=0 marginwidth=0>
    <com:TForm ID="form">
        <table cellpadding=0 cellspacing=0 height=100% width=100%>
            <tr>
                <td valign=top>
                     <table width=100% cellpadding=0 cellspacing=0>
                         <tr>
                            <td width=2%><img src=<%~ top_1.png %> width=361 height=43 border=0></td>
                            <td width=2%><img src=<%~ top_2.png %> width=119 height=43 border=0></td>                           
                            <td width=96% background=<%~ top_pa_fill.png %> >
                                <div align="right">
                                    <com:TLinkButton CausesValidation="false" Text="Inicio" OnClick="inicio_click" /> /
                                    <com:TLinkButton CausesValidation="false" Text="Entrar" OnClick="inicio_sesion_click" /> /
                                    <com:TLinkButton CausesValidation="false" Text="Registo" OnClick="registrarse_click" />
                                </div>
                            </td>
                         </tr>
                         <tr>
                              <td colspan="3"><p align="justify">
                                <com:TContentPlaceHolder ID="cuerpo" />
                              </td>
                         </tr>
                     </table>
                </td>
            </tr>
            <tr>
                <td class=fo>
                    <com:TLinkButton CausesValidation="false" Text="Inicio" OnClick="inicio_click" /> /
                    <com:TLinkButton CausesValidation="false" Text="Entrar" OnClick="inicio_sesion_click" /> /
                    <com:TLinkButton CausesValidation="false" Text="Registrarse" OnClick="registrarse_click" /> /
                    <com:TLinkButton CausesValidation="false" Text="Acerca de" OnClick="acerca_de_click" /> /
                    <com:TLinkButton CausesValidation="false" Text="Privacidad" OnClick="privacidad_click" /> /
                    <com:TLinkButton CausesValidation="false" Text="Servicios" OnClick="servicios_click" /> /
                    <com:TLinkButton CausesValidation="false" Text="Contactos" OnClick="contactos_click" /> /                    
                </td>
             </tr>
        </table>
    </com:TForm>
</body>
</html>