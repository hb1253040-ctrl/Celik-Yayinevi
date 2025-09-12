<?php 

namespace App\Model;

use Core\BaseModel;


class ModelAuthor extends BaseModel 
{

    public function getAuthors() 
    {
        return $this->db->query("SELECT * FROM author",true);
    }

    public function getAuthor($id)
    {
        return $this->db->query("SELECT * FROM author WHERE id = '$id' " , false);
    }

    public function createAuthor($data)  
    {   
        extract($data);

        $user = $this->db->connect->prepare('INSERT INTO author SET
                            name=:name,
                            type=:type,
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

    public function updateAuthor($data) 
    {
        $user = $this->db->connect->prepare('UPDATE author SET 
                            name=:name,
                            type=:type,
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