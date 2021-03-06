<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Warga extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_warga');
          $this->load->library('cb_options');
    }

    // view
    function index(){
    $data['page'] = 'v_warga';
    $this->load->view('v_main',$data);
    }

    function data_warga(){
    $this->load->view('v_data_warga');
    }

    function add_warga_page() {
      $this->load->view('v_warga_add');
    }

    public function page()
    {
      #--------------------------------------------------------------------------------------------------->
      #------------------------------------- Konfigurasi  ------------------------------------------------>
      #--------------------------------------------------------------------------------------------------->
      $per_page = 10; // jumlah data per halaman
      $from_page = $this->input->get('from') ?  $this->input->get('from'): 0; //data dimulai dari ...
      $search = $this->input->get("query") ? $this->input->get("query") : ''; // query pencarian

      #--------------------------------------------------------------------------------------------------->
      #------------------------------------- Ambil data  ------------------------------------------------->
      #--------------------------------------------------------------------------------------------------->

      $data = $this->M_warga->get_data($search,$from_page,$per_page); // ambil data
      $data_table = $data['data']; // data
      $total_rows = $data['total']; // jumlah data
      $total_page = $total_rows/$per_page; //jumlah halaman

      #--------------------------------------------------------------------------------------------------->
      #-------------------------------- Pagination button ------------------------------------------------>
      #--------------------------------------------------------------------------------------------------->
        $link = array();
        $from = 0;
        $count = 0;
        $awal_page = $from_page/$per_page >= 0 ? $from_page/$per_page : 1;
        $awal_page = ($awal_page - 5) > 0? $awal_page-5: 0;

        // looping untuk halaman
        for ($i=$awal_page; $i < $total_page; $i++) {
            if ($count >= 10 || $i >= $total_page) {
                break;
            }
            $from = $i * $per_page;
            $link[$i] = array("page" => $i+1, "from" => $from );
            $count++;
        }
        $first = array("page" => "<<", "from" => 0 );
        $last = array("page" => ">>", "from" => (ceil($total_page)-1) * $per_page );
        $next =   array("page" => ">", "from" => $from_page+$per_page );
        $prev =   array("page" => "<", "from" => $from_page-$per_page );

        if(($awal_page > 2)){
        $link = array( 0 => $first) + array( 1 => $prev) + $link;
        }
        $link = $link + array( "next" => $next) + array( "last" => $last);

        #--------------------------------------------------------------------------------------------------->
        #------------------------------------- Return JSON  ------------------------------------------------>
        #--------------------------------------------------------------------------------------------------->
        $data['value'] = $data_table;
        $data['page'] = $link;

         echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function get_for_edit(){
      $id = $this->input->get('id');
      $data = $this->M_warga->get($id);
      echo json_encode($data);
    }

    // tambah data
    function add(){
        $data = array();
        parse_str($_POST['data'], $data);
        // jika fieldnya auto increment
        if (isset($data['id_warga'])) {
          $data['id_warga'] = NULL;
        };
        $insert = $this->M_warga->insert($data);
        if (!$insert) {
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();
          }
    }

    // fungsi update
    function update(){
      $data = array();
      parse_str($_POST['data'], $data);
      $id = $data['id_warga'];
      $update = $this->M_warga->update_by_id($data,$id);
    }

    // fungsi hapus
    function delete(){
      $id = $this->input->get('id');
      $delete = $this->M_warga->delete_by_id($id);
    }


    function get_warga_by_select(){
      // print_r($this->input->get());
      // die;

    $id =   $this->input->get('id');
    $data = $this->M_warga->get_by_select($id);
        echo json_encode(array('results' => $data));
    }
    function get_warga_by_nik(){
      //  print_r($this->input->get());
      // die;

    $nik  =   $this->input->get('nik');
    $data = $this->M_warga->get_by_nik($nik);
        echo json_encode($data);
    }




}
?>
