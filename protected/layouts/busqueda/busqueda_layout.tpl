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

<body leftmargin=0 topmargin=0 marginheight=0 marginwidth=0>
    <com:TForm ID="form">
        <table cellpadding=0 cellspacing=0 height=100% width=100%>
            <tr><td valign=top>
                <table width=760 cellpadding=0 cellspacing=0>
                 <tr>
                     <td colspan=7><com:MBSWFObject SWFPath=<%~ top.swf %> Width="760px" Height="43px"/></td>
                 </tr>
             <tr>
               <td colspan=7><p align="justify">
                 <com:TContentPlaceHolder ID="cuerpo" /></td>
             </tr>
            </table>
            <tr><td class=fo><b>  <com:TLinkButton Text="Inicio" OnClick="inicio_click" /> /
                                  <com:TLinkButton Text="Entrar" OnClick="inicio_sesion_click" /> /
                                  <com:TLinkButton Text="Registrarse" OnClick="registrarse_click" /> /
                                  Acerca de / Privacidad / Servicios / Contactos </b></td>
             </tr>
        </table>
    </com:TForm>
</body>
</html>