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
  <div class="page-header blue white-text">
    <h4 class="light">Konfirmasi Pesanan</h4>
  </div>
  <div class="page-content">
   <div class="container">
    <div class="row">
      <div class="col s12 m8">
        <?php foreach($cart as $c){
          $i = $this->m_general->gRuteW($c['id_rute']);
          ?>
          <div class="card grey lighten-4">
            <div class="card-content ">
              <i class="material-icons inline-text blue-text">directions</i> 
              <?=$i[0]->place_name_from?> <?=$i[0]->p_name_from?> → <?=$i[0]->place_name_to?> <?=$i[0]->p_name_to?> | <i class="material-icons inline-text green-text">group</i> <?=$c['jumlah']?> Penumpang | <i class="material-icons inline-text orange-text">airline_seat_recline_normal</i> <?=$i[0]->class_name?>
            </div>
          </div>

          <div class="card grey lighten-4">
            <div class="title-card grey lighten-4">
              <i class="material-icons inline-text blue-text">details</i> Detail Perjalanan</div>
              <div class="card-content ">
                <b><?=hari_tgl($i[0]->depart_at)?></b><br>
                <table>
                  <tr>
                    <td width="80px">
                      <img style="width: 60px" src="<?=site_url()."assets/images/company_logo/".$i[0]->company_logo?>"></td>
                      <td><?=$i[0]->company_name?><br><span class="light"><?=$i[0]->class_name?></span>
                      </td>
                    </tr>
                  </table>
                  
                  
                  <table class="detail">
                    
                    <tbody>
                      <tr>
                        <td style="text-align:center">
                          <span class="t"><?=stime($i[0]->depart_time)?></span>
                          <p><?=$i[0]->place_name_from?></p>
                        </td>
                        <td style="text-align:center">
                          <i class="material-icons inline-text blue-text">arrow_forward</i>
                        </td>
                        <td style="text-align:center">
                          <span class="t"><?=stime($i[0]->arrive_time)?></span>
                          <p><?=$i[0]->place_name_to?></p>
                        </td>
                        <td>
                          <span class="t"><?=sel_jam($i[0]->depart_at.' '.$i[0]->depart_time,$i[0]->arrive_at.' '.$i[0]->arrive_time)?></span>
                          <p>Langsung</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="col m4">
              <div class="card grey lighten-4">
                <div class="title-card grey lighten-4"><i class="material-icons inline-text blue-text">attach_money</i> Rincian Harga</div>
                <div class="card-content ">
                  <table class="light">
                    <?php 
                    $total = 0 ;
                    foreach($cart as $c){
                      $i = $this->m_general->gRuteW($c['id_rute']);
                      $harga = $i[0]->price*$c['jumlah'];
                      $total = $total+$harga;
                      ?>
                      <tr>
                        <td  style="width:60%"><?=$i[0]->company_name?> (Penumpang) x<?=$c['jumlah']?></td>
                        <td style="text-align: right;"><b><?=rupiah($harga)?></b></td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td>Harga yang harus anda bayar</td>
                        <td style="text-align: right;"><b><?=rupiah($total)?></b></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <a href="<?=site_url('order/checkout')?>" class="btn blue btn-large" style="width: 100%">
                  <i class="material-icons inline-text">chevron_right</i> Lanjutkan ke Pemesanan</a>
                </div>
              </div>
              <div class="row">
                <div class="col m8">
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
        <!--               <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div> -->
      </div>

    </div>
    <div class="footer-copyright blue darken-2">
      <div class="container">
        <span>Copyright &copy; 2023 <a class="grey-text text-lighten-4" href="<?= base_url() ?>" target="_blank">K A B</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="<?= base_url() ?>">Kelompok 9 Raju & Sila</a></span>
      </div>
    </div>
  </footer>