<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/libparty/tcpdf/tcpdf.php';
class Pdf extends tcpdf
{
    function __construct()
    {
        parent::__construct();
    }
}
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */