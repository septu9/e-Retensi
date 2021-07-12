<?php

class Surveilans extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('m_surveilans');
        $this->load->helper('file');
    }

    public function data_surveilans() {
        $data['ecoba_surveilans']=$this->m_surveilans->get_ecoba_surveilans();
        $data['title'] = "Data Surveilans";
        $data['view'] = "data_surveilans";
        $this->load->view('header_admin',$data);
    }

    function data_all_ecoba_surveilans(){
        $data = $this->m_surveilans->get_ecoba_surveilans(); // ambil dari model
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function data_surveilans_tambah() {
        $data['title'] = "Tambah Data Surveilans";
        $data['view'] = "data_surveilans_tambah";
        $this->load->view('header_admin',$data);
    }

    function data_surveilans_tambah_proses(){
        $tgl = $this->input->post('tanggal');
        $no_rm = $this->input->post('no_rm');
        $nm_pasien = $this->input->post('nm_pasien');
        $terpasang = $this->input->post('terpasang');
        $tinjauan = $this->input->post('tinjauan');
        
        $data = array(
            'tanggal' => $tgl,
            'no_rm' => $no_rm,
            'nm_pasien' => $nm_pasien,
            'terpasang' => $terpasang,
            'tinjauan' => $tinjauan,
        );

        $insert = $this->db->insert('ecoba_surveilans',$data);

        if($insert == true){
            echo "Data Berhasil Di Simpan";
            redirect('surveilans/data_surveilans');
        } else {
            echo "Data gagal di simpan";
        }
    }

    function data_surveilans_tambah_proses_js(){
        $tanggal = $this->input->post('tanggal');
        $no_rm = $this->input->post('no_rm');
        $nm_pasien = $this->input->post('nm_pasien');
        $terpasang = $this->input->post('terpasang');
        $tinjauan = $this->input->post('tinjauan');

        $data = $this->m_surveilans->data_surveilans_tambah_proses_js($tanggal, $no_rm, $nm_pasien, $terpasang, $tinjauan);
        echo json_encode($data);
    }

    function data_surveilans_hapus($id)
    {
        $data = array(
            'id_surveilans' => $id,
        );

        $delete = $this->db->delete('ecoba_surveilans', $data);

        if($delete == true){
            echo "Data Berhasil Di Hapus";
            redirect('surveilans/data_surveilans');
        } else {
            echo "Data gagal di Hapus";
        }
    }

    function delete_surveilans(){
        $id_surveilans = $this->input->post('id_surveilans');

        $data = $this->m_surveilans->delete_surveilans($id_surveilans);
        echo json_encode($data);
    }

    function data_surveilans_edit($id) {
        $data['ecoba_surveilans'] = $this->m_surveilans->get_ecoba_surveilans_byid($id);
        $data['title'] = "Edit Data Surveilans";
        $data['view'] = "data_surveilans_edit";
        $this->load->view('header_admin',$data);
    }

    function get_ecoba_surveilans_byid(){
        $id_surveilans = $this->input->get('id_surveilans');
        
        $data = $this->m_surveilans->get_ecoba_surveilans_byid($id_surveilans);
        echo json_encode($data);
    }

    function data_surveilans_edit_proses($id){
        $tgl = $this->input->post('tanggal');
        $no_rm = $this->input->post('no_rm');
        $nm_pasien = $this->input->post('nm_pasien');
        $terpasang = $this->input->post('terpasang');
        $tinjauan = $this->input->post('tinjauan');
        
        $data_edit = array(
            'tanggal' => $tgl,
            'no_rm' => $no_rm,
            'nm_pasien' => $nm_pasien,
            'terpasang' => $terpasang,
            'tinjauan' => $tinjauan,
        );

        $where = array(
            'id_surveilans' => $id,
        );

        $update = $this->db->update('ecoba_surveilans',$data_edit, $where);

        if($update == true) {
            echo "Data Berhasil Di Edit";
            redirect('surveilans/data_surveilans');
        }else {
            echo "Data gagal di Hapus";
        }
    }

    function edit_surveilans(){
        $id_surveilans = $this->input->post('id_surveilans');
        $tanggal = $this->input->post('tanggal');
        $no_rm = $this->input->post('no_rm');
        $nm_pasien = $this->input->post('nm_pasien');
        $terpasang = $this->input->post('terpasang');
        $tinjauan = $this->input->post('tinjauan');

        $data = $this->m_surveilans->edit_surveilans($id_surveilans, $tanggal, $no_rm, $nm_pasien, $terpasang, $tinjauan);
        echo json_encode($data);
    }
}