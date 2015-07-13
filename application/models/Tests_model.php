<?php
class Tests_model extends CI_Model {
    

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    public function delete($table, $params)
    {        
        $this->db->where($params);
        $this->db->delete($table);
    }

    public function get_name($id)
    {
        $query = $this->db->get_where('lectures', ['id' => $id]);
        return $query->result();
    }

    public function get_questions($id)
    {
        $query = $this->db->get_where('tests', ['lecture_id' => $id]);
        return $query->result();
    }

    public function get_answers($id)
    {        
        $query = $this->db->query("SELECT id, text FROM `questions` WHERE `test_id` = $id");        
        return $query->result();        
    }

    public function get_correct_answers($id)
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->query("SELECT id FROM `questions` WHERE `test_id` = $id AND `true` = '1'");
        foreach ($query->result() as $row)
        {
            $correct = $row->id; 
        }

        return $correct;  
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }
    
}