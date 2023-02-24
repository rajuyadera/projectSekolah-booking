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
 <div class="carousel carousel-slider center" data-indicators="true">
  <div class="carousel-fixed-item center">
  </div>
  <div style="text-align: left" class="carousel-item blue lighten-1 white-text" href="#one!">
    <div class="container">
    <?php 
    if($this->session->userdata('auth_user')){
      $info = $this->m_general->gDataW('costumer',array('id_costumer'=>$this->session->userdata('auth_user')))->row();
      ?>
      <h3 style="margin-top: 100px" class="light">Hai, <?=$info->full_name?></h3>
      <p class="white-text">Nikmati berbagai kemudahan dalam membeli tiket hanya di K A B</p>
      <?php
    }else{
      ?>
      <h3 style="margin-top: 100px" class="light">SELAMAT DATANG DI K A B</h3>
      <p class="white-text">Booking Online Tiket Kereta Api</p>
      <a href="<?=site_url('account/register')?>" class="btn waves-effect blue white-text darken-text-2">DAFTAR SEKARANG</a>
      <?php
    }
    ?>
  </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div style="margin-top: -100px" class="col s12 m12 l12">
      <div class="card blue">
        <div class="card-tabs">
          <ul class="tabs tabs-fixed-width tabs-transparent tabs-icon">
            <li class="tab"><a href="#test2"><i class="material-icons">train</i>Kereta Api</a></li>
          </ul>
        </div>
        <div class="card-content grey lighten-5">
          <div id="test2">  

            <form method="GET" action="<?=site_url('train/search')?>">    
              <div class="row">
                <div class="input-field col l4 m6 s12">
                  <i class="material-icons prefix">place</i>
                  <select name="from" id="k_asal" onchange="cekTK()">
                    <option value="">Pilih Stasiun</option>
                    <?php
                    foreach($plk as $l){
                      echo '<option value="'.$l->id_place.'">'.$l->city_name.' - '.$l->place_name.'</option>';
                    }
                    ?>
                  </select>
                  <label for="icon_prefix">Kota Asal</label>
                </div>
                <div class="input-field col l4 m6 s12">
                  <i class="material-icons prefix">place</i>
                  <select name="to" id="k_tujuan" onchange="cekTK()">
                    <option value="">Pilih Stasiun</option>
                    <?php
                    foreach($plk as $l){
                      echo '<option value="'.$l->id_place.'">'.$l->city_name.' - '.$l->place_name.'</option>';
                    }
                    ?>
                  </select>
                  <label for="icon_prefix">Kota Tujuan</label>
                </div>
                <div class="input-field col l2 m6 s6">
                  <i class="material-icons prefix">airline_seat_recline_normal</i>       
                  <select name="class">
                    <option value="">Semua</option>
                    <?php
                    foreach($kk as $l){
                      echo '<option value="'.$l->id_transportation_class.'">'.$l->class_name.'</option>';
                    }
                    ?>
                  </select>
                  <label>Kelas</label>
                </div>
                <div class="input-field col l2 m6 s6">
                  <i class="material-icons prefix">group</i>   
                  <select name="ps">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  <label>Jumlah Penumpang</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col l4 m4 s12">
                  <i class="material-icons prefix">date_range</i>
                  <input type="text" name="date_g" class="datepicker" id="k_b" onchange="cekTGLK()">
                  <label for="icon_prefix">Tanggal Berangkat</label>
                </div>
                <div class="input-field col l4 m4 s12"><input type="checkbox"/>
                  <i class="material-icons prefix">date_range</i>  
                  <input type="text" name="date_b" class="datepicker" id="k_p" onchange="cekTGLK()">
                  <label for="icon_prefix">Tanggal Pulang</label>
                </div>
                <div class="col l4 m4 s12"><button type="submit" style="margin-top:20px;width: 100%" class="waves-effect blue waves-light btn"><i class="material-icons left">search</i>CARI TIKET</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row" style="margin-top: 100px">
    <div class="col m4">
      <h4>Partner Kereta Api</h4>
      <p class="light">Pergi ke stasiun ataupun menjelajah negeri, pesan tiket kereta Anda bebas repot di sini!</p>
    </div>
    <div class="col m8 partner-list">
      <?php foreach($pk as $p) {?>
      <a href="" class="partner"><img title="<?=$p->company_name?>" src="<?=base_url()."assets/"?>images/company_logo/<?=$p->company_logo?>"></a>
      <?php } ?>
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