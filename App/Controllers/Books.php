<?php 

namespace App\Controllers;

use Core\BaseController;
use App\Model\ModelBook;
use App\Model\ModelCategory;
use App\Model\ModelSkintype;
use App\Model\ModelPapertype;
use App\Model\ModelPublisher;
use App\Model\ModelAuthor;

class Books extends BaseController 
{
    public function Index() {

        $ModelBook = new ModelBook;

        $data['books'] = $ModelBook->getBooks();
        
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("books/book",compact('data'));
    }

    public function Add() {
        $success=-1;
        $msg = "";

        $ModelCategory = new ModelAuthor;
        $data['author'] = $ModelCategory->getAuthors();

        $ModelCategory = new ModelCategory;
        $data['category'] = $ModelCategory->getCategories();

        $ModelBooks = new ModelBook;
        $data['books'] = $ModelBooks->getBooks();

        $ModelSkintype = new ModelSkintype;
        $data['skintype'] = $ModelSkintype->getSkintypes();

        $ModelPapertype = new ModelPapertype;
        $data['papertype'] = $ModelPapertype->getPapertypes();

        $ModelPublisher = new ModelPublisher;
        $data['publisher'] = $ModelPublisher->getPublishers();


        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');
        
        echo $this->view->load("books/add",compact('data','success','msg'));
    }

    public function Update($id) {

        $success=-1;
        $msg = "";
        $ModelCategory = new ModelCategory;
        $data['category'] = $ModelCategory->getCategories();

        $ModelBooks = new ModelBook;
        $data['books'] = $ModelBooks->getBook($id);  
        $author_book = $ModelBooks->getAuthorbooks();

        $ModelSkintype = new ModelSkintype;
        $data['skintype'] = $ModelSkintype->getSkintypes();

        $ModelPapertype = new ModelPapertype;
        $data['papertype'] = $ModelPapertype->getPapertypes();

        $ModelPublisher = new ModelPublisher;
        $data['publisher'] = $ModelPublisher->getPublishers();

        $ModelAuthor = new ModelAuthor;
        $data['author'] = $ModelAuthor->getAuthors();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("books/update",compact('data','msg','success','author_book'));
    }

    public function CreateBooks() 
    {
        $data = $this->request->post();
        
        if (isset($_POST['add_books'])) 
        {

            $uploads_dir = 'public/img/books';

            @$tmp_name = $_FILES['image']["tmp_name"];
            @$name = $_FILES['image']["name"];
        
            $image_name = rand(20000,32000).$name;
            $path = $uploads_dir."/".$image_name; // img/home/4536435.jpg
        
            @move_uploaded_file($tmp_name, $path);
            
            $data['image'] = $image_name;

            if (!$data['name'] || !$data['skin_type_id'] || !$data['paper_type_id'] || !$data['publisher_id'] || !$data['category_id'] || !$data['size'] || !$data['paper_number'] || !$data['isbn'] || !$data['barkod'] || !$data['price'] || !$data['image'] || !$data['description'])
            {
                $msg = "Lütfen Bilgileri Tam Doldurduğunuza Emin Olun";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("books/add",compact('data','msg','success','msg'));
                exit();
            }

            $ModelBook = new ModelBook();

            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');


            $book_id = $ModelBook->createBooks([
                'name' => $data['name'],
                'skin_type_id' => $data['skin_type_id'],
                'paper_type_id' => $data['paper_type_id'],
                'publisher_id' => $data['publisher_id'],
                'category_id' => $data['category_id'],
                'paper_number' => $data['paper_number'],
                'image' => $image_name,
                'size' => $data['size'],
                'isbn' => $data['isbn'],
                'barkod' => $data['barkod'],
                'price' => $data['price'],
                'description' => $data['description'],
            ]);

            if ($book_id > 0){

                $author_book_insert = $ModelBook->createAuthorbook([
                    'book_id' => $book_id,
                    'author_id' => $data['author_id']
                ]);

                if ($author_book_insert){
                    $success = 2;
                }else{
                    $success = 3;
                }
            }else{
                $success = 0;
            }

            echo $this->view->load("books/add",compact('data','success'));
        }      
    }

    public function UpdateBooks($id)
    {
        $data = $this->request->post();

        $ModelCategory = new ModelCategory;
        $data['category'] = $ModelCategory->getCategories();

        $ModelSkintype = new ModelSkintype;
        $data['skintype'] = $ModelSkintype->getSkintypes();

        $ModelPapertype = new ModelPapertype;
        $data['papertype'] = $ModelPapertype->getPapertypes();

        $ModelPublisher = new ModelPublisher;
        $data['publisher'] = $ModelPublisher->getPublishers();

        $ModelAuthor = new ModelAuthor;
        $data['author'] = $ModelAuthor->getAuthors();

        if (isset($_POST['update_books'])) 
        {
            if (!empty($_FILES["image"]["name"])) {
                $uploads_dir = 'public/img/books';
        
                @$tmp_name = $_FILES['image']["tmp_name"];
                @$name = $_FILES['image']["name"];
            
                $image_name= rand(20000,32000).$name;
                $path = $uploads_dir."/".$image_name; // img/home/4536435.jpg
            
                if(@move_uploaded_file($tmp_name, $path)){
                    unlink("public/img/books/".$data['old_books_image']);
                }
        
            } else {
                $image_name=$data['old_books_image'];
            } 

            if (empty($data['id'])){
                $msg = "Kitap Bilgilerine Ulaşamadık";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("books/update",compact('data','msg',"success",'msg'));
                exit();
            }

            $ModelBook = new ModelBook();
        
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $update = $ModelBook->updateBooks([
                'id' => $data['id'],
                'name' => $data['name'],
                'skin_type_id' => $data['skin_type_id'],
                'paper_type_id' => $data['paper_type_id'],
                'publisher_id' => $data['publisher_id'],
                'category_id' => $data['category_id'],
                'paper_number' => $data['paper_number'],
                'size' => $data['size'],
                'image' => $image_name,
                'isbn' => $data['isbn'],
                'barkod' => $data['barkod'],
                'price' => $data['price'],
                'description' => $data['description']
            ]);

            $data['books'] = $ModelBook->getBook($id);

            $author_book_update = $ModelBook->updateAuthorbook([
                'book_id' => $data['id'],
                'author_id' => $data['author_id']
            ]);

            $ModelBookAuthor = new ModelBook;
            $author_book = $ModelBookAuthor->getAuthorbooks();
    
            if ($update){
                $success=1;
            }else{
                $success=0;
            }

            echo $this->view->load("books/update",compact('success','data','author_book'));

        }
    
    }

    public function RemoveBooks()
    {
        $data = $this->request->post();

        if (!$data['book_id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Kitap bilgisi alınamadı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $remove = $this->db->remove("DELETE FROM books WHERE books.id = '{$data['book_id']}' ");

        if ($remove){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Kitap Bilgileri kalıcı olarak silindi..';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'removed' => $data['book_id']]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Beklenmedik bir hata meydana geldi. Lüfen sayfanızı yenileyerek tekrar deneyin.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }
    
}

?>