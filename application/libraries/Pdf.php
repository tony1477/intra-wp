<?php
class pdf {
 
    function __construct() {
        include_once APPPATH . '/libparty/fpdf/fpdf.php';

/*         require_once APPPATH.'third_party/fpdf/fpdf-1.8.php'; 
        $pdf = new FPDF();
        $pdf->AddPage();
        $CI =& get_instance();
        $CI->fpdf = $pdf; */

    }
}
?>
