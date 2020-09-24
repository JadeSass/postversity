<?php
    
    class Auth extends Controller {

        public function __construct(){
            $this->userModel = $this->model("User");
        }

        public function register(){
            /*
             * Check if the server request is a POST requst
            */
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Sanitize POST data and User's input
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                // Init data
                $data =[
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
                ];
    
                // Validate Email
                if(empty($data['email'])){
                $data['email_err'] = 'Pleae enter email';
                } else {
                // Check email and find user by email
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken by another user';
                }
                }
    
                // Validate Name
                if(empty($data['name'])){
                $data['name_err'] = 'Pleae enter name';
                }
    
                // Validate Password
                if(empty($data['password'])){
                $data['password_err'] = 'Pleae enter password';
                } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
                }
    
                // Validate Confirm Password
                if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Pleae confirm password';
                } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
                }
    
                // Make sure errors are empty and clear
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                // Validated
            
                // Hash User's Data Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
                // Register User and save record
                if($this->userModel->register($data)){
                    flash('success', 'You have successfully registered. Kindly login to your account.');
                    redirect('auth/login');
                } else {
                    dd('Something went wrong');
                }
    
                } else {
                // Load view with errors on the register page
                $this->view('auth/register', $data);
                }
    
            } else {
                // Init data
                $data =[
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
                ];
    
                // Load Register View
                $this->view('auth/register', $data);
            }
        }

        public function login(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                // Init data
                $data =[
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',      
                ];
    
                // Validate Email
                if(empty($data['email'])){
                $data['email_err'] = 'Pleae enter email';
                }
    
                // Validate Password
                if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
                }


                // Check for user/email
                if($this->userModel->findUserByEmail($data['email'])){
                    // User found
                } else {
                    // User not found
                    $data['email_err'] = $data['email'] . ' is not found in our record.';
                }
    
                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                // Validated
                
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        // Create Session for specific user_id
                        userSession($loggedInUser);
                        redirect('index');
                    } else {
                        $data['password_err'] = 'Password incorrect. Please try again';

                        $this->view('auth/login', $data);
                    }

                } else {
                // Load view with errors
                $this->view('auth/login', $data);
                }
    
    
            } else {
                // Init data
                $data =[    
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',        
                ];
    
                // Load view
                $this->view('auth/login', $data);
            }
        }

        // Logout and destroy Session for specific 
        public function logout(){
            endSession();
            redirect('auth/login');
        }
        
    }
?>