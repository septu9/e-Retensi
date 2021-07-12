<?php

class Users extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('m_users');
        $this->load->helper('file');
    }

    function data_user() {
        $data['ecoba_user']=$this->m_users->get_ecoba_users();
        $data['title'] = "Data User";
        $data['view'] = "data_user";
        $this->load->view('header_admin',$data);
    }

    function data_all_ecoba_users(){
        $data = $this->m_users->get_ecoba_users(); // ambil dari model
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    function data_user_tambah() {
        $data['title'] = "Tambah Data User";
        $data['view'] = "data_user_tambah";
        $this->load->view('header_admin',$data);
    }

    function data_user_tambah_proses(){
        $nm_user = $this->input->post('nm_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password_hash = md5($password);

        $data = array(
            'nm_user' => $nm_user,
            'username' => $username,
            'password' => $password,
            'password_hash' => $password_hash, 
        );

        $insert = $this->db->insert('ecoba_users',$data);

        if($insert == true){
            echo "Data Berhasil Di Simpan";
            redirect('users/data_user');
        } else {
            echo "Data gagal di simpan";
        }
    }

    function data_user_tambah_proses_js(){
        $nm_user = $this->input->post('nm_user2');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password_hash = md5($password);

        $data = $this->m_users->data_user_tambah_proses_js($nm_user, $username, $password, $password_hash);
        echo json_encode($data);
    }
    
    function data_user_hapus($id){
        $data = array(
            'id_user' => $id,
        );

        $delete = $this->db->delete('ecoba_users', $data);

        if($delete == true){
            echo "Data Berhasil Di Hapus";
            redirect('users/data_user');
        } else {
            echo "Data gagal di Hapus";
        }
    }

    function delete_user(){
        $id_user = $this->input->post('id_user');

        $data = $this->m_users->delete_user($id_user);
        echo json_encode($data);
    }

    function data_user_edit($id){
        $data['ecoba_users'] = $this->m_users->get_ecoba_users_byid($id);
        $data['title'] = "Edit Data User";
        $data['view'] = "data_user_edit";
        $this->load->view('header_admin',$data);
    }

    function get_ecoba_users_byid(){
        $id_user = $this->input->get('id_user');
        
        $data = $this->m_users->get_ecoba_users_byid($id_user);
        echo json_encode($data);
    }

    function data_user_edit_proses($id){
        $nm_user = $this->input->post('nm_user');
        $username = $this->input->post('username');
        
        $data_edit = array(
            'nm_user' => $nm_user,
            'username' => $username,
        );

        $where = array(
            'id_user' => $id,
        );

        $update = $this->db->update('ecoba_users',$data_edit, $where);

        if($update == true) {
            echo "Data Berhasil Di Edit";
            redirect('users/data_user');
        }else {
            echo "Data gagal di Hapus";
        }
    }

    function edit_user(){
        $id_user = $this->input->post('id_user');
        $nm_user = $this->input->post('nm_user');
        $username = $this->input->post('username');

        $data = $this->m_users->edit_user($id_user, $nm_user, $username);
        echo json_encode($data);
    }
}
