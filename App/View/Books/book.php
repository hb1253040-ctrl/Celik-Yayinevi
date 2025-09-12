<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">
  <!-- Datatable -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <?php echo $data['navbar']; ?>
  <?php echo $data['sidebar']; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <p class="h5 text-secondary">Kitaplar</p>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item h6 text-secondary">Anasayfa</li>
              <li class="breadcrumb-item active h6 text-secondary">Kitaplar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="d-grid gap-2 d-md-block float-right m-3">
                  <a href="books/add" class="btn btn-outline-success btn-sm">Ekle</a>
              </div>
              <div class="card-body">
                <table id="example" class="table table-bordered table-hover border border-2">
                  <thead>
                  <tr>
                    <th class="text-secondary">Fotoğraf</th>
                    <th class="text-secondary">Kitap Adı</th>
                    <th class="text-secondary">Barkod</th>
                    <th class="text-secondary">Fiyat</th>
                    <th class="text-secondary">İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['books'] as $key => $value):  ?>
                    <tr id="row_<?php echo $value['id'] ?>">
                      <td><img style="height:160px; width:120px; border-radius:5px" class="d-flex justify-content-center" src="public/img/books/<?php echo $value['image'] ?>" alt=""></td>
                      <td><p class="h6 text-secondary d-flex justify-content-center"><?php echo $value['name']; ?></p></td>
                      <td><p class="h6 text-secondary d-flex justify-content-center"><?php echo $value['barkod']; ?></p></td>
                      <td><p class="h6 text-secondary d-flex justify-content-center"><?php echo $value['price'] ?></p></td>
                      <td>
                        <a href="books/update/<?php echo $value['id']; ?>" class="btn btn-sm btn btn-outline-primary">Güncelle</a>
                        <button class="btn btn-outline-danger btn-sm" onclick="confirm('<?php echo $value['id'] ?>')">Sil</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<script>

function confirm(id){

Swal.fire({
    title: 'Silmek istediğinize emin misiniz?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Emin eminim!',
    denyButtonText: `Hayır, vazgeçtim.`,
}).then((result) => {

    if (result.isConfirmed) {
        removeBook(id)
    } else if (result.isDenied) {
        Swal.fire('Peki endişelenmeyin herşey yerinde duruyor :)', '', 'info')
    }
})

}

function removeBook(id){
      let book_id = id;

      let formData = new FormData();
      formData.append('book_id',book_id);

      axios.post("<?php echo _link('books/delete'); ?>", formData)
          .then(res => {
              console.log(res)
              if (res.data.removed){
                  document.getElementById('row_'+ res.data.removed).remove();
              }
              Swal.fire(
                  res.data.title,
                  res.data.msg,
                  res.data.status
              )
          })
          .catch((err) => { console.log(err) })
  }

</script>

<?php echo $data['footer']; ?>

