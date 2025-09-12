<?php 

namespace App\Controllers;

use Core\BaseController;
use App\Model\ModelAuthor;

class Author extends BaseController {
    public function Author() {
        
        $ModelAuthor = new ModelAuthor();
        $data['author'] = $ModelAuthor->getAuthors();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("author/author",compact('data'));
    }

    public function Add() 
    {
        
        $msg="";
        $success=-1;
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        $ModelAuthor = new ModelAuthor();
        $data['author'] = $ModelAuthor->getAuthors();

        echo $this->view->load("author/add",compact('data','msg','success'));
    }

    public function Update($id) {
        $msg="";
        $success=-1;
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        $ModelAuthor = new ModelAuthor();
        $data['author'] = $ModelAuthor->getAuthor($id);

        echo $this->view->load("author/update",compact('data','msg','success'));
    }

    public function CreateAuthor() 
    {

        $data = $this->request->post();

        if (isset($_POST['add_author'])) 
        {
            $uploads_dir = 'public/img/author';

            @$tmp_name = $_FILES['image']["tmp_name"];
            @$name = $_FILES['image']["name"];
        
            $image_name = rand(20000,32000).$name;
            $path = $uploads_dir."/".$image_name; // img/home/4536435.jpg
        
            @move_uploaded_file($tmp_name, $path);
            
            $data['image'] = $image_name;

            if (empty($data['name']))
            {
                $msg = "Lütfen Yazar Adını Boş Bırakmayınız";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("author/add",compact('data','msg','success','msg'));
                exit();
            }

            else if (empty($data['type']))
            {
                $msg = "Lütfen Yazar Türünü Boş Bırakmayınız";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');

                echo $this->view->load("author/add",compact('data','msg',"success",'msg'));
                exit();
            }

            else if (empty($data['image'])) 
            {
                $msg = "Lütfen Yazar Fotoğrafı Ekleyiniz ";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');

                
                echo $this->view->load("author/add",compact('data','msg',"success",'msg'));
                exit();
            }

            else if (empty($data['description']))
            {
                $msg = "Lütfen Yazar Açıklamasını Giriniz";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("author/add",compact('data','msg',"success",'msg'));
                exit();
            }

            $ModelAuthor = new ModelAuthor();

            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');
            $data['author'] = $ModelAuthor->getAuthors();

            $insert = $ModelAuthor->createAuthor([
                'name' => $data['name'],
                'type' => $data['type'],
                'image'=> $image_name,
                'description' => $data['description']
            ]);
    
            if ($insert){
                $success = 1;
            }else{
                $success = 0;
            }
            
            echo $this->view->load("author/add",compact('data','success'));

        }

    }
    public function UpdateAuthor($id)
    {
        $data = $this->request->post();

        if (isset($_POST['update_author'])) {

            if (!empty($_FILES["image"]["name"])) {
                $uploads_dir = 'public/img/author';
        
                @$tmp_name = $_FILES['image']["tmp_name"];
                @$name = $_FILES['image']["name"];
            
                $image_name= rand(20000,32000).$name;
                $path = $uploads_dir."/".$image_name; // img/home/4536435.jpg
            
                if(@move_uploaded_file($tmp_name, $path)){
                    unlink("public/img/author/".$data['old_slider_image']);
                }
        
            } else {
                $image_name=$data['old_slider_image'];
            } 

            if (!$data['id']){
                $msg = "Yazar Bilgilerine ulaşamadık";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("author/update",compact('data','msg',"success",'msg'));
                exit();
            }

            $ModelAuthor = new ModelAuthor();
            
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $update = $ModelAuthor->updateAuthor([
                'id' => $data['id'],
                'name' => $data['name'],
                'type' => $data['type'],
                'image'=> $image_name,
                'description' => $data['description']
            ]);

            $data['author'] = $ModelAuthor->getAuthor($id);
    
    
            if ($update){
                $success=1;
            }else{
                $success=0;
            }

            echo $this->view->load("author/update",compact('success','data'));

        }
    
    }

    public function RemoveAuthor(){

        $data = $this->request->post();

        if (!$data['author_id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Yazar bilgisi alınamadı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }


        $remove = $this->db->remove("DELETE FROM author WHERE author.id = '{$data['author_id']}' ");

        if ($remove){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Yazar Bilgileri kalıcı olarak silindi..';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'removed' => $data['author_id']]);
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