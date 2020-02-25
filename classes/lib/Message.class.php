<?php 

 namespace lib; 

class Message{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Get messages 

    public function getMessages($id){
        $this->db->query("SELECT messages.*, u.id AS uid, u.username FROM messages LEFT JOIN users u ON messages.user_sender = u.id WHERE messages.user_receiver = $id ORDER BY created_at DESC");

        //Assign result set 

        $results = $this->db->resultSet();
        return $results;
    }
    // Get message 

    public function getMessage($id){
        $this->db->query("SELECT * FROM messages WHERE id = $id");
    
        // assign row
        $row = $this->db->single();
        return $row;
    }

    // Create MEssage 

    public function create($data){
        // Insert Query 
        $this->db->query("INSERT INTO messages (user_sender, user_receiver, title, body) VALUES (:user_sender, :user_receiver, :title, :body)");
        
        //Bind data
        $this->db->bind(':user_sender', $data['user_sender']);
        $this->db->bind(':user_receiver', $data['user_receiver']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    
    }

     // Delete message

     public function delete($id) {
        $this->db->query("DELETE FROM messages WHERE id = $id");
        
       

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updateChecked($id) {
        $this->db->query("UPDATE messages SET checked = '1' WHERE id = $id");

         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    }






    