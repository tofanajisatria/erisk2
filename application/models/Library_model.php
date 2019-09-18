<?php
class Library_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_divisi()
    {
        return $this->db->get('divisi')->result_array();
    }

    public function get_pengguna()
    {
        return $this->db->get('user')->result_array();
    }
    public function get_aspek()
    {
        return $this->db->get('sumber_risiko')->result_array();
    }

    public function get_identifikasiUser($tgl, $nama)
    {
        return $this->db->get_where('identification', ['tahun' => $tgl, 'pengisi' => $nama])->result_array();
    }

    public function get_identifikasiAdmin($tgl)
    {
        return $this->db->get_where('identification', ['tahun' => $tgl])->result_array();
    }

    public function add_identifikasi($iden)
    {
        $this->db->insert('identification', $iden);
    }

    public function get_newidentifikasi($tgl)
    {
        return $this->db->get_where('identification', ['tahun' => $tgl]);
    }

    public function hapusDataIdentifikasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('identification');
    }
    public function hapusEvaluation($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('evaluation');
    }
    public function update_identifikasi($id, $iden)
    {
        $this->db->where('id', $id);
        $this->db->update('identification', $iden);
    }

    public function update_riskDetail($id, $risk)
    {
        $this->db->where('id', $id);
        $this->db->update('risk_detail', $risk);
    }

    public function hapusDataRisk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('risk_detail');
    }

    public function add_Divisi($addDivBag)
    {
        $this->db->insert('divisi', $addDivBag);
    }

    public function add_riskDetail($risk)
    {
        $this->db->insert('risk_detail', $risk);
    }

    public function get_datarisk($codeUser)
    {
        $tgl = date('Y');
        if ($codeUser == '1') {
            $query = "SELECT `identification`.*,`risk_detail`.*
        FROM `risk_detail` 
        JOIN `identification`
        ON `risk_detail`.`id_identifikasi` = `identification`.`id`
        WHERE `identification`.`tahun`='$tgl'
        ORDER BY 2 DESC;
        ";
        } else {
            $query = "SELECT `identification`.*,`risk_detail`.*
        FROM `risk_detail` 
        JOIN `identification`
        ON `risk_detail`.`id_identifikasi` = `identification`.`id`
        WHERE `risk_detail`.`pengisi`='$codeUser'
        AND `identification`.`tahun`='$tgl'
        ORDER BY 2 DESC;
        ";
        }
        return $this->db->query($query)->result_array();
    }

    public function get_dataevaluasi($codeUser)
    {
        $tgl = date('Y');
        if ($codeUser == '1') {
            $query = "SELECT `risk_detail`.*,`identification`.* , `evaluation`.* 
        FROM `risk_detail` 
        JOIN `identification`
        ON `risk_detail`.`id_identifikasi` = `identification`.`id`
        JOIN `evaluation`
        ON `risk_detail`.`id` = `evaluation`.`id_riskdetail`
        WHERE `identification`.`tahun`='$tgl'
        ORDER BY 1 DESC;
        ";
        } else {
            $query = "SELECT `risk_detail`.*,`identification`.* , `evaluation`.*
        FROM `risk_detail` JOIN `identification`
        ON `risk_detail`.`id_identifikasi` = `identification`.`id`
        JOIN `evaluation`
        ON `risk_detail`.`id` = `evaluation`.`id_riskdetail`
        WHERE `identification`.`pengisi`='$codeUser'
        AND `identification`.`tahun`='$tgl'
        ORDER BY 1 DESC;
        ";
        }
        return $this->db->query($query)->result_array();
    }

    public function get_datamitigasi($codeUser)
    {
        $tgl = date('Y');
        if ($codeUser == '1') {
            $query = "SELECT `risk_detail`.*,`identification`.* , `evaluation`.*, `action_plan`.*
        FROM `identification` 
        JOIN `risk_detail`
        ON `risk_detail`.`id_identifikasi` = `identification`.`id`
        JOIN `evaluation`
        ON `risk_detail`.`id` = `evaluation`.`id_riskdetail`
        JOIN `action_plan`
        ON `evaluation`.`id` = `action_plan`.`id_evaluation`
        WHERE `identification`.`tahun`='$tgl'
        ORDER BY 1 DESC;
        ";
        } else {
            $query = "SELECT `risk_detail`.*,`identification`.* , `evaluation`.*, `action_plan`.*
        FROM `identification` 
        JOIN `risk_detail`
        ON `risk_detail`.`id_identifikasi` = `identification`.`id`
        JOIN `evaluation`
        ON `risk_detail`.`id` = `evaluation`.`id_riskdetail`
        JOIN `action_plan`
        ON `evaluation`.`id` = `action_plan`.`id_evaluation`
        WHERE `identification`.`pengisi`='$codeUser'
        AND `identification`.`tahun`='$tgl'
        ORDER BY 1 DESC;
        ";
        }
        return $this->db->query($query)->result_array();
    }

    public function add_new_risk($newRisk)
    {
        $this->db->insert('sumber_risiko', $newRisk);
    }

    public function get_mitigasiBerjalan()
    {
        return $this->db->get('mitigasi_berjalan')->result_array();
    }
    public function add_new_exitingcontrol($newExitingControl)
    {
        $this->db->insert('mitigasi_berjalan', $newExitingControl);
    }
    public function get_riskDetailAdmin()
    {
        $tgl = date('Y');
        $query = "SELECT `risk_detail`.*,`identification`.`bagian`
        FROM `risk_detail` JOIN `identification`
        ON `risk_detail`.`id_identifikasi` = `identification`.`id`
        WHERE `identification`.`tahun`='$tgl'
        ";
        return $this->db->query($query)->result_array();
    }
    public function get_riskDetailUser($nama)
    {
        $tgl = date('Y');
        $query = "SELECT `risk_detail`.*,`identification`.`bagian`
        FROM `risk_detail` JOIN `identification`
        ON `risk_detail`.`id_identifikasi` = `identification`.`id`
        WHERE `identification`.`pengisi`='$nama'
        AND `identification`.`tahun`='$tgl'
        ";
        return $this->db->query($query)->result_array();
    }

    public function fetch_nilaiRisk($sumber, $tahun, $periode, $bagian)
    {
        $query = "SELECT `evaluation`.*,`risk_detail`.*
        FROM `evaluation` JOIN `risk_detail`
        ON `evaluation`.`id_riskdetail` = `risk_detail`.`id`
        WHERE `evaluation`.`tahun`='$tahun'
        AND `risk_detail`.`sumber_risiko`='$sumber'
        AND `evaluation`.`periode`='$periode'
        AND `risk_detail`.`bagian`='$bagian'        
        ";
        return $this->db->query($query)->result_array();
    }

    public function  add_evaluation($eval)
    {
        $this->db->insert('evaluation', $eval);
    }

    public function  add_monitoring($monitor)
    {
        $this->db->insert('monitoring', $monitor);
    }

    public function get_event($periode, $bagian, $tahun)
    {
        $query = "SELECT `evaluation`.*,`risk_detail`.*
        FROM `evaluation` JOIN `risk_detail`
        ON `evaluation`.`id_riskdetail` = `risk_detail`.`id`
        WHERE `evaluation`.`tahun`='$tahun'
        AND `evaluation`.`periode`='$periode'
        AND `risk_detail`.`bagian`='$bagian'        
        ";
        return $this->db->query($query)->result_array();
    }

    public function add_division($div)
    {
        $this->db->insert('divisi', $div);
    }
    public function delete_division($id)
    {
        $this->db->where('id_divisi', $id);
        $this->db->delete('divisi');
    }
    public function update_division($idDivisi, $div)
    {
        $this->db->where('id_divisi', $idDivisi);
        $this->db->update('divisi', $div);
    }


    public function add_risk($risk)
    {
        $this->db->insert('sumber_risiko', $risk);
    }
    public function delete_risk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sumber_risiko');
    }
    public function update_risk($idRisk, $risk)
    {
        $this->db->where('id', $idRisk);
        $this->db->update('sumber_risiko', $risk);
    }

    public  function get_monitor($tahun, $periode, $bagian)
    {
        $query = "SELECT `evaluation`.*,`risk_detail`.*,
        FROM `evaluation` JOIN `risk_detail`
        ON `evaluation`.`id_riskdetail` = `risk_detail`.`id`
        WHERE `evaluation`.`tahun`='$tahun'
        AND `evaluation`.`periode`='$periode'
        AND `risk_detail`.`bagian`='$bagian'        
        ";
        return $this->db->query($query)->result_array();
    }

    public function fetch_monitoring($bagian, $tahun, $periode, $proyek)
    {
        $query = "SELECT `evaluation`.*,`risk_detail`.*,`action_plan`.*,`identification`.*
        FROM `evaluation` 
        JOIN `risk_detail` 
        ON `evaluation`.`id_riskdetail` = `risk_detail`.`id`
        JOIN `action_plan`
        ON `action_plan`.`id_evaluation` = `evaluation`.`id`
        JOIN `identification`
        ON `identification`.`id`= `risk_detail`.`id_identifikasi`
        WHERE `evaluation`.`tahun`='$tahun'
        AND `evaluation`.`periode`='$periode'
        AND `risk_detail`.`bagian`='$bagian'        
        AND `identification`.`nama_proyek`='$proyek'        
        ";
        return $this->db->query($query)->result_array();
    }

    public function fetch_tahunan($bagian, $tahun, $proyek)
    {
        $query = "SELECT `identification`.*,`risk_detail`.*
        FROM `risk_detail` 
        JOIN `identification`
        ON `risk_detail`.`id_identifikasi` = `identification`.`id`
        WHERE `identification`.`tahun`='$tahun'
        AND `risk_detail`.`bagian`='$bagian'        
        AND `identification`.`nama_proyek`='$proyek' 
               
        ";
        return $this->db->query($query)->result_array();
    }
    public function fetch_evalact($id)
    {
        $query = "SELECT `evaluation`.*,`action_plan`.*
        FROM `evaluation`  
        JOIN `action_plan` 
        ON `evaluation`.`id` = `action_plan`.`id_evaluation`
        WHERE `evaluation`.`id_riskdetail`='$id'        
        ";
        return $this->db->query($query)->result_array();
    }

    public function fetch_summary()
    {
        $query = "SELECT `evaluation`.*,`risk_detail`.*,`action_plan`.*,`identification`.*,`approval`.*
        FROM `evaluation` 
        JOIN `risk_detail` 
        ON `evaluation`.`id_riskdetail` = `risk_detail`.`id`
        JOIN `action_plan`
        ON `action_plan`.`id_evaluation` = `evaluation`.`id`
        JOIN `identification`
        ON `identification`.`id`= `risk_detail`.`id_identifikasi`
        JOIN `approval`
        ON `identification`.`id`= `approval`.`id_identification`
        AND `evaluation`.`periode`= `approval`.`tw`
        WHERE `approval`.`setuju`=1
        ";
        return $this->db->query($query)->result_array();
    }

    public function fetch_asesmen($id, $tw)
    {
        $query = "SELECT `evaluation`.*,`risk_detail`.*,`action_plan`.*,`identification`.*
        FROM `evaluation` 
        JOIN `risk_detail` 
        ON `evaluation`.`id_riskdetail` = `risk_detail`.`id`
        JOIN `action_plan`
        ON `action_plan`.`id_evaluation` = `evaluation`.`id`
        JOIN `identification`
        ON `identification`.`id`= `risk_detail`.`id_identifikasi`
        WHERE `risk_detail`.`id_identifikasi`='$id'
        AND `evaluation`.`periode`='$tw'
        ";
        return $this->db->query($query)->result_array();
    }

    public function get_onepage($bagian, $tahun, $triwulan)
    {
        return $this->db->get_where('one_page', ['bagian' => $bagian, 'tahun' => $tahun, 'triwulan' => $triwulan])->result_array();
    }

    public function get_summary()
    {
        $query = "SELECT `identification`.*,`approval`.*
        FROM `identification` 
        JOIN `approval`
        ON `identification`.`id` = `approval`.`id_identification`
       
        WHERE `approval`.`setuju`=1
        
        
        ";
        return $this->db->query($query)->result_array();
    }
    public function get_sum()
    {
        $query = "SELECT DISTINCT `identification`.*,`approval`.`setuju`
        FROM `identification` 
        JOIN `approval`
        ON `identification`.`id` = `approval`.`id_identification`
       
        WHERE `approval`.`setuju`=1
        
        
        ";
        return $this->db->query($query)->result_array();
    }
}
