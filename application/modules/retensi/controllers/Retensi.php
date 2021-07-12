<?php

class Retensi extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('m_retensi');
        $this->load->helper('file');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN PETUGAS
    |--------------------------------------------------------------------------
    */

    public function auth() {
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('path');
        $this->load->model('m_retensi');
        $login = $this->m_retensi->login($this->input->post('user_nm'), md5($this->input->post('pwd0')));

        if ($login == 1) {
        //  ambil detail data
            $row = $this->m_retensi->data_login($this->input->post('user_nm'), md5($this->input->post('pwd0')));

        //  daftarkan session
            $data = array(
                'logged' => TRUE,
                'user_id' => $row->user_id,
                'user_nm' => $row->user_nm,
                'pwd0' => $row->pwd0,
                'pgroup_id' => $row->pgroup_id,
                'pgroup_cd' => $row->pgroup_cd,
                'person_nm' => $row->person_nm
            );
            $this->session->set_userdata($data);

            redirect('/index.php/retensi/dasbor','refresh');

        } else {
        //  tampilkan pesan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-remove"></i>
                    Username / Password anda salah.
                  </div>');
            redirect('/index.php');
        }
    }

    function out() {
        $this->load->helper('url');
        //destroy session
        $this->session->sess_destroy();
        //redirect ke halaman login
        redirect(site_url('index.php'));
    }
    /*
    |--------------------------------------------------------------------------
    | END OF LOGIN PETUGAS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | DASBOR
    |--------------------------------------------------------------------------
    */
    public function dasbor() {
        $data['title'] = "Dasbor";
        $data['view'] = "dasbor";
        $this->load->view('header_admin',$data);
    }

    public function total_data() {
        $data['title'] = "total_data";
        $data['view'] = "total_data";
        $this->load->view('header_admin',$data);
    }

    public function total_data_pasien($id){
//        $data['data_retensi_by_id'] = $this->m_retensi->data_retensi_by_id($id);
        $data['title'] = "total_data";
        $data['view'] = "total_data";
//        $data['get_status'] = $this->m_retensi->get_status();
        $this->load->view('header_admin',$data);
    }

    /*
    |--------------------------------------------------------------------------
    | END OF DASBOR
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RETENSI
    |--------------------------------------------------------------------------
    */
    public function data_retensi() {
        $data['title'] = "Data Retensi";
        $data['view'] = "data_retensi";
        $data['get_status'] = $this->m_retensi->get_status();
        $this->load->view('header_admin',$data);
    }

    function data_retensi_show() {
        $data=$this->m_retensi->retensi_list();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getNamaPasien() {
        //$this->db->select('person_nm');
        $this->db->join('xocp_persons', 'xocp_ehr_patient.person_id = xocp_persons.person_id');
        $this->db->order_by('person_nm', 'ASC');
        $this->db->where('patient_ext_id', $_POST['no_rm']);
        $hsl = $this->db->get('xocp_ehr_patient');

        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'response' => 200,
                    'isi' => array(
                        'patient_ext_id' => $data->patient_ext_id,
                        'person_nm' => $data->person_nm,
                        'birth_dttm' => date('Y-m-d', strtotime($data->birth_dttm)),
                        'ext_id' => $data->ext_id,
                        'telecom' => explode("|", $data->telecom)[2],
                    )
                );
            }
        }

        $response = json_encode($hasil, true);
        echo $response;
    }

    function simpan_retensi(){
        $no_rm = $this->input->post('no_rm');
        $nama = $this->input->post('nama');
        $tgl_lhr = $this->input->post('tgl_lhr');
        $ktp = $this->input->post('ktp');
        $telpon = $this->input->post('telpon');
        $id_status = $this->input->post('id_status');

        $cek = $this->m_retensi->cari_rm_data_retensi($no_rm);
        if ($cek == $no_rm) {
            $data = array(
                'response' => 'gagal'    
            );
            
        } else {
            $data = array(
                'response' => 'berhasil',
                'hasil' => $this->m_retensi->simpan_retensi($no_rm,$nama,$tgl_lhr,$ktp,$telpon,$id_status),
            );
        }
        
        echo json_encode($data);
    }

    function hapus_retensi(){
        $id_retensi =$this->input->post('id_retensi');
        $data = $this->m_retensi->hapus_retensi($id_retensi);
        echo json_encode($data);
    }

    function get_retensi(){
        $id_retensi = $this->input->get('id_retensi');
        $data = $this->m_retensi->get_retensi_by_id($id_retensi);
        echo json_encode($data);
    }

    /*
    |--------------------------------------------------------------------------
    | END OF RETENSI
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | DATA PASIEN RETENSI
    |--------------------------------------------------------------------------
    */
    public function data_pasien($id){
        $data['data_retensi_by_id'] = $this->m_retensi->data_retensi_by_id($id);
        $data['title'] = "Data Pasien";
        $data['view'] = "data_pasien";
//        $data['get_status'] = $this->m_retensi->get_status();
        $this->load->view('header_admin',$data);
    }

    function data_dokumen_show($no_rm){
        $data = $this->m_retensi->data_dokumen_list($no_rm);
        echo json_encode($data);
    }
    
    function simpan_dokumen($no_rm){
        $nm_dokumen = $this->input->post('nm_dokumen');
        $tahun = $this->input->post('tahun');
        $data =$this->m_retensi->simpan_dokumen($no_rm,$nm_dokumen,$tahun);
        echo json_encode($data);
        
    }
    /*
    |--------------------------------------------------------------------------
    | END OF DATA PASIEN RETENSI
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | PENGATURAN
    |--------------------------------------------------------------------------
    */
    public function jns_status() {
        $data['title'] = "Jenis Status";
        $data['view'] = "jenis_status";
        $this->load->view('header_admin',$data);
    }

    function data_jns_status() {
        $data=$this->m_retensi->status_list();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function simpan_status(){
        $nm_status = $this->input->post('nm_status');
        $data = $this->m_retensi->simpan_status($nm_status);
        echo json_encode($data);
    }

    function hapus_status(){
        $id_retensi_status =$this->input->post('id_retensi_status');
        $data = $this->m_retensi->hapus_status($id_retensi_status);
        echo json_encode($data);
    }

    function get_status(){
        $id_retensi_status = $this->input->get('id_retensi_status');
        $data = $this->m_retensi->get_status_by_id($id_retensi_status);
        echo json_encode($data);
    }

    function update_status(){
        $id_retensi_status = $this->input->post('id_retensi_status');
        $nm_status = $this->input->post('nm_status');
        $data = $this->m_retensi->update_status($id_retensi_status,$nm_status);
        echo json_encode($data);
    }
    /*
    |--------------------------------------------------------------------------
    | END OF PENGATURAN
    |--------------------------------------------------------------------------
    */

}
