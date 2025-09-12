<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../public/css/adminlte.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../public/plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../public/plugins/summernote/summernote-bs4.min.css">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php echo $data['navbar']; ?>
  <?php echo $data['sidebar']; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ekle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php if(empty($msg)) {?>  
    <div class="alert alert-info alert-dismissible text-center mx-auto" style="width: 60rem;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            YayınEvi Bilgilerini Burdan Ekleyebilirsiniz
    </div>
    <?php } else { ?>
    <div class="alert alert-danger alert-dismissible text-center mx-auto" style="width: 60rem;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $msg; ?>      
    </div>
    <?php } ?>
    <?php if ($success == 1){ ?>
      <div class="alert alert-success alert-dismissible text-center mx-auto" style="width: 60rem;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              YayınEvi Bilgilerini Eklediniz....
      </div>

      <?php } else if($success == 0 ) {  ?>
      <div class="alert alert-info alert-dismissible text-center mx-auto" style="width: 60rem;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              YayınEvi Bilgilerinizi Burdan Ekleyebilirsiniz
      </div>
    <?php } ?>
    <div class="content">
        <div class="card-body">
            <div class="card mx-auto border-light" style="width: 60rem;">
                <h5 class="card-header text-center display-6"><strong>Kağıt Türü Ekleme</strong></h5>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body ">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name">
                            <label for="publisher_name">Kağıt Türü</label>
                        </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success" name="add_papertype">Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php echo $data['footer']; ?>
