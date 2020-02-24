<?php 

namespace lib;

class User{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Create User 

    public function create($data){
        // Insert Query 
        $this->db->query("INSERT INTO users (first_name, last_name, company, username, age, contact_email, contact_name, employment_status, password, email, is_employer) VALUES (:first_name, :last_name, :company, :username, :age, :contact_email, :contact_name, :employment_status, :password, :email, :is_employer)");
        
        //Bind data
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':contact_email', $data['contact_email']);
        $this->db->bind(':contact_name', $data['contact_name']);
        $this->db->bind(':employment_status', $data['employment_status']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':is_employer', $data['is_employer']);
       

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    
    }


     // Update User

     public function update($data, $id) {
        // Insert Query 
        $this->db->query("UPDATE users SET 
        employment_status = :employment_status,
        contact_email = :contact_email,
        show_email = :show_email,
        contact_name = :contact_name,
        company = :company,
        presentation = :presentation WHERE id = $id");
       
        //Bind data
        $this->db->bind(':employment_status', $data['employment_status']);
        $this->db->bind(':contact_email', $data['contact_email']);
        $this->db->bind(':show_email', $data['show_email']);
        $this->db->bind(':contact_name', $data['contact_name']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':presentation', $data['presentation']);

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    
   }


    // Check for email in Db

    public function checkUserEmail($email) {

        $this->db->query("SELECT * FROM users WHERE email = '$email'");
        $row = $this->db->single();

    // vai retornar um false se não houver nenhum igual, e vai retornar um objecto se houver um igual    
        return $row;
    }


    // Check for username in Db

    public function checkUsername($username) {

        $this->db->query("SELECT * FROM users WHERE username = '$username'");
        $row = $this->db->single();

    // vai retornar um false se não houver nenhum igual, e vai retornar um objecto se houver um igual    
        return $row;
    }

    // Login User

    public function updateUser($user_id, $date) {
        // Update User Date
        
        $this->db->query("UPDATE users SET 
        last_login = :last_login WHERE id = $user_id");
       
        //Bind data
        $this->db->bind(':last_login', $date);
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    
   }

   // check employer status

   public function checkEmployerStatus($logged) {
    $this->db->query("SELECT * FROM users WHERE id = $logged");
    $row = $this->db->single();

    return $row;
   }
    }

    // Logout User





    