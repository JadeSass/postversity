<?php
class Posts extends Controller {
    public function __construct(){
    if(!isLoggedIn()){
        redirect('auth/login');
    }

    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
    }

    public function index(){
    // Get posts
    $posts = $this->postModel->getPosts();

    $data = [
        'posts' => $posts
    ];

    $this->view('index', $data);
    }

    public function add(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'image' => basename($_FILES['image']['name']),
        'target' => dirname(ROOT). "/Public" . "/" . "uploads/" . basename($_FILES['image']['name']),
        'image_temp' => $_FILES['image']['tmp_name'],
        'user_id' => $_SESSION['user_id'],
        'title_err' => '',
        'body_err' => '',
        'image_err' => ''
        ];

        // Validate data
        if(empty($data['title'])){
        $data['title_err'] = 'Please enter title to continue post.';
        }
        if(empty($data['body'])){
        $data['body_err'] = 'Please enter body text to continue post.';
        }
        if(empty($data['image'])){
            $data['image_err'] = 'You need an image for this post.';
        }

        // Make sure no errors
        if(empty($data['title_err']) && empty($data['body_err']) && empty($data['image_err'])){
                    // Validated
        if($this->postModel->addPost($data)){
            // die($data['target']);
            move_uploaded_file($data['image_temp'], $data['target']);
            
            flash('success', 'You have Successfully created a post.');

            redirect('index');
        } else {
            die('Something went wrong');
        }
        } else {
        // Load view with errors
        $this->view('posts/add', $data);
        }

    } else {
        $data = [
        'title' => '',
        'body' => '',
        'image' => ''
        ];

        $this->view('posts/add', $data);
    }
}

public function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
        $post = $this->postModel->getPostById($id);
        
        // Check for owner
        if($post->user_id != $_SESSION['user_id']){
        redirect('index');
        }

        if($this->postModel->deletePost($id)){
        flash('danger', 'You have Successfully removed a post');
        redirect('index');
        } else {
        die('Something went wrong');
        }
    } else {
        redirect('index');
    }
    }

    public function update($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
        
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
            'id' => $id,
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'image' => basename($_FILES['image']['name']),
            'target' => dirname(ROOT). "/Public" . "/" . "uploads/" . basename($_FILES['image']['name']),
            'image_temp' => $_FILES['image']['tmp_name'],
            'user_id' => $_SESSION['user_id'],
            'title_err' => '',
            'body_err' => ''
            ];

            // Validate data
            if(empty($data['title'])){
            $data['title_err'] = 'Please enter title to update post.';
            }
            if(empty($data['body'])){
            $data['body_err'] = 'Please enter body text to update post.';
            }

            // Make sure no errors
            if(empty($data['title_err']) && empty($data['body_err'])){
                        // Validated
            if($this->postModel->updatePost($data)){
                // die($data['target']);
                if (file_get_contents($data['image'])) {
                    move_uploaded_file($data['image_temp'], $data['target']); 
                }
            
                flash('success', 'You have Successfully updated this post.');

                redirect('index');
            } else {
                die('Something went wrong');
            }
            } else {
            // Load view with errors
            $this->view('posts/update', $data);
            }

        } else {
            // Get existing post from model
            $post = $this->postModel->getPostById($id);

            // Check for owner
            if($post->user_id != $_SESSION['user_id']){
            redirect('index');
            }

            $data = [
            'id' => $id,
            'title' => $post->title,
            'body' => $post->body,
            'image' => $post->image
            ];

            $this->view('posts/update', $data);
        }
    }


    public function content($id){
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/content', $data);
    }
}