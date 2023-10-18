<?php
defined('BASEPATH') or exit('No direct script access allowed');


class finger extends CI_Controller
{
    public $M_izin;
    public $input;
    public $db;
    var $template = 'templates/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_izin');
    }
}
