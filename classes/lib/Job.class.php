<?php 

namespace lib; 

class Job{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Get all jobs 

    public function getAllJobs($sql = ''){
        $this->db->query("SELECT jobs.*, category.name AS cname FROM jobs INNER JOIN category ON jobs.category_id = category.id ORDER BY post_date DESC $sql");

        //Assign result set 

        $results = $this->db->resultSet();
        return $results;
    }

    // Get categories

    public function getCategories(){
        $this->db->query("SELECT * FROM category");

        //Assign result set 

        $results = $this->db->resultSet();
        return $results;
    }

    // Get by category 

    public function getByCategory($category, $sql = ''){
        $this->db->query("SELECT jobs.*, category.name AS cname FROM jobs INNER JOIN category ON jobs.category_id = category.id WHERE jobs.category_id =  $category ORDER BY post_date DESC $sql");

        //Assign result set 

        $results = $this->db->resultSet();
        return $results;
    }

    // get category for title 

    public function getCategory($category) {
        $this->db->query("SELECT * FROM category WHERE id = $category");
    
        // assign row
        $row = $this->db->single();
        return $row;
    }

    // Get Job

    public function getJob($id){
        $this->db->query("SELECT * FROM jobs WHERE id = $id");
    
        // assign row
        $row = $this->db->single();
        return $row;
    }

    // Get Jobs by username

    public function getJobByUser($id, $sql = ''){
        $this->db->query("SELECT jobs.*, category.name AS cname FROM jobs INNER JOIN category ON jobs.category_id = category.id WHERE user_id = $id ORDER BY post_date DESC $sql");

        //Assign result set 

        $results = $this->db->resultSet();
        return $results;
    }

    // Create Job

    public function create($data){
        // Insert Query 
        $this->db->query("INSERT INTO jobs (category_id, user_id, job_title, compnay, description, location, salary, contact_user, contact_email) VALUES (:category_id, :user_id, :job_title, :compnay, :description, :location, :salary, :contact_user, :contact_email)");
        
        //Bind data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':compnay', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    
    }


    // Delete job

    public function delete($id) {
        $this->db->query("DELETE FROM jobs WHERE id = $id");
        
       

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    // Update Job

    public function update($data, $id) {
         // Insert Query 
         $this->db->query("UPDATE jobs SET 
         category_id = :category_id,
         job_title = :job_title,
         compnay = :compnay,
         description = :description,
         location = :location,
         salary = :salary,
         contact_user = :contact_user,
         contact_email = :contact_email WHERE id = $id");
        
         //Bind data
         $this->db->bind(':category_id', $data['category_id']);
         $this->db->bind(':job_title', $data['job_title']);
         $this->db->bind(':compnay', $data['company']);
         $this->db->bind(':description', $data['description']);
         $this->db->bind(':location', $data['location']);
         $this->db->bind(':salary', $data['salary']);
         $this->db->bind(':contact_user', $data['contact_user']);
         $this->db->bind(':contact_email', $data['contact_email']);
 
         //Execute
         if($this->db->execute()){
             return true;
         } else {
             return false;
         }
     
    }
}

