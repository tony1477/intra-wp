<?php if ($this->session->user_level == 'admin'){ ?> 

<?php } ?>
  <div style='clear:both'></div>

  <!-- <div class='col-md-7'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Application Buttons</h3>
        </div>
        <div class='box-body'>
          <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola data-data pada aplikasi ini
              atau pilih ikon-ikon pada Control Panel di bawah ini : </p>

          <a href="<?php echo base_url(); ?>app/sopit" class='btn btn-app'><i class='fa fa-file-image-o'></i> SOP IT</a>
          <a href="<?php echo base_url(); ?>app/sopacc" class='btn btn-app'><i class='fa fa-file-image-o'></i> SOP ACC</a>
          <a href="<?php echo base_url(); ?>app/soppm" class='btn btn-app'><i class='fa fa-circle-thin'></i> SOP PM</a>
          <a href="<?php echo base_url(); ?>app/conf_perusahaan" class='btn btn-app'><i class='fa fa-file-image-o'></i> Config System</a>
          <a href="<?php echo base_url(); ?>app/edit_profileuser/<?php echo $this->session->id_users; ?>" class='btn btn-app'><i class='fa fa-edit'></i> Profile</a>
          <a href="<?php echo base_url(); ?>app/logout" class='btn btn-app'><i class='glyphicon glyphicon-off'></i> Logout</a>
        </div>
      </div>
  </div> -->

<?php 
$users = $this->libprocms->ifsqledit('tbl_ifmuser', array('user_kode' => $this->session->user_kode))->row_array();
  echo "<div class='col-md-5'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Identitas Login 2</h3>
        </div>
        <div class='box-body'>
        <div class='box box-widget widget-user'>
            <div class='widget-user-header bg-aqua-active'>
              <h3 class='widget-user-username'>$users[user_nama]</h3>
              <h5 class='widget-user-desc'>Administrator</h5>
            </div>
            <div class='widget-user-image'>
              <img class='img-circle' src='".base_url()."ifassetadm/images/$users[user_fhoto]' alt='User Avatar'>
            </div>
            <div class='box-footer' style='padding-bottom:0px'>
              <div class='row'>
                <center><br>
                <p style='width:90%'>Haloo Selamat datang!, Silahkan mengelola data-data melalui menu-menu yang sudah tersedia pada bagian sebelah kiri halaman ini, 
                    Berikut data informasi detail akun anda saat ini : </p>
                </center>
              </div>
            </div>
          </div>
          <dl class='dl-horizontal'>
                <dt>Nama Lengkap</dt>
                <dd>$users[user_nama]</dd>
              </dl>
              <a class='btn btn-block btn-sm btn-default' href='".base_url()."app/edit_karyawan/".$this->session->id_users."'>Edit Data Profile</a><br>";
        ?>
          

        </div>
      </div>
   </div>
            