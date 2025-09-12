<?php 

namespace App\Model;

use Core\BaseModel;

class ModelCategory extends BaseModel 
{

    public function getParentCategories() 
    {
        return $this->db->query("SELECT * FROM category WHERE parent_id = 0",true);
    }

    public function getCategory($id) 
    {
        return $this->db->query("SELECT * FROM category WHERE id = '$id' " , false);
    }

    public function getCategorySlug($slug) 
    {
        return $this->db->query("SELECT * FROM category WHERE slug = '$slug' " , false);
    }

    public function getCategories() 
    {
        return $this->db->query("SELECT * FROM category ",true);
    }

    public function createCategory($data) 
    {
        extract($data);
        
        $user = $this->db->connect->prepare('INSERT INTO category SET 
                            name=:name,
                            slug=:slug,
                            parent_id=:parent_id
                          ');
        $insert = $user->execute($data);

        if ($insert){
            return true;
        }else{
            return false;
        }
    }

    public function updateCategory($data) 
    {
        extract($data);

        $user = $this->db->connect->prepare('UPDATE category SET 
                            name=:name,
                            slug=:slug,
                            parent_id=:parent_id WHERE id=:id
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