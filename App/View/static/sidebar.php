<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-purple-warning elevation-4">
    <!-- Sidebar -->
    <a href="index3.html" class="brand-link border-bottom border border-light-subtle link-underline-light">
      <img src="<?php echo assets('img/logo.jpg');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 " style="opacity: .8">
      <span class="brand-text font-weight-light text-warning">Çelik YayınEvi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo assets('img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-secondary link-underline-light">Hüseyin Bayrak</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column"  data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item h6">
            <a href="<?php echo _link('admin'); ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Anasayfa
              </p>
            </a>
          </li>
          <li class="nav-item h6 mt-2">
            <a href="<?php echo _link('slider'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
          <li class="nav-item h6 mt-2">
            <a href="<?php echo _link('author'); ?>" class="nav-link">
              <i class="nav-icon fas fa-solid fa-pen"></i>
              <p>
                Yazarlar
              </p>
            </a>
          </li>
          <li class="nav-item h6 mt-2">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-book"></i>
              <p>
                Kitaplar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview h6">
              <li class="nav-item h6">
                <a href="<?php echo _link('books'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kitap</p>
                </a>
              </li>
              <li class="nav-item h6 h6">
                <a href="<?php echo _link('papertype'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kitap Türü</p>
                </a>
              </li>
              <li class="nav-item h6">
                <a href="<?php echo _link('skintype'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cilt Türü</p>
                </a>
              </li>
              <li class="nav-item h6">
                <a href="<?php echo _link('publisher'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>YayınEvi</p>
                </a>
              </li>
              <li class="nav-item h6">
                <a href="<?php echo _link('category'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategoriler</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item h6 mt-2">
            <a href="<?php echo _link('contact'); ?>" class="nav-link">
              <i class="nav-icon fas fa-solid fa-tty"></i>
              <p>
                İletişim
              </p>
            </a>
          </li>
          <li class="nav-item h6 mt-2">
            <a href="<?php echo _link('socialmedia'); ?>" class="nav-link">
            <i class="far fa-user nav-icon"></i>
              <p>
                Sosyal Medya
              </p>
            </a>
          </li>
          <li class="nav-item h6 mt-2">
            <a href="<?php echo _link('comment'); ?>" class="nav-link">
              <i class="nav-icon fas fa-solid fa-comment"></i>
              <p>
                Yorumlar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>