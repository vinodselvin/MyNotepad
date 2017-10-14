<?php 

class Home_model extends CI_Model {
    
    public function update_message($data)
    {
        $this->db->where('unique_id',$data['unique_id']);
        $this->db->update('user_data',$data);
        echo $this->db->last_query();exit;
    }
    
    public function create_message($data)
    {
        $data['content'] = "";
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        $this->db->insert('user_data',$data);
    }
    
    public function get_message($cookie){
        $this->db->where('unique_id',$cookie);
        $res = $this->db->get('user_data')->result();
        return $res[0]->content;
    }
}