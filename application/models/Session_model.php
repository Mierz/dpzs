<?php
class Session_model extends CI_Model {
    

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    public function start($user_id, $time)
    {        
        $data = [
            'user_id' => $user_id,
            'start_time' => $time,
        ];
        $this->db->insert('sessions', $data);
    }

    public function end($user_id, $time)
    {
        $query = $this->db->query("UPDATE `sessions` SET `end_time` = $time WHERE `user_id` = $user_id AND `end_time` IS NULL");        
    }

}