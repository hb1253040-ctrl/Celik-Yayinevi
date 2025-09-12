<?php 

namespace App\Controllers;

use Core\Request;
use Core\BaseController;
use App\Model\ModelSlider;

class Slider extends BaseController 
{

    public function Index() {

        $ModelSlider = new ModelSlider;
        $data['slider'] = $ModelSlider->getsSlider();
    
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("slider/slider",compact('data'));
    }

    public function Add() 
    {
        $success=-1;
        $msg = "";
        $ModelSlider = new ModelSlider;

        $data['slider'] = $ModelSlider->getsSlider();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load('slider/add',compact('data','success','msg'));
    }

    public function Update($id) 
    {
        $success= -1 ;
        $msg="";
        $ModelSlider = new ModelSlider();
        $data['slider'] = $ModelSlider->getSlider($id);

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load('slider/update',compact('data','success','msg'));
    }

    public function CreateSlider() 
    {

        $data = $this->request->post();
            
        $uploads_dir = 'public/img/slider';

        @$tmp_name = $_FILES['image']["tmp_name"];
        @$name = $_FILES['image']["name"];
    
        $image_name = rand(20000,32000).$name;
        $path = $uploads_dir."/".$image_name; // img/home/4536435.jpg
    
        @move_uploaded_file($tmp_name, $path);
        
        $data['image'] = $image_name;

        if (empty($data['url']))
        {
            $msg = "Lütfen YayınEvi Adını Boş Bırakmayınız";
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');
            $success = 0;
            echo $this->view->load("slider/add",compact('data','success','msg'));
            exit();
        }

        else if (empty($data['sort_order']))
        {
            $msg = "Lütfen YayınEvi Slug Kısmını Boş Bırakmayınız";
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');
            $success = 0;
            echo $this->view->load("slider/add",compact('data','success','msg'));
            exit();
        }

        else if (empty($data['image'])) 
        {
            $msg = "Lütfen YayınEvi Fotoğrafı Ekleyiniz ";
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');
            $success = 0;
            echo $this->view->load("slider/add",compact('data','success','msg'));
            exit();
        }

        $ModelSlider = new ModelSlider();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        $insert = $ModelSlider->createSlider([
            'image' => $image_name,
            'url' => $data['url'],
            'sort_order' => $data['sort_order']
        ]);

        if ($insert){
            $success = 1;
        }else{
            $success = 0;
        }
        echo $this->view->load("slider/add",compact('data','success'));
      
    }

    public function UpdateSlider($id)
    {
        $data = $this->request->post();

        if (isset($_POST['update_slider'])) {

            if (!empty($_FILES["image"]["name"])) {
                $uploads_dir = 'public/img/slider';
        
                @$tmp_name = $_FILES['image']["tmp_name"];
                @$name = $_FILES['image']["name"];
            
                $image_name= rand(20000,32000).$name;
                $path = $uploads_dir."/".$image_name; // img/home/4536435.jpg
            
                if(@move_uploaded_file($tmp_name, $path)){
                    unlink("public/img/slider/".$data['old_slider_image']);
                }
        
            } else {
                $image_name=$data['old_slider_image'];
            } 

            if (!$data['id']){
                $status = 'error';
                $title = 'Ops! Dikkat';
                $msg = 'Slider bilgisine ulaşamadık lütfen sayfanızı yenileyin.';
                echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
                exit();
            }
    
            else if (!is_numeric($data['sort_order'])) 
            {
                $status = 'error';
                $title = 'Ops! Dikkat';
                $msg = 'Lütfen Sayı Değeri Giriniz';
                echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
                exit();
            }

            $ModelSlider = new ModelSlider();
        
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $update = $ModelSlider->updateSlider([
                'id' => $data['id'],
                'image' => $image_name,
                'url' => $data['url'],
                'sort_order' => $data['sort_order']
            ]);
            $data['slider'] = $ModelSlider->getSlider($id);
    
    
            if ($update){
                $success=1;
            }else{
                $success=0;
            }

            echo $this->view->load("slider/update",compact('success','data'));

        }
    
    }

    public function RemoveSlider(){

        $data = $this->request->post();

        if (!$data['slider_id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Slider bilgisi alınamadı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }


        $remove = $this->db->remove("DELETE FROM sliders WHERE sliders.id = '{$data['slider_id']}' ");

        if ($remove){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Slider kalıcı olarak silindi..';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'removed' => $data['slider_id']]);
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