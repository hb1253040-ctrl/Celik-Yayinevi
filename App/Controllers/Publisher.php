<?php 

namespace App\Controllers;

use Core\BaseController;
use App\Model\ModelPublisher;

class Publisher extends BaseController 
{
    public function Publisher() 
    {
        $ModelPublisher = new ModelPublisher;
        $data['publisher'] = $ModelPublisher->getPublishers();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("publisher/publisher",compact('data'));
    }

    public function Add() 
    {   
        $success=-1;
        $msg = "";
        $ModelPublisher = new ModelPublisher;
        $data['publisher'] = $ModelPublisher->getPublishers();
        
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("publisher/add",compact('msg','success','data'));
    }

    public function Update($id) 
    {
        $success= -1 ;
        $ModelPublisher = new ModelPublisher;
        $data['publisher'] = $ModelPublisher->getPublisher($id);

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');
        echo $this->view->load('publisher/update',compact('data','success'));
    }

    public function CreatePublisher() 
    {
        $data = $this->request->post();
            
            $uploads_dir = 'public/img/publisher';

            @$tmp_name = $_FILES['image']["tmp_name"];
            @$name = $_FILES['image']["name"];
        
            $image_name = rand(20000,32000).$name;
            $path = $uploads_dir."/".$image_name; // img/home/4536435.jpg
        
            @move_uploaded_file($tmp_name, $path);
            
            $data['image'] = $image_name;

            if (empty($data['name']))
            {
                $msg = "Lütfen YayınEvi Adını Boş Bırakmayınız";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("publisher/add",compact('data','msg','success','msg'));
                exit();
            }

            else if (empty($data['slug']))
            {
                $msg = "Lütfen YayınEvi Slug Kısmını Boş Bırakmayınız";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');

                echo $this->view->load("publisher/add",compact('data','msg',"success",'msg'));
                exit();
            }

            else if (empty($data['image'])) 
            {
                $msg = "Lütfen YayınEvi Fotoğrafı Ekleyiniz ";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');

                
                echo $this->view->load("publisher/add",compact('data','msg',"success",'msg'));
                exit();
            }

            else if (empty($data['description']))
            {
                $msg = "Lütfen YayınEvi Açıklamasını Giriniz";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("publisher/add",compact('data','msg',"success",'msg'));
                exit();
            } 

            $ModelPublisher = new ModelPublisher();

            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $insert = $ModelPublisher->createPublisher([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'description' => $data['description'],
                'image' => $data['image']
            ]);

            if ($insert){
                $success = 1;
            }else{
                $success = 0;
            }
            echo $this->view->load("publisher/add",compact('data','success'));
            
    }

    public function UpdatePublisher($id)
    {
        $data = $this->request->post();

        if (isset($_POST['update_publisher'])) {

            if (!empty($_FILES["image"]["name"])) {
                $uploads_dir = 'public/img/publisher';
        
                @$tmp_name = $_FILES['image']["tmp_name"];
                @$name = $_FILES['image']["name"];
            
                $image_name= rand(20000,32000).$name;
                $path = $uploads_dir."/".$image_name; // img/home/4536435.jpg
            
                if(@move_uploaded_file($tmp_name, $path)){
                    unlink("public/img/publisher/".$data['old_slider_image']);
                }
        
            } else {
                $image_name=$data['old_slider_image'];
            } 

            if (!$data['id']){
                $msg = "Publisher Bilgilerine Ulaşamadık";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("publisher/update",compact('data','msg',"success",'msg'));
                exit();
            }

            $ModelPublisher = new ModelPublisher();
        
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $update = $ModelPublisher->updatePublisher([
                'id' => $data['id'],
                'image' => $image_name,
                'name' => $data['name'],
                'description' => $data['description'],
                'slug' => $data['slug']
            ]);

            $data['publisher'] = $ModelPublisher->getPublisher($id);
    
    
            if ($update){
                $success=1;
            }else{
                $success=0;
            }

            echo $this->view->load("publisher/update",compact('success','data'));

        }
    
    }

    public function RemovePublisher(){

        $data = $this->request->post();

        if (!$data['publisher_id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Yayınevi bilgisi alınamadı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $remove = $this->db->remove("DELETE FROM publishers WHERE publishers.id = '{$data['publisher_id']}' ");

        if ($remove){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'YayınEvi Bilgileri kalıcı olarak silindi..';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'removed' => $data['publisher_id']]);
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