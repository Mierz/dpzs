<?php
class Students_model extends CI_Model {

    

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    public function get($num, $offset, $params = null)
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get('users', $num, $offset);
        return $query->result();
    }

    public function get_all($data)
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get_where('user_profiles', $data);
        return $query->result();
    }

    public function record_count() {
        return $this->db->count_all("users");
    }

    public function get_username($id)
    {
        $query = $this->db->get_where('user_profiles', ['id' => $id]);

        foreach ($query->result() as $row)
        {
                return $row->firstname . " " . $row->lastname;
        }        
    }

    public function get_group($id)
    {
        $query = $this->db->get_where('user_profiles', ['id' => $id]);

        foreach ($query->result() as $row)
        {
                return $row->groupnum;
        }  
    }

    public function get_one($id)
    {
        $query = $this->db->get_where('user_profiles', ['id' => $id]);

        return $query->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');

        $this->db->where('id', $id);
        $this->db->delete('user_profiles');
    }

    public function get_activity($id, $result = null)
    {         
        $this->db->order_by('id', 'desc');
        $this->db->limit(10);
        $query = $this->db->get_where('sessions', ['user_id' => $id]); 

        foreach ($query->result() as $row)
        {
            if(empty($row->end_time)) {
                $end = "Ще в системі";
            } else {
                $end = gmdate("H:i:s", $row->end_time);
            }

            $result[] = [
                'date' => gmdate("d-m-Y", $row->start_time),
                'time_start' => gmdate("H:i:s", $row->start_time),
                'time_end' => $end,
            ];
        } 


        return $result;
    }

    public function get_progress($id)
    {        
        $query = $this->db->get_where('progress', ['user_id' => $id]);
        return $query->result();
    }

    public function count_progress($id, $i = 0) {
        $query = $this->db->get_where('progress', ['user_id' => $id]);

        foreach ($query->result() as $row)
        {
            $i++;
        } 

        return $i;
    }

}