<?php 

namespace App\Controllers\Page;

use Core\BaseController;
use App\Model\ModelSettings;
use App\Model\ModelAuthor;
use App\Model\ModelBook;

class AuthorAbout extends BaseController {
    public function Index($id)
    {
        $ModelSettings = new ModelSettings;
        $ModelAuthor = new ModelAuthor;
        $ModelBook = new ModelBook;

        $author_data = $ModelAuthor->getAuthor($id);
        $about_book_data = $ModelBook->getAuthorbooks();

        $data = $ModelSettings->getSettings('contact');
        $socialdata = $ModelSettings->getSettings('socialmedia');

        $socialmedia = json_decode($socialdata["description"]);
        $contact = json_decode($data["description"]);
        
        $data['header'] = $this->view->load('page/static/header', compact('data','contact','socialmedia'));
        $data['footer'] = $this->view->load('page/static/footer', compact('data','contact','socialmedia'));

        echo $this->view->load('page/author_about', compact('data','contact','author_data','about_book_data'));
    }
}


?>