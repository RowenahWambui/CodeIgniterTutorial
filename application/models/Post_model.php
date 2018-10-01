<?php 

class Post_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
//function to create the post into the db
    public function create_post(){
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body')
        );
        return $this->db->insert('posts',$data);
    }
//function to retrieve posts from db
    public function get_posts($slug = FALSE){
        if($slug === FALSE){
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('posts');
            return $query->result_array();
        }
        $query = $this->db->get_where('posts',array('slug'=>$slug));
        return $query->row_array();
    }
//function to delete the post from the db
    public function delete_post($id){
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return TRUE;
    }
    public function update_post(){
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body')
        );
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts',$data);

    }
}