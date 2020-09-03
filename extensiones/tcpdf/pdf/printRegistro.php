<?php

require_once "../../../controladores/registro.controlador.php";
require_once "../../../modelos/registro.modelo.php";

require_once "../../../controladores/documento.controlador.php";
require_once "../../../modelos/documento.modelo.php";

require_once "../../../controladores/entidad.controlador.php";
require_once "../../../modelos/entidad.modelo.php";

require_once "../../../controladores/funcionario.controlador.php";
require_once "../../../modelos/funcionario.modelo.php";


class imprimirRegistro
{

    public $idRegistro;

    public function traerImpresionRegistro()
    {
        //TRAEMOS LA INFORMACION DEL TICKET
        $item = "id";
        $valor = $this->idRegistro;

        $respuestaTicket = ControladorRegistro::ctrMostrarRegistro($item, $valor);

/* 
        $TipoDocF = json_decode($respuestaTicket["TipoDocF"], true);
        $num_documento = json_decode($respuestaTicket["num_documento"], true);
        $nombre = substr($respuestaTicket["nombre"], 0);

        $cargo = substr($respuestaTicket["cargo"], 0);
        $ent_funcionario = substr($respuestaTicket["ent_funcionario"], 0);
        $motivo = substr($respuestaTicket["motivo"], 0);
        $servidor_publico = substr($respuestaTicket["servidor_publico"], 0);
        $area_oficina_sp = substr($respuestaTicket["area_oficina_sp"], 0);
        $cargo = substr($respuestaTicket["cargo"], 0);
        $fecha_ingreso = substr($respuestaTicket["fecha_ingreso"], 0);
        $hora_ingreso = substr($respuestaTicket["hora_ingreso"], 0);

        $fecha_salida = substr($respuestaTicket["fecha_salida"], 0);
        $hora_salida = substr($respuestaTicket["hora_salida"], 0);
        $usuario = substr($respuestaTicket["usuario"], 0); */

        require_once('./tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->startPageGroup();
        $pdf->AddPage();

        $bloque1 = <<<EOF
       
	<table>
		
		<tr>
			<br>
			<td style="width:200px"><img src="images/image_demo.jpg"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
                        Central Telefónica: 
                        (+51) 477 5360, 477 5770, 477 3458 
				</div>

            </td>
            
			<td style="background-color:white; width:185px">

				<div style="font-size:9px; text-align:center; line-height:15px;">
					
					Área de Programación y Desarrollo Informático<br>
                    ETF Tecnologías de la Información 

				</div>
				
			</td>

			

		</tr>

	</table>
     
       
EOF;
        $pdf->writeHTML($bloque1, false, false, false, false, '');
        //-------------------------------------------------------------------------------------------------------------------------------

        //------------------------------------------------------------------
        $bloque4 = <<<EOF
<br>
<br>
<p style="text-align:center;font-size: xx-small;">--------------------------------------</p>
<p style="text-align:center;font-size: xx-small;"><br><br></p>
<p style="text-align:center;font-size: xx-small;">DIGITADOR</p>        
        
EOF;
        $pdf->writeHTML($bloque4);
        //------------------------------------------------------------------

        //******************************************************************
        //SALIDA DEL ARCHIVOS
       /*  header('Content-type: application/pdf'); */
      /*   $pdf->Output('printRegistro.pdf'); */
        $pdf->Output('printRegistro.pdf','I');
    }
}

$registro = new imprimirRegistro();
$registro->idRegistro = $_GET["idRegistro"];
$registro->traerImpresionRegistro();

?>