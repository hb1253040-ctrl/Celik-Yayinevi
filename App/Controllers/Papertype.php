<?php 

namespace App\Controllers;
use Core\BaseController;

use App\Model\ModelPapertype;

class Papertype extends BaseController {
    public function Papertype()
    {
        $success = -1;
        $msg = "";
        $ModelPapertype = new ModelPapertype;
        $data['papertype'] = $ModelPapertype->getPapertypes();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("papertype/papertype",compact('data'));
    }
    public function Add()
    {
        $success = -1;
        $msg = "";
        $ModelPapertype = new ModelPapertype;
        $data['papertype'] = $ModelPapertype->getPapertypes();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("papertype/add",compact('data','success','msg'));
    }

    public function Update($id)
    {
        $success = -1;
        $msg = "";
        $ModelPapertype = new ModelPapertype;
        $data['papertype'] = $ModelPapertype->getPapertype($id);

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load("papertype/update",compact('data','success','msg'));
    }


    public function CreatePapertype()
    {
        $data = $this->request->post();
    
        if (isset($_POST['add_papertype'])) 
        {
            if (empty($data['name']))
            {
                $msg = "Lütfen YayınEvi Adını Boş Bırakmayınız";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("papertype/add",compact('data','msg','success','msg'));
                exit();
            }

            $ModelPapertype = new ModelPapertype();

            $data['category'] = $ModelPapertype->getPapertypes();
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $insert = $ModelPapertype->createPapertype([
                'name' => $data['name'],
            ]);

            if ($insert){
                $success = 1;
            }else{
                $success = 0;
            }
            echo $this->view->load("papertype/add",compact('data','success'));
        }
    }

    public function UpdatePapertype($id)
    {
        $data = $this->request->post();

        if (isset($_POST['update_papertype'])) {

            if (!$data['id']){
                $msg = "Kağıt Türü Bilgilerine Ulaşamadık";
                $success = 0;
                $data['navbar'] = $this->view->load('static/navbar');
                $data['sidebar'] = $this->view->load('static/sidebar');
                $data['footer'] = $this->view->load('static/footer');
                
                echo $this->view->load("papertype/update",compact('data','msg',"success",'msg'));
                exit();
            }

            $ModelPapertype = new ModelPapertype();
            $data['papertype'] = $ModelPapertype->getPapertype($id);
        
            $data['navbar'] = $this->view->load('static/navbar');
            $data['sidebar'] = $this->view->load('static/sidebar');
            $data['footer'] = $this->view->load('static/footer');

            $update = $ModelPapertype->updatePapertype([
                'id' => $data['id'],
                'name' => $data['name']
            ]);
    
            if ($update){
                $success=1;
            }else{
                $success=0;
            }

            echo $this->view->load("papertype/update",compact('success','data'));

        }
    }

    public function RemovePapertype()
    {
        $data = $this->request->post();

        if (!$data['papertype_id']){
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Kitap bilgisi alınamadı.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }


        $remove = $this->db->remove("DELETE FROM paper_types WHERE paper_types.id = '{$data['papertype_id']}' ");

        if ($remove){
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Kağıt Türü Bilgileri kalıcı olarak silindi..';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'removed' => $data['papertype_id']]);
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