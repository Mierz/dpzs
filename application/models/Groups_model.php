<?php
class Groups_model extends CI_Model {
    

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

    public function update($table, $params, $data) 
    {
        $this->db->where($params);
        $this->db->update($table, $data);
    }

    public function get_name($id)
    {
        $query = $this->db->get_where('groups', ['id' => $id]);

        return $query->result();
    }
    
}