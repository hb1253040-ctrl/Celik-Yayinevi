<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../public/plugins/summernote/summernote-bs4.min.css">
  <!-- Datatable -->
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" />
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
            <h1 class="display-6"></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    <?php if ($success == 1){ ?>
      <div class="alert alert-success alert-dismissible text-center mx-auto" style="width: 60rem;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Kağıt Türü Bilgilerini Güncellediniz....
      </div>

      <?php } else if($success == 0 ) {  ?>
      <div class="alert alert-danger alert-dismissible text-center mx-auto" style="width: 60rem;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Kağıt Türü Bilgilerini Güncelleyemediniz !!!
      </div>
      <?php } else if($success == -1 ) {  ?>
      <div class="alert alert-primary alert-dismissible text-center mx-auto" style="width: 60rem;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Buradan Kağıt Türü Bilgilerini Güncelleyebilirsiniz
      </div>
    <?php } ?>
    <div class="card mx-auto border-light" style="width: 60rem;">
        <h5 class="card-header text-center display-6 text-info"><strong>Yazar Güncelleme</strong></h5>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $data['papertype']['id'] ?? ''; ?>">
          <div class="card-body ">
              <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="name" value="<?php echo $data['papertype']['name'] ?? ''; ?>">
                  <label for="papertype_name">Kağıt Türü</label>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="update_papertype">Güncelle</button>
          </div>
        </form>
    </div>
    <!-- /.content -->
  </div>
  </section>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php echo $data['footer']; ?>

