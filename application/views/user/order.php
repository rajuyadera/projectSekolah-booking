<header>
    <nav class="nav-material grey lighten-5">
      <div class="nav-wrapper">
        <a style="padding-left: 20px;padding-top: 3px" href="<?= site_url() ?>" class="brand-logo">
          <img class="img-brand" src="<?= base_url() . "assets/" ?>images/logo2.png" style="width: 80px; height: 58px;">
        </a>
        <a href="#" data-activates="mobile-demo" class="button-collapse blue-text"><i class="material-icons">menu</i></a>

        <ul class="right hide-on-med-and-down">
          <li><a class="light" href="<?= site_url() ?>">Beranda</a>

          </li>
          <!--       <li><a class="light" href="badges.html">Tiket Pesawat</a>

      </li>
      <li><a class="light" href="collapsible.html">Tiket Keret Api</a>

      </li> -->
          <li>
            <?php if ($this->session->userdata('auth_user')) {
              $info = $this->m_general->gDataW('costumer', array('id_costumer' => $this->session->userdata('auth_user')))->row();
            ?>
              <a class='light dropdown-button btn blue' href='#' data-activates='dropdown1'>
                <i class="material-icons inline-text">account_circle</i> <?= $info->full_name ?></a>
              <ul id='dropdown1' class='dropdown-content'>
                <li><a href="<?= site_url('user/profile') ?>"><i class="material-icons">settings</i> Ubah Profil</a></li>
                <li><a href="<?= site_url('user/order') ?>"><i class="material-icons">shopping_cart</i> Pesanan</a></li>
                <li><a href="<?= site_url('auth/logout') ?>"><i class="material-icons">power_settings_new</i> Keluar</a></li>
              </ul>
            <?php } else {
            ?>
              <a class='light dropdown-button btn blue' href='#' data-activates='dropdown1'>
                <i class="material-icons inline-text">account_circle</i> AKUN SAYA</a>
              <ul id='dropdown1' class='dropdown-content'>
                <li><a href="<?= site_url('account/register') ?>"><i class="material-icons">person_add</i> Daftar</a></li>
                <li><a href="<?= site_url('account/login') ?>"><i class="material-icons">persons</i> Masuk</a></li>
              </ul>
            <?php
            } ?>
          </li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="sass.html"> Beranda</a>

          </li>
          </li>
          <li><a href="collapsible.html">Tiket Keret Api</a>

          </li>
          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
              <li>
                <?php if ($this->session->userdata('auth_user')) {
                  $info = $this->m_general->gDataW('costumer', array('id_costumer' => $this->session->userdata('auth_user')))->row();
                ?>
                  <a class="collapsible-header"><?= $info->full_name ?><i class="material-icons">arrow_drop_down</i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="<?= site_url('user/profile') ?>">Ubah Profil</a></li>
                      <li><a href="<?= site_url('user/order') ?>">Pesanan</a></li>
                      <li><a href="<?= site_url('auth/logout') ?>">Keluar</a></li>
                    </ul>
                  </div>
                <?php } else { ?>
                  <a class="collapsible-header">Akun Saya<i class="material-icons">arrow_drop_down</i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="<?= site_url('account/register') ?>">Daftar</a></li>
                      <li><a href="<?= site_url('account/register') ?>">Masuk</a></li>
                    </ul>
                  </div>
                <?php } ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

<main>
	<div class="page-content">
   <div class="container">
    <div class="row">
      <div class="col m4">
        <?php $this->load->view('user/nav') ?>
      </div>
      <div class="col m8">
        <div class="card grey lighten-4">
          <div class="title-card grey lighten-4">Pembelian</div>
          <div class="card-content white"> 
            <div class="row">
              <table class="bordered responsive-table striped">
                <thead>
                  <tr>
                    <th>No Order</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(empty($list)){
                    ?>
                    <tr>
                      <td colspan="4">
                        <center>
                          <i style="font-size: 50px" class="material-icons">shoppinh_cart</i><br>
                          <h5 class="light">Anda belum melakukan pembelian</h5>
                        </center>
                      </td>
                    </tr>
                    <?php
                  }else{ ?>
                  <?php foreach($list as $l){
                    if($l->status=='Terbayar'){
                      $color = "green";
                    }elseif($l->status=='Tertunda'){
                      $color = "orange";
                    }elseif($l->status=='Batal'){
                      $color = "red";
                    }
                    ?>
                    <tr>
                      <td><?=$l->id_order?></td>
                      <td><?=tgl_indo($l->order_date)?> , <?=stime($l->order_time)?></td>
                      <td><span class="label-flat <?=$color?>"><?=$l->status?></span></td>
                      <td><a href="<?=site_url('user/order_detail/'.$l->id_order.'')?>" class="btn waves-effect waves-light">Detail</a></td>
                    </tr>
                    <?php } 
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>

<footer class="page-footer blue">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">
          K A B
          </h5>
          <p class="grey-text text-lighten-4">
            Booking Online Tiket Kereta Api</p>
        </div>
      </div>

    </div>
    <div class="footer-copyright blue darken-2">
      <div class="container">
        <span>Copyright &copy; 2023 <a class="grey-text text-lighten-4" href="<?= base_url() ?>" target="_blank">K A B</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="<?= base_url() ?>">Kelompok 9 Raju & Sila</a></span>
      </div>
    </div>
  </footer>