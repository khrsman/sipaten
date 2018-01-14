<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');
          $this->load->library('cb_options');
    }

    // view
    function index(){
    $data['page'] = 'v_dashboard';
    $data['jumlah_warga'] = $this->M_dashboard->get_jumlah_penduduk();
    $data['jumlah_surat'] = $this->M_dashboard->get_jumlah_surat();
    $data['pamong'] = $this->M_dashboard->get_pamong();
    $this->load->view('v_main',$data);
    }
}
?>
