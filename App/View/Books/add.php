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
    <div class="content">
        <div class="card mx-auto border-light" style="width: 60rem;">
            <div class="card-body mx-auto border-light" style="width: 60rem;">
              <h5 class="card-header text-center text-secondary"><strong>Kitap Ekleme</strong></h5>
                <form class="row g-3" method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-3 col-md-4 ">
                        <input type="text" class="form-control" name="name">
                        <label for="validationDefault01" class="form-label ">İsim</label>
                    </div>
                    <div class="form-floating mb-3 col-md-5">
                        <select class="form-select" name="author_id">
                          <option selected>Yazar Adı</option>
                          <?php foreach ($data['author'] as $key => $value): ?>
                              <option value="<?php echo $value['id'];?>"><?php echo $value['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="validationDefault04" class="form-label">Yazar Adı</label>
                    </div>
                    <div class="form-floating mb-3 col-md-3">
                        <select class="form-select" name="skin_type_id">
                          <option selected>Cilt Türü</option>
                          <?php foreach ($data['skintype'] as $key => $value): ?>
                              <option value="<?php echo $value['id'];?>"><?php echo $value['name'];  ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="validationDefault04" class="form-label">Cilt Türü</label>
                    </div>
                    <div class="form-floating mb-3 col-md-5">
                        <select class="form-select" name="publisher_id">
                          <option selected>YayınEvleri</option>
                          <?php foreach ($data['publisher'] as $key => $value): ?>
                              <option value="<?php echo $value['id'];?>"><?php echo $value['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="validationDefault04" class="form-label">Yayınevi</label>
                    </div>
                    <div class="form-floating mb-3 col-md-3">
                        <select class="form-select" name="paper_type_id">
                          <option selected>Kağıt Türü</option>
                          <?php foreach ($data['papertype'] as $key => $value): ?>
                              <option value="<?php echo $value['id'];?>"><?php echo $value['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="validationDefault04" class="form-label">Kağıt Türü</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <select class="form-select" name="category_id">
                          <option selected>Kategoriler</option>
                          <?php foreach ($data['category'] as $key => $value): ?>
                              <option value="<?php echo $value['id'];?>"><?php echo $value['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="validationDefault04" class="form-label">Kategoriler</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <input type="text" class="form-control" name="size">
                        <label for="validationDefault05" class="form-label">Boyut</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <input type="text" class="form-control" name="paper_number" >
                        <label for="validationDefault05" class="form-label">Sayfa Sayısı</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <input type="text" class="form-control" name="isbn">
                        <label for="validationDefault05" class="form-label">İSBN</label>
                    </div>
                    <div class="form-floating mb-3 col-md-5">
                        <input type="text" class="form-control" name="barkod">
                        <label for="validationDefaultUsername" class="form-label">Barkod</label>
                    </div>
                    <div class="form-floating mb-3 col-md-7">
                        <input type="text" class="form-control" name="price">
                        <label for="validationDefaultUsername" class="form-label">Fiyat</label>
                    </div>
                    <div class="form-floating mb-3  col-12">
                        <textarea class="form-control" placeholder="" name="description"></textarea>
                        <label for="floatingTextarea">Comments</label>
                    </div>
                    <div class="form-floating mb-3  col-12">
                        <input type="file" class="form-control" name="image">
                        <label for="floatingTextarea">Fotoğraf</label>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success" name="add_books">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php echo $data['footer']; ?>