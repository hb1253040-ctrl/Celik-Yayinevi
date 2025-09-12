<?php 

namespace App\Model;

use Core\BaseModel;

class ModelPapertype extends BaseModel 
{

    public function getPapertypes() 
    {
        return $this->db->query("SELECT * FROM paper_types",true);
    }

    public function getPapertype($id)
    {
        return $this->db->query("SELECT * FROM paper_types WHERE id = '$id' " , false);
    }

    public function createPapertype($data) 
    {
        extract($data);
        
        $user = $this->db->connect->prepare('INSERT INTO paper_types SET 
                            name=:name
                          ');
        $insert = $user->execute($data);

        if ($insert){
            return true;
        }else{
            return false;
        }
    }

    public function updatePapertype($data) 
    {
        extract($data);

        $user = $this->db->connect->prepare('UPDATE paper_types SET name=:name WHERE id=:id');
        $update = $user->execute($data);

         if ($update){
             return true;
         }else{
             return false;
         }
    }
}


?>