<?php 

namespace App\Controllers\Page;

use Core\BaseController;
use App\Model\ModelSettings;

class Contact extends BaseController {
    public function Index()
    {
        $ModelSettings = new ModelSettings;

        $data = $ModelSettings->getSettings('contact');
        $socialdata = $ModelSettings->getSettings('socialmedia');

        $socialmedia = json_decode($socialdata["description"]);
        $contact = json_decode($data["description"]);
        
        $data['header'] = $this->view->load('page/static/header', compact('data','contact','socialmedia'));
        $data['footer'] = $this->view->load('page/static/footer', compact('data','contact','socialmedia'));

        echo $this->view->load('page/communication', compact('data','contact'));
    }
}


?>