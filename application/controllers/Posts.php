<?php 

class Posts extends CI_Controller{
//shows the posts with the latest one being at the top
    public function index(){
        $data ['title']= 'Latests Posts';

        $data['posts'] = $this->post_model->get_posts();
        // print_r( $data['posts']);
        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');

    } 
    //when user clicks on more button he/she can see the whole post in its own page
    public function view($slug = NULL){
        $data['post'] = $this->post_model->get_posts($slug);

        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = $data['post']['title'];
        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    } 
//function to add a new post
    public function create(){
        $data['title'] = 'Create Post';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run()===FALSE){
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        }else{
            $this->post_model->create_post();
            redirect("posts/", "refresh");
        }
    }
    //function to delete the post

    public function delete($id){
    $this->post_model->delete_post($id);
    redirect("posts/", "refresh");

  }
 // function to edit the post
  public function edit($slug){
    $data['post'] = $this->post_model->get_posts($slug);

        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = 'Edit Post';
        $this->load->view('templates/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');

   }
//function to update the post
   public function update(){
       $this->post_model->update_post();
    redirect("posts/", "refresh");

    }
}