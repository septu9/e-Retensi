<?php
class m_surveilans extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_ecoba_surveilans()
        {
                $this->db->order_by('id_surveilans','ASC');
                $query = $this->db->get('ecoba_surveilans');
                $result = $query->result_array();

                return $result;
        }

        public function get_ecoba_surveilans_byid($id) {
                $this->db->order_by('nm_pasien');
                $this->db->where('id_surveilans',$id);
                $hsl = $this->db->get('ecoba_surveilans');
                $result = $hsl->row_array();

                return $result;

        }

        function data_surveilans_tambah_proses_js($tanggal, $no_rm, $nm_pasien, $terpasang, $tinjauan){
                $data = array(
                        'tanggal' => $tanggal,
                        'no_rm' => $no_rm,
                        'nm_pasien' => $nm_pasien,
                        'terpasang' => $terpasang,
                        'tinjauan' => $tinjauan,
                    );
            
                    $insert = $this->db->insert('ecoba_surveilans',$data);

                    return $insert;

        }

        function delete_surveilans($id_surveilans){
                $data = array(
                        'id_surveilans' => $id_surveilans,
                );

                $delete = $this->db->delete('ecoba_surveilans', $data);
                return $delete;
        }

        function edit_surveilans($id_surveilans, $tanggal, $no_rm, $nm_pasien, $terpasang, $tinjauan){
                $data_edit = array(
                        'tanggal' => $tanggal,
                        'no_rm' => $no_rm,
                        'nm_pasien' => $nm_pasien,
                        'terpasang' => $terpasang,
                        'tinjauan' => $tinjauan,
                        );
            
                    $where = array(
                        'id_surveilans' => $id_surveilans,
                    );
            
                    $update = $this->db->update('ecoba_surveilans',$data_edit, $where);
                    return $update;
        }

}
