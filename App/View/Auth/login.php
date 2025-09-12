<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= assets('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= assets('plugins/sweetalert2/sweetalert2.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= assets('css/adminlte.min.css') ?>">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>

      button {
      position: relative;
      border: none;
      background: transparent;
      padding: 0;
      cursor: pointer;
      outline-offset: 4px;
      transition: filter 250ms;
      user-select: none;
      touch-action: manipulation;
      }

      .shadow {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: 12px;
      background: hsl(0deg 0% 0% / 0.25);
      will-change: transform;
      transform: translateY(2px);
      transition: transform
          600ms
          cubic-bezier(.3, .7, .4, 1);
      }

      .edge {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: 12px;
      background: linear-gradient(
          to left,
          hsl(340deg 100% 16%) 0%,
          hsl(340deg 100% 32%) 8%,
          hsl(340deg 100% 32%) 92%,
          hsl(340deg 100% 16%) 100%
        );
      }

      .front {
      display: block;
      position: relative;
      padding: 12px 27px;
      border-radius: 12px;
      font-size: 1.1rem;
      color: white;
      background: hsl(345deg 100% 47%);
      will-change: transform;
      transform: translateY(-4px);
      transition: transform
          600ms
          cubic-bezier(.3, .7, .4, 1);
      }

      button:hover {
      filter: brightness(110%);
      }

      button:hover .front {
      transform: translateY(-6px);
      transition: transform
          250ms
          cubic-bezier(.3, .7, .4, 1.5);
      }

      button:active .front {
      transform: translateY(-2px);
      transition: transform 34ms;
      }

      button:hover .shadow {
      transform: translateY(4px);
      transition: transform
          250ms
          cubic-bezier(.3, .7, .4, 1.5);
      }

      button:active .shadow {
      transform: translateY(1px);
      transition: transform 34ms;
      }

      button:focus:not(:focus-visible) {
      outline: none;
      }
    </style>
  </head>
<body class="hold-transition login-page" >
<div class="login-box" style="width: 500px; margin-bottom:20px; padding:20px">
    <div class="login-logo">
        <span class="display-6"><b>Çelik</b>Yayınevi</span>
    </div>
    <!-- /.login-logo -->
    <div class="card rounded-4">
        <div class="card-body rounded-4" style="background: #f4d874;">
            <p class="login-box-msg display-6 " >Giriş yapmak için bilgilerinizi doldurunuz...</p>
            <form id="login">
                <div class="input-group mb-3">
                    <input id="username" type="text" class="form-control" placeholder="Kullanıcı Adınız">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control" placeholder="Şifreniz">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button >
                    <span class="shadow"></span>
                    <span class="edge"></span>
                    <span class="front text"> Giriş Yap
                    </span>
                  </button>
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= assets('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.js') ?>"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js" integrity="sha512-lTLt+W7MrmDfKam+r3D2LURu0F47a3QaW5nF0c6Hl0JDZ57ruei+ovbg7BrZ+0bjVJ5YgzsAWE+RreERbpPE1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= assets('js/adminlte.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>

    const login = document.getElementById('login');

    login.addEventListener('submit', (e) => {
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;

        let formData = new FormData();
        formData.append('username',username);
        formData.append('password',password);

        console.log(username,password);

        axios.post('<?= $form_link; ?>', formData)
            .then(res => {
                console.log(res)
                if (res.data.redirect){
                    window.location.href = res.data.redirect;
                }
                Swal.fire(
                    res.data.title,
                    res.data.msg,
                    res.data.status
                )


            })
            .catch((err) => { console.log(err) })


        e.preventDefault();
    });

</script>
</body>
</html>
