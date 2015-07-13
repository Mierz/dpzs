<?php
class Lectures_model extends CI_Model {

    public $id;
    public $title;
    public $description;
    public $text;
    public $date_create;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get($num, $offset)
    {
    	$this->db->order_by('id','desc');
        $query = $this->db->get('lectures',$num, $offset);
        return $query->result();
    }

    public function get_groups($num, $offset)
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get('groups',$num, $offset);
        return $query->result();
    }

    public function get_one($id)
    {
        $query = $this->db->get_where('lectures', ['id' => $id]);

        return $query->result();
    }

    public function record_count() {
        return $this->db->count_all("lectures");
    }

    public function record_count_groups() {
        return $this->db->count_all("groups");
    }    

    public function insert($table, $data)
    {   
        $this->db->insert($table, $data);
    }

    public function update($table, $data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('lectures');
    }

    public function get_date_format($date)
    {
        return gmdate("d-m-Y H:i:s", $date);
    }

    public function check_test($id)
    {
        $query = $this->db->get_where('tests', ['lecture_id' => $id]);

        if ($query->num_rows() > 0)
        {
            return true;
        }
        else {
            return false;
        }
    }

    public function get_answers($id) {
        $query = $this->db->get_where('questions', ['test_id' => $id]);

        return $query->result();
    }

    public function get_tests($id)
    {
        $query = $this->db->get_where('tests', ['lecture_id' => $id]);

        return $query->result();
    }

    public function check_progress($id)
    {
        $query = $this->db->get_where('progress', ['user_id' => $id]);

        if ($query->num_rows() > 0)
        {
            return true;
        }
        else {
            return false;
        }
    }

    public function check_lectures()
    {
        $query = $this->db->get_where('lectures', ['visible' => '1']);

        if ($query->num_rows() > 0)
        {
            return true;
        }
        else {
            return false;
        }
    }

    public function check_visible($id)
    {
        $query = $this->db->get_where('lectures', ['visible' => '1', 'id' => $id]);

        if ($query->num_rows() > 0)
        {
            return true;
        }
        else {
            return false;
        }
    }

    public function get_groups_all()
    {
        $query = $this->db->get('groups');

        return $query->result();
    }

    public function get_first_lecture()
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get_where('lectures', ['visible' => '1']);

        $result = $query->result_array();        
        $return[] = $result[0];

        return $return;
    }

    public function get_other_lectures($id)
    {   
        $ids = $id + 1;
        $query = $this->db->query("SELECT * FROM `lectures` WHERE `id` = $ids AND `visible` = '1'");

        $result = $query->result_array();

        return $result;
    }

    public function get_last_progress_lecture($user)
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get_where('progress', ['user_id' => $user]);

        $result = $query->result_array();
        $return[] = $result[0];

        return $return;
    }

    public function get_lecture_title($id)
    {
        $query = $this->db->get_where('lectures', ['id' => $id]);

        foreach ($query->result() as $row) {
            $return = $row->title;
        }

        return $return;
    }

    public function get_progress($user, $result = null)
    {
        $this->db->order_by('id', 'asc');
        $query = $this->db->get_where('progress', ['user_id' => $user]);

        foreach ($query->result() as $row) {
            $result[] = [
                'id' => $row->lecture_id,
                'title' => $this->get_lecture_title($row->lecture_id),
            ];
        }

        return $result;
    }

}