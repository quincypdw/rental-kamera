<?php

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
    public $filename = '';
    public function __construct()
    {
        parent::__construct();
    }

    public function load_view($view, $data = array())
    {
        $html = get_instance()->load->view($view, $data, true);
        $this->load_html($html);
        $this->render();
        $this->stream($this->filename, array("Attachment" => false));
    }
}
