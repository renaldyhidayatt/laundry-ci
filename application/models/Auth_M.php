<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_M extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    // login
    public function login($email,$password){
        $query = $this->db->get_where('user', array('email'=>$email));  // findby email
        if($query->num_rows() > 0){ // 
            $data_user = $query->row();
            if($data_user->email == "admin@gmail.com"){
                if(password_verify($password, $data_user->password)){
                    $data = [
                        'user_id' => $data_user->id,
                        'firstname' => $data_user->firstname,
                        'lastname' => $data_user->lastname,
                        'loggedin' => TRUE,
                        'is_admin' => TRUE,
                    ];
                    $this->session->set_userdata($data);
    
                    return True;
                }
            }else{
                if(password_verify($password, $data_user->password)){
                    $data = [
                        'user_id' => $data_user->id,
                        'firstname' => $data_user->firstname,
                        'lastname' => $data_user->lastname,
                        'loggedin' => TRUE
                    ];
                    $this->session->set_userdata($data);
    
                    return True;
                }
            }
        }else{
            return False;
        }

    }

    public function register($firstname, $lastname, $email, $password){
        $data_user = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        );
        $this->db->insert('user', $data_user);


        return true;
    }

    public function isLoggedIn(){
        return (bool) $this->session->userdata('loggedin'); // True
    }

    public function isAdmin(){
        return (bool) $this->session->userdata('is_admin'); // True
    }


    public function logout(){
        $this->session->sess_destroy(); // delete Session
    }
}
