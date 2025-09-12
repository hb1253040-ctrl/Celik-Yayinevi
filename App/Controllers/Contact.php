<?php 

namespace App\Controllers;

use Core\BaseController;
use App\Model\ModelSettings;

class Contact extends BaseController {
    public function Contact()
    { 
        $ModelContact = new ModelSettings ;

        $data = $ModelContact->getSettings('contact');

        $contact = json_decode($data["description"]);
        
        if (isset($_POST['update_contact'])) {

            $data = $this->request->post();

            $contactdata = [
                'address' => $data['address'],
                'phone' => $data['phone'],
                'email' => $data['email']
            ];

            $update = $ModelContact->updateSettings([
                'title' => 'contact',
                'slug' => 'contact',
                'description' => json_encode($contactdata)
            ]);

            if ($update) {
                header("location:contact");
            } else {
                header("location:contact");
            }

        }

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');
    
        echo $this->view->load('contact/contact', compact('data','contact'));
        
    }

    
}
