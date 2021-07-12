<?php

class Home extends CI_Controller{
    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('m_home');
        /*if ($this->session->userdata('logged')<>1 && $this->session->userdata('akses') != 'administrator') {
            redirect(site_url('login'));
        }*/
    }

    public function index() {
        $this->load->database();
        $this->load->model('m_home');
        $this->load->view('home');

    }

    function out() {
        $this->load->helper('url');
        //destroy session
        $this->session->sess_destroy();
        //redirect ke halaman login
        redirect(site_url('index.php'));
    }

}
