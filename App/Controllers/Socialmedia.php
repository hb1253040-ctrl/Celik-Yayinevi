<?php 

namespace App\Controllers;

use Core\BaseController;
use App\Model\ModelSettings;

class Socialmedia extends BaseController {
    public function Socialmedia()
    { 
        $ModelSocialmedia = new ModelSettings ;

        $data = $ModelSocialmedia->getSettings('socialmedia');

        $socialmedia = json_decode($data["description"]);
        
        if (isset($_POST['update_socialmedia'])) {

            $data = $this->request->post();

            $socialmediadata = [
                'twitter' => $data['twitter'],
                'facebook' => $data['facebook'],
                'youtube' => $data['youtube'],
                'instagram' => $data['instagram']
            ];

            $update = $ModelSocialmedia->updateSettings([
                'title' => 'socialmedia',
                'slug' => 'socialmedia',
                'description' => json_encode($socialmediadata)
            ]);

            if ($update) {
                redirect('socialmedia');
            } else {
                redirect('socialmedia');
            }
        }

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');
    
        echo $this->view->load('socialmedia/socialmedia', compact('data','socialmedia'));
        
    }

    
}
