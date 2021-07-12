<?php
class m_users extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        function get_ecoba_users(){
                $this->db->order_by('id_user','ASC'); //ambil dari field
                $query = $this->db->get('ecoba_users'); //ambil dari database
                $result = $query->result_array(); //hasil ambil dr database dijadikan data array

                return $result; //kembalikan hasil
        }

        function get_ecoba_users_byid($id) { //menyimpan id di function ini
            $this->db->order_by('nm_user'); //ambil data dari field nm_user 
         $this->db->where('id_user',$id); //dimana dgn id tertentu
        $hsl = $this->db->get('ecoba_users'); //ambil dari database
                $result = $hsl->row_array(); //hasil ambil dr database dijadikan data array

                return $result; //kembalikan hasil

        }

        function data_user_tambah_proses_js($nm_user, $username, $password, $password_hash){
                $data = array(
                        'nm_user' => $nm_user,
                        'username' => $username,
                        'password' => $password,
                        'password_hash' => $password_hash, 
                    );
            
                    $insert = $this->db->insert('ecoba_users',$data);

                    return $insert;

        }

        function delete_user($id_user){
                $data = array(
                        'id_user' => $id_user,
                );

                $delete = $this->db->delete('ecoba_users', $data);
                return $delete;
        }

        function edit_user($id_user, $nm_user, $username){
                $data_edit = array(
                        'nm_user' => $nm_user,
                        'username' => $username,
                    );
            
                    $where = array(
                        'id_user' => $id_user,
                    );
            
                    $update = $this->db->update('ecoba_users',$data_edit, $where);
                    return $update;
        }
}
