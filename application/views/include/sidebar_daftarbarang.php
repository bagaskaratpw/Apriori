 <!-- Sidebar Menu -->
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item  ">
            <a href="<?php echo base_url('Welcome/index');?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item  ">
            <a href="<?php echo base_url('Welcome/daftar_barang');?>" class="nav-link active">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-item  ">
            <a href="<?php echo base_url('Welcome/dat_trans');?>" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog  "></i>
              <p>
                Apriori
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Welcome/pros_apr');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proses Apriori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Welcome/hasil_apr');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hasil Apriori</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->