<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<com:THead Title="Instituto de Idiomas SpeakUp">
<link rel=stylesheet href= <%~ st.css %> type=text/css>
<style type="text/css">
<!--
.fo{
	background-image : url(<%~ foot.png %>);
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
<script type="text/javascript" src="llamada_mensaje.js"></script>
<body leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 >
    <com:TForm ID="form">
        <com:MensajeDiv ID="LTB"/>

            <com:TTable Height="100%" Width="100%" CellPadding="0" CellSpacing="0" BorderWidth="0" GridLines="None" >
                <com:TTableRow Height="100px">
                    <com:TTableCell Height="100px" VerticalAlign="Top">
                        <com:TTable Height="100px" Width="100%" CellPadding="0" CellSpacing="0" BorderWidth="0" GridLines="None" >
                            <com:TTableRow>
                                <com:TTableCell Width="2%">
                                    <com:TImage Height="100px" ImageUrl=<%~ speakup_carita.png %>/>
                                </com:TTableCell>
                                <com:TTableCell Width="2%">
                                    <com:TImage Height="100px" ImageUrl=<%~ speakup_nombre.png %>/>
                                </com:TTableCell>
                                <com:TTableCell Width="96%" HorizontalAlign="Right" Attributes.Style="background-image:url('imagenes/fondos/top_pa_fill.png')" >
                                    <com:TActiveLabel Font.Size = "20px" Font.Bold="true" ID="lbl_usuario_top" Text=""/><br>
                                    <com:TActiveLinkButton Text="<img src='imagenes/iconos/home.png' border='0' width='32px' height='32px' alt='Class Board' />" OnClick="ir_a_classboard" CausesValidation="False" />
                                    <com:TActiveLinkButton ID="entrar" Text="<img src='imagenes/iconos/password.png' border='0' width='32px' height='32px' alt='Inicio' />" OnClick="inicio_sesion_click" CausesValidation="False" />
                                    <com:TActiveLinkButton ID="salir" Visible="false" Text="<img src='imagenes/iconos/logout.png' border='0' width='32px' height='32px' alt='Inicio' />" OnClick="logout_clicked" CausesValidation="False" />

                                </com:TTableCell>
                            </com:TTableRow>
                        </com:TTable>
                    </com:TTableCell>
                </com:TTableRow>
                <com:TTableRow Height="100%">
                    <com:TTableCell Height="480px" VerticalAlign="Top">
                        <com:TTable  Width="100%" CellPadding="0" CellSpacing="0" BorderWidth="0" GridLines="None" >
                            <com:TTableRow>

                                <com:TTableCell Width="100%" VerticalAlign="Top">
                                    <com:TTable Height="30px" Width="100%" CellPadding="0" CellSpacing="0" BorderWidth="0" GridLines="None" >
                                        <com:TTableRow>
                                            <com:TTableCell Height="30" Width="100%" BackColor="#f4b485" BorderColor="#e8965a" HorizontalAlign="Center">
                                                contenido superior
                                            </com:TTableCell>
                                        </com:TTableRow>
                                        <com:TTableRow>
                                            <com:TTableCell Width="100%" VerticalAlign="Top" HorizontalAlign="Center">
                                                <br>
                                                <com:TContentPlaceHolder ID="cuerpo" />
                                            </com:TTableCell>
                                        </com:TTableRow>
                                    </com:TTable>

                                </com:TTableCell>
                            </com:TTableRow>
                        </com:TTable>
                    </com:TTableCell>
                </com:TTableRow>
                <com:TTableRow>
                    <com:TTableCell CssClass="fo">                        
                        <com:TLinkButton CausesValidation="false" Text="Inicio" OnClick="inicio_click" /> /
                        <com:TLinkButton CausesValidation="false" Text="Entrar" OnClick="inicio_sesion_click" />
                        Derechos Reservados 2010(c) SpeakUp. Instituto de Idiomas C.A.
                    </com:TTableCell>
                </com:TTableRow>
            </com:TTable>
    </com:TForm>
</body>
</html>