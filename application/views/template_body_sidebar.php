<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url() ?>/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Pelayanan</a>
      </div>
    </div>
    <!-- search form -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- <li class="header">MAIN NAVIGATION</li> -->
      <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard text-red"></i> <span>Dashboard</span></a></li>
      <!-- <li><a href="<?php echo base_url() ?>statistik"><i class="fa fa-dashboard text-red"></i> <span>Statistik</span></a></li> -->
      <li class="treeview menu-open">
        <a href="#">
          <i class="fa fa-folder-open "></i> <span>Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: block;">
          <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Pengguna sistem </a></li> -->
          <li><a href="<?php echo base_url() ?>warga"><i class="fa fa-circle-o"></i> Data Penduduk </a></li>
          <li><a href="<?php echo base_url() ?>statistik"><i class="fa fa-circle-o"></i> Statistik </a></li>

        </ul>
      </li>
      <li class="treeview menu-open">
        <a href="#">
          <i class="fa fa-folder-open "></i> <span>Surat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: block;">
          <!-- <li><a href="<?php echo base_url() ?>/unit"><i class="fa fa-circle-o"></i> Surat Pengantar </a></li> -->
          <li><a href="<?php echo base_url() ?>surat?p=jenis_surat"><i class="fa fa-circle-o"></i> Buat Surat </a></li>
          <li><a href="<?php echo base_url() ?>surat?p=data_surat"><i class="fa fa-circle-o"></i> Daftar Surat</a></li>
        </ul>
      </li>
      <li class="treeview menu-open">
        <a href="#">
          <i class="fa fa-folder-open "></i> <span>Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: block;">
          <li><a href="<?php echo base_url() ?>jenis_surat"><i class="fa fa-circle-o"></i> Setting Surat </a></li>
          <li><a href="<?php echo base_url() ?>config_desa"><i class="fa fa-circle-o"></i> Setting Desa </a></li>
          <li><a href="<?php echo base_url() ?>jabatan"><i class="fa fa-circle-o"></i> Setting Jabatan </a></li>
          <li><a href="<?php echo base_url() ?>pamong"><i class="fa fa-circle-o"></i> Setting Pamong </a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
