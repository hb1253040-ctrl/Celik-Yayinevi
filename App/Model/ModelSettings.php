<?php 

namespace App\Model;

use Core\BaseModel;


class ModelSettings extends BaseModel 
{
    public function getSettings($slug) 
    {
        return $this->db->query("SELECT * FROM settings WHERE slug = '$slug' " , false);

    }

    public function updateSettings($data) 
    {
        extract($data);

        $user = $this->db->connect->prepare('UPDATE settings SET 
                          title =:title,
                          description =:description
                          WHERE slug =:slug
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