<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
                                <com:TTableCell Width="2%" BackColor="#c85400" >
                                    <com:TImage Height="100px" ImageUrl=<%~ speakup_carita.png %>/>
                                </com:TTableCell>
                                <com:TTableCell Width="2%" BackColor="#c85400">
                                    <com:TImage Height="100px" ImageUrl=<%~ speakup_nombre.png %>/>
                                </com:TTableCell>
                                <com:TTableCell Width="96%" HorizontalAlign="Right" Attributes.Style="background-image:url('imagenes/fondos/top_pa_fill.png')" >
                                    <com:TActiveLabel Font.Size = "20px" Font.Bold="true" ID="lbl_usuario_top" Text=""/><br/>
                                    <com:TActiveLinkButton Text="<img src='imagenes/iconos/home.png' border='0' width='32px' height='32px' alt='Class Board' />" OnClick="inicio_click" CausesValidation="False" />
                                    <com:TActiveLinkButton Text="<img src='imagenes/iconos/class_board_peq.png' border='0' width='32px' height='32px' alt='Inicio' />" OnClick="ir_a_classboard" CausesValidation="False" />
                                    <com:TActiveLinkButton ID="entrar" Visible="false" Text="<img src='imagenes/iconos/password.png' border='0' width='32px' height='32px' alt='Inicio' />" OnClick="inicio_sesion_click" CausesValidation="False" />
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
                                            <com:TTableCell ColumnSpan="2" Height="30" Width="100%" BackColor="#f4b485" BorderColor="#e8965a" HorizontalAlign="Left">
                                                <com:TLiteral ID="menu" Text="" />
                                            </com:TTableCell>
                                        </com:TTableRow>
                                        <com:TTableRow>

                                            <com:TTableCell Width="150px" HorizontalAlign="Center" RowSpan="2" VerticalAlign="Top">
                                                <br>
                                                <div class="zxwidth_u">
                                                    <b class="zxtop"><b class="zxb1"></b><b class="zxb2 zcolor_verde"></b><b class="zxb3 zcolor_verde"></b><b class="zxb4 zcolor_verde"></b></b>
                                                    <div class="zxboxcontent ">
                                                        <com:TTable BorderWidth="0" CellPadding="0" CellSpacing="1" GridLines="None" Width="100%">
                                                            <com:TTableRow >
                                                                <com:TTableCell ColumnSpan="3" CssClass="encabezado_claro_1" HorizontalAlign="Right">
                                                                    <com:TLabel Text="Mi Resúmen"/>
                                                                </com:TTableCell>
                                                            </com:TTableRow>

                                                            <com:TTableRow>
                                                                <com:TTableCell Font.Size="14px" HorizontalAlign="Left">
                                                                    Clases Programadas:
                                                                </com:TTableCell>
                                                                <com:TTableCell Font.Size="14px" HorizontalAlign="Left">
                                                                    <com:TActiveLabel ID="lbl_reputacion_puntos" Text="0"/> &nbsp;
                                                                    <com:TLinkButton CausesValidation="false" Text="Ver" OnClick="ver_clases_click" />
                                                                </com:TTableCell>
                                                            </com:TTableRow>

                                                            <com:TTableRow>
                                                                <com:TTableCell Font.Size="5px" HorizontalAlign="Left">
                                                                    <br>
                                                                </com:TTableCell>
                                                            </com:TTableRow>

                                                            <com:TTableRow>
                                                                <com:TTableCell Font.Size="14px" HorizontalAlign="Left">
                                                                    Asistencias Pendientes:
                                                                </com:TTableCell>
                                                                <com:TTableCell Font.Size="14px" HorizontalAlign="Left">
                                                                    <com:TActiveLabel ID="lbl_reputacion_pos" Text="0"/> &nbsp;
                                                                    <com:TLinkButton CausesValidation="false" Text="Ver" OnClick="ver_clases_click" />
                                                                </com:TTableCell>
                                                            </com:TTableRow>

                                                            <com:TTableRow>
                                                                <com:TTableCell Font.Size="5px" HorizontalAlign="Left">
                                                                    <br>
                                                                </com:TTableCell>
                                                            </com:TTableRow>

                                                            <com:TTableRow>
                                                                <com:TTableCell Font.Size="14px" HorizontalAlign="Left">
                                                                    Exámenes Pendientes:
                                                                </com:TTableCell>
                                                                <com:TTableCell Font.Size="14px" HorizontalAlign="Left">
                                                                    <com:TActiveLabel ID="lbl_reputacion_neu" Text="0"/> &nbsp;
                                                                    <com:TLinkButton CausesValidation="false" Text="Ver" OnClick="ver_clases_click" />
                                                                </com:TTableCell>
                                                            </com:TTableRow>

                                                            <com:TTableRow>
                                                                <com:TTableCell Font.Size="5px" HorizontalAlign="Left">
                                                                    <br>
                                                                </com:TTableCell>
                                                            </com:TTableRow>

                                                            <com:TTableRow>
                                                                <com:TTableCell Font.Size="14px" HorizontalAlign="Left" ColumnSpan="2">
                                                                    Mensaje al usuario:
                                                                </com:TTableCell>
                                                            </com:TTableRow>

                                                            <com:TTableRow>
                                                                <com:TTableCell Font.Size="12px" HorizontalAlign="Justify" ColumnSpan="2">
                                                                    <br>
                                                                    <com:TActiveLabel ID="lbl_mensaje_al_usuario" Text="Este es un mensaje dirigido a los usuarios del sistema."/> &nbsp;
                                                                </com:TTableCell>
                                                            </com:TTableRow>
                                                        </com:TTable>
                                                    </div>
                                                    <b class="zxbottom"><b class="zxb4"></b><b class="zxb3"></b><b class="zxb2"></b><b class="zxb1"></b></b>
                                                </div>
                                            </com:TTableCell>
                                           

                                            <com:TTableCell VerticalAlign="Top" HorizontalAlign="Center">
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