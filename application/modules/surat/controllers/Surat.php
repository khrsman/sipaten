<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat');
          $this->load->library('cb_options');
    }

    // view
    function index(){
    $data['page'] = 'v_surat';
    $data['jenis_surat'] = $this->M_surat->get_jenis_surat();
    $this->load->view('v_main',$data);
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

      $data = $this->M_surat->get_data($search,$from_page,$per_page); // ambil data
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
        $next =   (ceil($total_page)-1) == 0? array("page" => ">", "from" => 0 ): array("page" => ">", "from" => $from_page+$per_page );
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

    function jenis_surat(){
    $data['jenis_surat'] = $this->M_surat->get_jenis_surat();
    $this->load->view('v_jenis_surat',$data);
    }

    function data_surat(){

    $this->load->view('v_surat_data');
    }

function download_surat(){

  $id = $this->input->get('id');
  $surat = $this->db->where('id_surat',$id)->get('surat')->result_array()[0];

  $id_jenis_surat = $surat['id_jenis_surat'];
  $file_surat = $this->M_surat->get_jenis_surat_by_id($id_jenis_surat)['file_surat'];
  $nama_surat = $this->M_surat->get_jenis_surat_by_id($id_jenis_surat)['nama'];
  $data_warga = $this->M_surat->get_data_warga($surat['id_warga']);
  $data_surat = json_decode($surat['isi']);

  $pamong = $this->M_surat->get_data_pamong($surat['id_pamong']);
  $jabatan = $this->M_surat->get_jabatan($surat['id_jabatan']);
  $config_desa= $this->M_surat->get_config_desa();


  $data_pamong_replace['[jabatan]'] = $jabatan['nama'];
  $data_pamong_replace['[nip_pamong]'] = $pamong['nip'];
  $data_pamong_replace['[nama_pamong]'] = $pamong['nama'];

  foreach ($data_surat as $key => $value) {
    $new_key = "[".$key."]";
   $data_surat_replace[$new_key] = $value;
  }

  foreach ($config_desa as $key => $value) {
      $new_key = "[".$value['kode']."]";
     $data_config_replace[$new_key] = $value['nama'];
  }
  foreach ($data_warga[0] as $key => $value) {
    $new_key = "[".$key."]";
   $data_warga_replace[$new_key] = $value;
  }


// buat file nya
$file = fopen($file_surat,'r');
$content = stream_get_contents($file);

$new_content = str_replace(array_keys($data_config_replace), array_values($data_config_replace), $content);
$new_content = str_replace(array_keys($data_warga_replace), array_values($data_warga_replace), $new_content);
$new_content = str_replace(array_keys($data_surat_replace), array_values($data_surat_replace), $new_content);
$new_content = str_replace(array_keys($data_pamong_replace), array_values($data_pamong_replace), $new_content);
// $new_content = str_replace('[judul_surat]',$nama_surat, $new_content);

$path_generated = realpath(APPPATH.'../file_surat/generated')."/";
$rtf_file = $path_generated.$nama_surat.".rtf";
$generated_file = base_url('file_surat/generated')."/".$nama_surat.".rtf";

$handle = fopen($rtf_file,'w+');
fwrite($handle,$new_content);
fclose($handle);
echo $generated_file;




}

    function create(){
    $jenis_surat = $this->input->get('jenis_surat');
    $detail_jenis_surat = $this->M_surat->get_detail_jenis_surat($jenis_surat);
    $detail_persyaratan = ($detail_jenis_surat['persyaratan'] !== "") ? $detail_jenis_surat['persyaratan'] : 0;
    $detail_field_isi = ($detail_jenis_surat['field_isi'] !== "") ? $detail_jenis_surat['field_isi'] : 0;


    $data['persyaratan'] = $this->M_surat->get_persyaratan($detail_persyaratan);
    $data['field_isi'] =$this->M_surat->get_field_isi($detail_field_isi);



    $data['nama_surat'] = $detail_jenis_surat['nama'];
    $data['id_jenis_surat'] = $jenis_surat;

    $this->load->view('v_buat_surat',$data);
    }


function buat_surat(){
  sleep(1);

  parse_str($this->input->post('data_surat'), $data_surat);
  parse_str($this->input->post('data_warga'), $data_warga);
  parse_str($this->input->post('data_persyaratan'), $data_persyaratan);
  parse_str($this->input->post('data_pamong'), $data_pamong);
  $file = $this->generate_surat($data_surat,$data_warga,$data_persyaratan,$data_pamong);

  echo $file;

}

    function generate_surat($data_surat,$data_warga_input,$data_persyaratan,$data_pamong){

      $id_jenis_surat = $data_surat['id_jenis_surat'];
      $file_surat = $this->M_surat->get_jenis_surat_by_id($id_jenis_surat)['file_surat'];
      $nama_surat = $this->M_surat->get_jenis_surat_by_id($id_jenis_surat)['nama'];
      $data_warga = $this->M_surat->get_data_warga($data_warga_input['detail_id_warga']);
      $pamong = $this->M_surat->get_data_pamong($data_pamong['id_pamong']);
      $jabatan = $this->M_surat->get_jabatan($data_pamong['id_jabatan']);
      $config_desa= $this->M_surat->get_config_desa();


      $data_pamong_replace['[jabatan]'] = $jabatan['nama'];
      $data_pamong_replace['[nip_pamong]'] = $pamong['nip'];
      $data_pamong_replace['[nama_pamong]'] = $pamong['nama'];

      foreach ($data_surat as $key => $value) {
        $new_key = "[".$key."]";
       $data_surat_replace[$new_key] = $value;
      }

      foreach ($config_desa as $key => $value) {
          $new_key = "[".$value['kode']."]";
         $data_config_replace[$new_key] = $value['nama'];
      }
      foreach ($data_warga[0] as $key => $value) {
        $new_key = "[".$key."]";
       $data_warga_replace[$new_key] = $value;
      }

$data_insert['id_jenis_surat'] = $id_jenis_surat;
$data_insert['id_warga'] = $data_warga_input['detail_id_warga'];
$data_insert['nomor'] = $data_surat['nomor_surat'];
$data_insert['isi'] = json_encode($data_surat);
$data_insert['persyaratan'] = json_encode($data_persyaratan);
$data_insert['tanggal'] = DateTime::createFromFormat('d/m/Y', $data_surat['tgl_surat'])->format('Y-m-d');
$data_insert['id_pamong'] = $data_pamong['id_pamong'];
$data_insert['id_jabatan'] = $data_pamong['id_jabatan'];
$insert = $this->M_surat->insert($data_insert);


if($insert){
  // buat file nya
  $file = fopen($file_surat,'r');
  $content = stream_get_contents($file);

  $new_content = str_replace(array_keys($data_config_replace), array_values($data_config_replace), $content);
  $new_content = str_replace(array_keys($data_warga_replace), array_values($data_warga_replace), $new_content);
  $new_content = str_replace(array_keys($data_surat_replace), array_values($data_surat_replace), $new_content);
  $new_content = str_replace(array_keys($data_pamong_replace), array_values($data_pamong_replace), $new_content);
  $new_content = str_replace('[judul_surat]',$nama_surat, $new_content);

  $path_generated = realpath(APPPATH.'../file_surat/generated')."/";
  $rtf_file = $path_generated.$nama_surat.".rtf";
  $generated_file = base_url('file_surat/generated')."/".$nama_surat.".rtf";

  $handle = fopen($rtf_file,'w+');
  fwrite($handle,$new_content);
  fclose($handle);
    return $generated_file;
} else{
  echo "gagal";
}


  }

}
?>
