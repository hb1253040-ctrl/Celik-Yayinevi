<?php 

namespace App\Model;

use Core\BaseModel;

class ModelPublisher extends BaseModel 
{
    public function getPublishers() 
    {
        return $this->db->query("SELECT * FROM publishers",true);
    }

    public function getPublisher($id) 
    {
        return $this->db->query("SELECT * FROM publishers WHERE id = '$id' " , false);
    }

    public function createPublisher($data) 
    {
        extract($data);
        
        $user = $this->db->connect->prepare('INSERT INTO publishers SET 
                            name=:name,
                            slug=:slug,
                            image=:image,
                            description=:description 
                            ');
        $insert = $user->execute($data);

        if ($insert){
            return true;
        }else{
            return false;
        }
    }

    public function updatePublisher($data)
    {
        extract($data);

        $user = $this->db->connect->prepare('UPDATE publishers SET 
                            name=:name,
                            slug=:slug,
                            image=:image,
                            description=:description WHERE id=:id
                            ');
         $update = $user->execute($data);

         if ($update){
             return true;
         }else{
             return false;
         }
    }
}


?>