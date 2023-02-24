<!DOCTYPE html>
<html>

<head>
  <title>K A B</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() . "assets/" ?>css/materialize.css">
  <link rel="stylesheet" href="<?= base_url() . "assets/" ?>css/style.css">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
</head>

<body>
  <?php $this->load->view($content) ?>
  



  <!-- Compiled and minified JavaScript -->
  <script src="<?= base_url() . "assets/" ?>js/jquery.js"></script>
  <script src="<?= base_url() . "assets/" ?>js/materialize.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('.modal-show').modal();
      $('input.autocomplete').autocomplete({
        data: {
          "Apple": "Apple",
          "Microsoft": null,
          "Google": 'https://placehold.it/250x250'
        },
        limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
        onAutocomplete: function(val) {

        },
        minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
      });
      $(".button-collapse").sideNav();
      $('.carousel.carousel-slider').carousel({
        fullWidth: true
      });
      // $('.select2').select2();
      $('select').material_select();

      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false, // Close upon selecting a date,
        format: 'yyyy-mm-dd'
      });

      $('.datepicker').on('mousedown', function(event) {
        event.preventDefault();
      })

      $('ul.tabs').tabs();
      $("#goPayment").click(function() {
        $('ul.tabs').tabs('select_tab', 'payment');
      });
    });
  </script>
  <script type="text/javascript">
    function cekTP() {
      var asal = $('#p_asal').val();
      var tujuan = $('#p_tujuan').val();
      if (asal == tujuan) {
        $('#p_asal').val('');
        $('#p_tujuan').val('');
        $('#p_asal').material_select();
        $('#p_tujuan').material_select();
      }
    }

    function cekTGLP() {
      var berangkat = $('#p_b').val();
      var pulang = $('#p_p').val();
      if (pulang !== '') {
        if (pulang < berangkat) {
          $('#p_p').val(berangkat);
        }
      }
    }

    function cekTK() {
      var asal = $('#k_asal').val();
      var tujuan = $('#k_tujuan').val();
      if (asal == tujuan) {
        $('#k_asal').val('');
        $('#k_tujuan').val('');
        $('#k_asal').material_select();
        $('#k_tujuan').material_select();
      }
    }

    function cekTGLK() {
      var berangkat = $('#k_b').val();
      var pulang = $('#k_p').val();
      if (pulang !== '') {
        if (pulang < berangkat) {
          $('#k_p').val(berangkat);
        }
      }
    }
    $("#login").click(function() {
      var formData = new FormData($('#loginForm')[0]);
      $.ajax({
        url: "<?= site_url('auth/login') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $("input").removeAttr("disabled", "disabled");
          if (data.result) {
            $('#message').html('<div class="alert green">' + data.content + '</div>');
            window.location.replace('<?= base_url() ?>');
          } else {
            $('#message').html('<div class="alert red">' + data.content + '</div>');

          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          $("input").removeAttr("disabled", "disabled");
          $('#message').html('<div class="alert red">Terjadi kesalahan</div>');

        },
        beforeSend: function() {
          $("input").attr("disabled", "disabled");
          $("#message").html('<div class="progress blue lighten-4"><div class="indeterminate blue"></div> </div>');
        }
      });
      return false;
    });
    $("#register").click(function() {
      var formData = new FormData($('#registerForm')[0]);
      $.ajax({
        url: "<?= site_url('auth/register') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          $("input").removeAttr("disabled", "disabled");
          if (data.result) {
            $('#message').html('<div class="alert green">' + data.content + '</div>');
            window.location.replace('<?= base_url() ?>');
          } else {
            $('#message').html('<div class="alert red">' + data.content + '</div>');

          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          $("input").removeAttr("disabled", "disabled");
          $('#message').html('<div class="alert red">Terjadi kesalahan</div>');

        },
        beforeSend: function() {
          $("input").attr("disabled", "disabled");
          $("#message").html('<div class="progress blue lighten-4"><div class="indeterminate blue"></div> </div>');
        }
      });
      return false;
    });
  </script>
  <script type="text/javascript">
    $('.timepicker').pickatime({
      default: 'now',
      twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
      donetext: 'OK',
      autoclose: false,
      vibrate: true // vibrate the device when dragging clock hand
    });

    $('.timepicker').on('mousedown', function(event) {
      event.preventDefault();
    })
  </script>
  <script type="text/javascript">
    function addCart(id_rute, jumlah) {
      $.post('<?= base_url('order/cart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih').addClass('disabled');
        $('#b' + id_rute).attr('onclick', 'delCart(' + id_rute + ',' + jumlah + ')');
        $('#b' + id_rute).html('BATAL');
        $('#b' + id_rute).removeClass('disabled');
        $('#btnPesan').addClass('slideInDown');
        $('#orderBtn').show();
        $.post('<?= base_url('order/tabelconfirm') ?>', {
          id_rute: id_rute
        }, function(tabel) {
          $('#tblorder').html(tabel);
        });
      });
    }

    function delCart(id_rute, jumlah) {
      $.post('<?= base_url('order/dCart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih').removeClass('disabled');
        $('#b' + id_rute).attr('onclick', 'addCart(' + id_rute + ',' + jumlah + ')');
        $('#b' + id_rute).html('PILIH');
        // $('#btnPesan').removeClass('slideInDown');
        // $('#btnPesan').addClass('slideOutDown');
        $('#orderBtn').hide(500);
        $.post('<?= base_url('order/tabelconfirm') ?>', {
          id_rute: id_rute
        }, function(tabel) {
          $('#tblorder').html(tabel);
        });
      });
    }

    function addCartB(id_rute, jumlah) {
      $.post('<?= base_url('order/cart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih_b').addClass('disabled');
        $('#b' + id_rute).attr('onclick', 'delCartB(' + id_rute + ',' + jumlah + ')');
        $('#b' + id_rute).html('BATAL');
        $('#b' + id_rute).removeClass('disabled');
        $.post('<?= base_url('order/cekPP') ?>', {
          id_rute: id_rute
        }, function(data) {
          if (data == 1) {
            $.post('<?= base_url('order/tabelconfirm') ?>', {
              id_rute: id_rute
            }, function(tabel) {
              $('#tblorder').html(tabel);
            });
            $('#btnPesan').addClass('slideInDown');
            $('#orderBtn').show();
          } else {
            $('#orderBtn').hide(500);
          }
        });
      });
    }

    function delCartB(id_rute, jumlah) {
      // $('#btnPesan').removeClass('slideInDown');
      // $('#btnPesan').addClass('slideOutDown');
      $.post('<?= base_url('order/dCart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih_b').removeClass('disabled');
        $('#b' + id_rute).attr('onclick', 'addCartB(' + id_rute + ',' + jumlah + ')');
        $('#b' + id_rute).html('PILIH');
        $.post('<?= base_url('order/cekPP') ?>', {
          id_rute: id_rute
        }, function(data) {
          if (data == 1) {
            $.post('<?= base_url('order/tabelconfirm') ?>', {
              id_rute: id_rute
            }, function(tabel) {
              $('#tblorder').html(tabel);
            });
            $('#btnPesan').addClass('slideInDown');
            $('#orderBtn').show();
          } else {
            $('#orderBtn').hide(500);
          }
        });
      });
    }

    function addCartP(id_rute, jumlah) {
      $.post('<?= base_url('order/cart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih_p').addClass('disabled');
        $('#p' + id_rute).attr('onclick', 'delCartP(' + id_rute + ',' + jumlah + ')');
        $('#p' + id_rute).html('BATAL');
        $('#p' + id_rute).removeClass('disabled');
        $.post('<?= base_url('order/cekPP') ?>', {
          id_rute: id_rute
        }, function(data) {

          if (data == 1) {
            $.post('<?= base_url('order/tabelconfirm') ?>', {
              id_rute: id_rute
            }, function(tabel) {
              $('#tblorder').html(tabel);
            });
            $('#btnPesan').addClass('slideInDown');
            $('#orderBtn').show();
          } else {
            $('#orderBtn').hide(500);
          }
        });
      });
    }

    function delCartP(id_rute, jumlah) {
      // $('#btnPesan').removeClass('slideInDown');
      // $('#btnPesan').addClass('slideOutDown');
      $.post('<?= base_url('order/dCart') ?>', {
        id_rute: id_rute,
        jumlah: jumlah
      }, function(data) {
        $('.pilih_p').removeClass('disabled');
        $('#p' + id_rute).attr('onclick', 'addCartP(' + id_rute + ',' + jumlah + ')');
        $('#p' + id_rute).html('PILIH');
        $.post('<?= base_url('order/cekPP') ?>', {
          id_rute: id_rute
        }, function(data) {

          if (data == 1) {
            $.post('<?= base_url('order/tabelconfirm') ?>', {
              id_rute: id_rute
            }, function(tabel) {
              $('#tblorder').html(tabel);
            });
            $('#btnPesan').addClass('slideInDown');
            $('#orderBtn').show();
          } else {
            $('#orderBtn').hide(500);
          }
        });
      });
    }
    $("#transfer").css('display', 'none');
    $("#kartu").css('display', 'none');
    $("input[name=method]").change(function() {
      if ($("input[name=method]:checked").val() == '1') {
        $("#kartu").css('display', 'none');
        $("#transfer").css('display', 'block');
      } else if ($("input[name=method]:checked").val() == '2') {
        $("#transfer").css('display', 'none');
        $("#kartu").css('display', 'block');
      } else {
        $("#transfer").css('display', 'none');
        $("#kartu").css('display', 'none');
      }
    });

    function cekCode(harga) {
      var code = $('#kode').val();
      var total;
      $.ajax({
        url: "<?= site_url('order/check_code/') ?>/" + code + "/" + harga,
        type: "GET",
        dataType: 'json',
        success: function(data) {
          if (data.result) {
            $('#msg').html('<div class="alert green">Selamat! anda mendapatkan diskon</div>');
            $('#kode').attr('readonly', 'readonly');
            $('.total').html(data.total);
            $('#code').html('Kode Promo : ' + data.code);
            $('#min').html('- ' + data.min);
            $('#promo-t').show();

          } else {
            $('#msg').html('<div class="alert red">Kode Promo Salah</div>');
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error adding / update data');

        }
      });
    };

    $("#pay").click(function() {
      var formData = new FormData($('#orderForm')[0]);
      $.ajax({
        url: "<?= site_url('order/pay') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'JSON',
        success: function(data) {
          if (data.result) {
            window.location.replace('<?= base_url('order/complete') ?>/' + data.id_order);
          } else {
            alert('HEHEH');
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('HEHE');

        },
        beforeSend: function() {
          $("#menu").hide();
          $("#progress").show();
        }
      });
      return false;
    });
  </script>
</body>

</html>