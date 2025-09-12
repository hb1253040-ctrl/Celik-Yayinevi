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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="public/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> 
  
  <?php echo $data['navbar']; ?>
  <?php echo $data['sidebar']; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <p class="text-secondary h5">Cilt Türü</p>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item h6 text-secondary">Anasayfa</li>
              <li class="breadcrumb-item active h6 text-secondary">Cilt Türü</li>
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
                  <a href="skintype/add" class="btn btn-outline-success btn-sm">Ekle</a>
              </div>
              <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="h6 text-secondary">Cilt İsim</th>
                    <th class="h6 text-secondary">İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['skintype'] as $key => $value): ?>
                  <tr id="row_<?php echo $value['id'] ?>">
                    <td class="h6 text-secondary"><?php echo $value['name']; ?></td>
                    <td>
                      <a href="skintype/update/<?php echo $value['id']; ?>" class="btn btn-sm btn btn-outline-primary">Güncelle</a>
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

<?php echo $data['footer']; ?>

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
            removeSkintype(id)
        } else if (result.isDenied) {
            Swal.fire('Peki endişelenmeyin herşey yerinde duruyor :)', '', 'info')
        }
    })

  }

  function removeSkintype(id){
          let skintype_id = id;

          let formData = new FormData();
          formData.append('skintype_id',skintype_id);

          axios.post("<?php echo 'http://localhost/celik_yayinevi/skintype/delete'; ?>", formData)
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
