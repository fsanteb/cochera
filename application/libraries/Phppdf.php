<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PHPPDF
{
    public function __construct()
    {
        require_once APPPATH.'third_party/fpdf/libraries/fpdf.php';
        //require_once APPPATH.'third_party\fpdf\libraries\fpdf.php';
    }
}


