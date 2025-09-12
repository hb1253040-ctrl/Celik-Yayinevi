<?php 

namespace App\Model;

use Core\BaseModel;

class ModelSlider extends BaseModel 
{

    public function getsSlider() 
    {
        return $this->db->query("SELECT * FROM sliders ORDER BY sort_order ASC",true);
    }

    public function getSlider($id)
    {
        return $this->db->query("SELECT * FROM sliders WHERE id = '$id' " , false);
    }

    public function createSlider($data)
    {
        extract($data);
        
        $user = $this->db->connect->prepare('INSERT INTO sliders SET 
                          url =:url,
                          sort_order =:sort_order,
                          image =:image
                          ');
        $insert = $user->execute($data);

        if ($insert){
            return true;
        }else{
            return false;
        }
    }

    public function updateSlider($data)
    {
        extract($data);

        $user = $this->db->connect->prepare('UPDATE sliders SET 
                          url =:url,
                          sort_order =:sort_order,
                          image =:image WHERE id =:id
                          ');
        $update = $user->execute($data);

        if ($update){
            return true;
        }else{
            return false;
        }

    }

    public function removeSlider($data) 
    {
        $user = $this->db->connect->prepare("DELETE FROM sliders WHERE id=:id");

        $remove = $user->execute($data);

        if ($remove){
            return true;
        }else{
            return false;
        }
        
    }


}


?>