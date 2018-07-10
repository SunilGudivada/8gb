<?php

class Transaction_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getDetailsPaid(){
        $sql = "SELECT * from transaction T join addata A on A.ad_id = T.t_ad_id where T.t_payment_id != ''";
        $this->load->database();
        $query = $this->db->query($sql);
        return $query;
    }

    public function getDetailsPending(){
        $sql = "SELECT * from transaction T join addata A on A.ad_id = T.t_ad_id where T.t_payment_id = ''";
        $this->load->database();
        $query = $this->db->query($sql);
        return $query;
    }

    public function cnfPaytment($i){
        $sql = "UPDATE transaction SET status=1 WHERE t_id = $i";
        $this->load->database();
        $this->db->query($sql);
        return true;
    }

}