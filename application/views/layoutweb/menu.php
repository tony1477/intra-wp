<?php 
    $site         = $this->webconfigms->ifsqlselectlisting(); 
    $site_nav     = $this->webconfigms->ifsqlselectlisting();
    $nav_profil   = $this->webnavms->ifsqlselectnavprofil();
    $nav_download = $this->webnavms->nav_download();
    $nav_berita   = $this->webnavms->nav_berita();
    $nav_agenda   = $this->webnavms->nav_agenda();
    $nav_layanan  = $this->webnavms->ifsqlselectnavlayanan();
?>

<!-- Start Menu -->
<div class="bg-main-menu menu-scroll">
<div class="container">
<div class="row">
<div class="main-menu">
<a class="show-res-logo" href="<?php echo base_url() ?>"><img src="<?php echo $this->libifwebsite->logo() ?>" alt="logo" class="img-responsive" style="max-height: 76px; width: auto;" /></a>
<nav class="navbar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
        <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo $this->libifwebsite->logo() ?>" alt="logo" class="img-responsive" style="max-height: 56px; width: auto;" /></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <!-- HOME -->
            <li><a href="<?php echo base_url() ?>" class="active">BERANDA</a></li>

            <!-- TENTANG -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TENTANG<span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    <!-- <?php foreach($nav_profil as $nav_profil) { ?> -->
                     <!-- <li class="sub-active"><a href="<?php echo base_url('berita/profil/'.$nav_profil->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_profil->judul_berita ?></a></li> -->
                    <!-- <?php } ?> --> 
                    <li class="sub-active"><a href="<?php echo base_url('berita/profil/'.$nav_profil->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> COMPANY PROFILE</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('berita/profil/'.$nav_profil->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> VISI, MISI & VALUE</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('berita/profil/'.$nav_profil->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> STRATEGIC</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('berita/profil/'.$nav_profil->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> DIREKSI</a></li>
                </ul>
            </li>

            <!-- BISNIS KAMI -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BISNIS KAMI <span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    <!-- <?php foreach($nav_berita as $nav_berita) { ?> -->
                    <!-- <li class="sub-active"><a href="<?php echo base_url('berita/kategori/'.$nav_berita->slug_kategori) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_berita->nama_kategori ?></a></li> -->
                    <!-- <?php } ?> -->
                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> PERKEBUNAN</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> PABRIK KELAPA SAWIT</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> SERAI WANGI</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> FOOD & BEVORAGE</a></li>
                </ul>
            </li>

            <!-- INVESTOR -->
            <li><a href="<?php echo base_url('download') ?>">INVESTOR</a></li>

            <!-- SUSTAINABILITY -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SUSTAINABILITY <span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    <!-- <?php foreach($nav_berita as $nav_berita) { ?> -->
                    <!-- <li class="sub-active"><a href="<?php echo base_url('berita/kategori/'.$nav_berita->slug_kategori) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_berita->nama_kategori ?></a></li> -->
                    <!-- <?php } ?> -->
                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> POLICY</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> CERTIFICATION</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> ENURANMENT</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('berita') ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> COMMUNTITY DEVELOPMENT</a></li>
                </ul>
            </li>

            <!-- INFORMASI -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">INFORMASI<span class="caret"></span></a>
                <ul class="dropdown-menu sub-menu">
                    <?php foreach($nav_layanan as $nav_layanan) { ?>
                        <li class="sub-active"><a href="<?php echo base_url('berita/layanan/'.$nav_layanan->slug_berita) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $nav_layanan->judul_berita ?></a></li>
                    <?php } ?>

                    <li class="sub-active"><a href="<?php echo base_url('galeri'); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Galeri Foto</a></li>
                    <li class="sub-active"><a href="<?php echo base_url('video'); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Galeri Video</a></li>
                </ul>
            </li>
            
            <!-- kontak  -->
            <li><a href="<?php echo base_url('kontak') ?>">KONTAK</a></li>

            <!-- Language  -->
            <li><a class="flag-1" href="#"><img src="<?php echo base_url() ?>assets/images/eng_flag.png" style="width:25px; height:24px; display: block;" alt="logo" class="img-responsive"></a></li>
            <li><a class="flag-2" href="#"><img src="<?php echo base_url() ?>assets/images/idn_flag.png" style="width:25px; height:24px; display: block;" alt="logo2" class="img-responsive"></a></li>

        </ul>

        <div class="menu-right-option pull-right">
            <!--  Setting Bahasa -->
            
            <!-- <a class="flag-1" href="#"><img src="<?php echo base_url() ?>assets/images/eng_flag.png" style="width:25px; height:24px; display: block;" alt="logo" class="img-responsive"></a> -->
            <!-- <a class="flag-2" href="#"><img src="<?php echo base_url() ?>assets/images/idn_flag.png" style="width:25px; height:24px; display: block;" alt="logo" class="img-responsive"></a> -->
            

            <!-- <div class="search-box"> -->
            <!--     <i class="fa fa-search first_click" aria-hidden="true" style="display: block;"></i> -->
            <!--     <i class="fa fa-times second_click" aria-hidden="true" style="display: none;"></i> -->
            <!-- </div> -->

            <!-- <div class="search-box-text"> -->
            <!--     <form action="http://demos.codexcoder.com/labartisan/html/GreenForest/search"> -->
            <!--         <input type="text" name="search" id="all-search" placeholder="Search Here"> -->
            <!--     </form> -->
            <!-- </div> -->

        </div>

        <!-- .header-search-box -->
    </div>
    <!-- .navbar-collapse -->
</nav>
</div>
<!-- .main-menu -->
</div>
<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .bg-main-menu -->
</header>

