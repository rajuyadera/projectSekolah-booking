<header>
    <nav class="nav-material grey lighten-5">
      <div class="nav-wrapper">
        <a style="padding-left: 20px;padding-top: 3px" href="<?= site_url() ?>" class="brand-logo">
          <img class="img-brand" src="<?= base_url() . "assets/" ?>images/logos.png" style="width: 80px; height: 58px;">
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
          <div class="title-card grey lighten-4">Ubah Profil</div>
          <div class="card-content white"> <div class="row">
            <?=$this->session->flashdata('pesan')?>
            <div class="card grey lighten-4">
              <div class="card-tabs">
                <ul class="tabs tabs-fixed-width tabs-transparent">
                  <li class="tab"><a class="blue-text" href="#profile">Profil</a></li>
                  <li class="tab"><a class="blue-text" href="#password">Kata Sandi</a></li>
                </ul>
              </div>
            </div>
            <div class="container">
              <div id="profile" class="col s12">
                <?=form_open('user/p_profile')?>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">person</i>   
                    <input value="<?=$info->full_name?>" name="full_name" id="icon_prefix" type="text">
                    <label>Nama Lengkap</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">email</i>   
                    <input name="email" id="icon_prefix" value="<?=$info->email?>" type="text">
                    <label>Alamat Email</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">phone</i>   
                    <input name="phone" id="icon_prefix" value="<?=$info->phone?>" type="text">
                    <label>No. Handphone</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">home</i>   
                    <textarea name="address" class="materialize-textarea"><?=$info->address?></textarea>
                    <label>Alamat</label>
                  </div>
                  <button type="submit" class="btn blue"><i class="material-icons inline-text">save</i> Simpan</button>
                  <?=form_close()?>
                </div>
              </div>
              <div id="password" class="col s12">
                <?=form_open('user/p_password')?>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">lock_outline</i>
                    <input type="password" name="o_password">
                    <label>Kata Sandi Lama</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="password">
                    <label>Kata Sandi Baru</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="c_password">
                    <label>Ulangi Kata Sandi Baru</label>
                  </div>
                  <button type="submit" class="btn blue"><i class="material-icons inline-text">save</i> Simpan</button>
                  <?=form_close()?>
                </div>
              </div>
            </div>
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