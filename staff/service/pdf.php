<?php

require_once "dompdf/autoload.inc.php";
use Dompdf\Dompdf;

class Test extends Dompdf{
 public function __construct() {
        parent::__construct();
    }
}

?>