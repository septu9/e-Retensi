<?php
class m_retensi extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

    /************ LOGIN ************/
    function login($user_nm,$pwd0) {
        $this->db->join('xocp_persons', 'xocp_persons.person_id = xocp_users.person_id');
        $this->db->join('xocp_pgroups', 'xocp_pgroups.pgroup_id = xocp_users.pgroup_id');
        $this->db->where('user_nm', $user_nm);
        $this->db->where('pwd0', $pwd0);
        $query =  $this->db->get('xocp_users');
        return $query->num_rows();
    }

    //    untuk mengambil data hasil login
    function data_login($user_nm,$pwd0) {
        $this->db->join('xocp_persons', 'xocp_persons.person_id = xocp_users.person_id');
        $this->db->join('xocp_pgroups', 'xocp_pgroups.pgroup_id = xocp_users.pgroup_id');
        $this->db->where('user_nm', $user_nm);
        $this->db->where('pwd0', $pwd0);
        return $this->db->get('xocp_users')->row();
    }
    /************ END OF LOGIN ************/

    /************ RETENSI ************/
    function retensi_list()
    {
        $this->db->join('retensi_status', 'retensi_status.id_retensi_status = retensi_data.id_status');
        $this->db->order_by('nama','ASC');
        $query = $this->db->get('retensi_data');
        return $query->result_array();
    }

    public function get_status($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $this->db->order_by('nm_status','ASC');
            $query = $this->db->get('retensi_status');
            return $query->result_array();
        }
        $this->db->order_by('id_retensi_status','ASC');
        $query = $this->db->get_where('retensi_status', array('id_retensi_status' => $id));
        return $query->row_array();
    }

    function cari_rm_data_retensi($no_rm) {
        $this->db->where('no_rm', $no_rm);
        $this->db->order_by('nama','ASC');
        $query = $this->db->get('retensi_data');
        $hsl = $query->result_array();
        foreach ($hsl as $list) {
            $result = $list['no_rm'];
        }
        return $result;
    }

    function simpan_retensi($no_rm,$nama,$tgl_lhr,$ktp,$telpon,$id_status){
        $insert_retensi = array(
            'no_rm' => $no_rm,
            'nama' => $nama,
            'tgl_lhr' => $tgl_lhr,
            'ktp' => $ktp,
            'telpon' => $telpon,
            'id_status' => $id_status,
        );
        $hasil_insert = $this->db->insert('retensi_data',$insert_retensi);
        return $hasil_insert;
    }

    function hapus_retensi($id_retensi){
        $delete = $this->db->delete('retensi_data',array('id_retensi' => $id_retensi));
        return $delete;
    }

    function get_retensi_by_id($id_retensi){
        $this->db->order_by('nama','ASC');
        $this->db->where('id_retensi', $id_retensi);
        $hsl = $this->db->get('retensi_data');

        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'id_retensi' => $data->id_retensi,
                    'no_rm' => $data->no_rm,
                    'nama' => $data->nama,
                );
            }
        }
        return $hasil;
    }
    /************ END OF RETENSI ************/

    /************ DATA RETENSI BY ID ************/
    function data_retensi_by_id($id) {
        $this->db->order_by('nama','ASC');
        $this->db->where('id_retensi', $id);
        $hsl = $this->db->get('retensi_data');
        $result = $hsl->row_array();
        return $result;
    }

    public function edit_data_pasien() {
        $this->load->database();
        $this->load->model('retensi');
        $this->load->view('data_pasien');
    }

    function data_dokumen_list($no_rm){
        $this->db->order_by('id_dokumen','ASC');
        $this->db->where('no_rm',$no_rm);
        $query = $this->db->get('retensi_dokumen');
        $result = $query->result_array();
        return $result;
    }

    function simpan_dokumen($no_rm,$nm_dokumen,$tahun){
//        $in
    }
    /************ END OF DATA RETENSI BY ID ************/



    /************ JENIS STATUS ************/
    function status_list()
    {
        $this->db->order_by('nm_status','ASC');
        $query = $this->db->get('retensi_status');
        return $query->result_array();
    }

    function simpan_status($nm_status){
        $insert_status = array(
            'nm_status' => $nm_status,
        );
        $hasil_insert = $this->db->insert('retensi_status',$insert_status);
        return $hasil_insert;
    }

    function hapus_status($id_retensi_status){
        $delete = $this->db->delete('retensi_status',array('id_retensi_status' => $id_retensi_status));
        return $delete;
    }

    function get_status_by_id($id_retensi_status){
        $this->db->order_by('nm_status','ASC');
        $this->db->where('id_retensi_status', $id_retensi_status);
        $hsl = $this->db->get('retensi_status');

        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'id_retensi_status' => $data->id_retensi_status,
                    'nm_status' => $data->nm_status,
                );
            }
        }
        return $hasil;
    }

    function update_status($id_retensi_status,$nm_status){
        $data = array(
            'nm_status' => $nm_status,
        );

        $update = $this->db->update('retensi_status',$data,array('id_retensi_status' => $id_retensi_status));
        return $update;
    }
    /************ END OF JENIS STATUS ************/
}
