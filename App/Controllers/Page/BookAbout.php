<?php 

namespace App\Controllers\Page;

use Core\BaseController;
use App\Model\ModelSettings;
use App\Model\ModelBook;
use App\Model\ModelCategory;
use App\Model\ModelSkintype;
use App\Model\ModelPapertype;
use App\Model\ModelPublisher;
use App\Model\ModelBookComment;

class BookAbout extends BaseController {
    public function Index($id)
    {
        $ModelSettings = new ModelSettings;
        $ModelBook = new ModelBook;
        $ModelCategory = new ModelCategory;
        $ModelSkintype = new ModelSkintype;
        $ModelPapertype = new ModelPapertype;
        $ModelPublisher = new ModelPublisher;
        $ModelBookComment = new ModelBookComment();

        $success= -1;
        $msg = "";
        $book_data = $ModelBook->getBook($id);
        $books_data = $ModelBook->getBooks();
        $about_book_data = $ModelBook->getAuthorbooks();
        $book_comment_data = $ModelBookComment->getBookcomments();
        $skin_type_data = $ModelSkintype->getSkintypes();
        $paper_type_data = $ModelPapertype->getPapertypes();
        $publisher_data = $ModelPublisher->getPublishers();
        $category_data = $ModelCategory->getCategories();
        $data = $ModelSettings->getSettings('contact');
        $socialdata = $ModelSettings->getSettings('socialmedia');

        $socialmedia = json_decode($socialdata["description"]);
        $contact = json_decode($data["description"]);
        
        $data['header'] = $this->view->load('page/static/header', compact('data','contact','socialmedia'));
        $data['footer'] = $this->view->load('page/static/footer', compact('data','contact','socialmedia'));

        echo $this->view->load('page/book_about', compact('data','about_book_data','book_comment_data','contact','book_data','category_data','paper_type_data','skin_type_data','publisher_data','books_data','success','msg'));
    }

    public function CreateBookAbout($id) 
    {
        $data = $this->request->post();

        $ModelSettings = new ModelSettings;
        $ModelBook = new ModelBook;
        $ModelCategory = new ModelCategory;
        $ModelSkintype = new ModelSkintype;
        $ModelPapertype = new ModelPapertype;
        $ModelPublisher = new ModelPublisher;

        $book_data = $ModelBook->getBook($id);
        $books_data = $ModelBook->getBooks();
        $about_book_data = $ModelBook->getAuthorbooks();
        $skin_type_data = $ModelSkintype->getSkintypes();
        $paper_type_data = $ModelPapertype->getPapertypes();
        $publisher_data = $ModelPublisher->getPublishers();
        $category_data = $ModelCategory->getCategories();
        $contact_data = $ModelSettings->getSettings('contact');
        $socialdata = $ModelSettings->getSettings('socialmedia');

        $socialmedia = json_decode($socialdata["description"]);
        $contact = json_decode($contact_data["description"]);

        $ModelBookComment = new ModelBookComment();
        $book_comment_data = $ModelBookComment->getBookcomments();
        
        $data['header'] = $this->view->load('page/static/header', compact('contact_data','contact','socialmedia'));
        $data['footer'] = $this->view->load('page/static/footer', compact('contact_data','contact','socialmedia'));
        
        $insert = $ModelBookComment->createBookcomment([
            'book_id' => $data['book_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'comment' => $data['comment']
        ]);

        if ($insert){
            $success=1;
        }else{
            $success=0;
        }
        echo $this->view->load('page/book_about', compact('data','about_book_data','contact','book_data','category_data','paper_type_data','skin_type_data','publisher_data','books_data','contact_data','success','book_comment_data'));
    }
}


?>