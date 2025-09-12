<?php 

namespace App\Model;

use Core\BaseModel;


class ModelSkintype extends BaseModel 
{
    public function getSkintypes() 
    {
        return $this->db->query("SELECT * FROM skin_types",true);

    }

    public function getSkintype($id)
    {
        return $this->db->query("SELECT * FROM skin_types WHERE id = '$id' " , false);
    }

    public function createSkintype($data) 
    {
        extract($data);

        $user = $this->db->connect->prepare('INSERT INTO skin_types SET 
                          name=:name
                          ');
        $update = $user->execute($data);

        if ($update){
            return true;
        }else{
            return false;
        }
    }

    public function updateSkintype($data) 
    {
        extract($data);

        $user = $this->db->connect->prepare('UPDATE skin_types SET name=:name WHERE id=:id');
        $update = $user->execute($data);

         if ($update){
             return true;
         }else{
             return false;
         }
    }

}


?>