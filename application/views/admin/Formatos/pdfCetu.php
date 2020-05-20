<?php 
require_once("system/libraries/dompdf/autoload.inc.php"); 
use Dompdf\Dompdf;

ob_start(); # apertura de bufer
include( 'cet.php' );
$html =ob_get_contents();
ob_end_clean(); # cierre de bufer

# Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();

# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->set_paper("letter", "portrait");

# Cargamos el contenido HTML.
$mipdf ->load_html(utf8_decode(utf8_encode($html)));

# Renderizamos el documento PDF.
$mipdf ->render();
ob_end_clean();

# Enviamos el fichero PDF al navegador.
$mipdf ->stream('FPGC-Formato_Cetuximab_VF.pdf');
 file_put_contents($path, $dompdf->output()); 
 header('Location: '.$path); 


?>