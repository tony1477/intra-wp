<section class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <?php $users = $this->libprocms->ifsqledit('tbl_ifmuser', array('user_kode' => $this->session->user_kode))->row_array();
                if (trim($users['user_fhoto'])==''){ $user_fhoto = 'blank.png'; }else{ $user_fhoto = $users['user_fhoto']; } ?>
                    <img src="<?php echo base_url(); ?>/ifassetadm/imguser/<?php echo $user_fhoto; ?>" class="img-circle" alt="User Image">
        </div>
    
        <div class="pull-left info">
            <p><?php echo $users['user_nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>  

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>Menu Administrator</li>
        <li><a href="<?php echo base_url(); ?>app/homebpomenu"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
        <!-- Visi & Misi -->
        <li><a href="<?php echo base_url(); ?>modul_bpo/ifmvisimisics/bpo_ifshowvisimisics/ifshowvisimisi"><i class="glyphicon glyphicon-home"></i> <span>Visi & Misi</span></a></li>

        <!-- Struktur Organisasi --> 
        <li><a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorgdefault"><i class="glyphicon glyphicon-equalizer"></i> Struktur Organisasi</a></li>

        <li class="treeview">
            <!-- BPO (Best Practiece Operational) -->
            <a href="#"><i class="fa fa-archive"></i> <span>Best Practiece Operational</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- HO -->
                    <li><a href="<?php echo base_url(); ?>app/master"><i class="fa fa-sign-in"></i> Head Office <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu menu-open">
                            <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopho01"><i class="fa fa-sign-out"></i> Kebijakan </a></li>
                            <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopho02"><i class="fa fa-sign-out"></i> Manual </a></li>
                            <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopho03"><i class="fa fa-sign-out"></i> SOP</a></li>
                            <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopho04"><i class="fa fa-circle-o"></i> Instruksi Kerja </a></li>
                            <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopho05"><i class="fa fa-circle-o"></i> Lain-Lain </a></li>
                        </ul>
                    </li>

                    <!-- PKS / MILL -->
                    <li><a href="<?php echo base_url(); ?>app/master"><i class="fa fa-sign-in"></i> Mill Operations <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu menu-open">
                            <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensoppks01""><i class="fa fa-sign-out"></i> SOP </a></li> 
                            <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensoppks02"><i class="fa fa-sign-out"></i> Instruksi Kerja </a></li> 
                        </ul>
                    </li>

                    <!-- ESTATE -->
                    <li><a href="<?php echo base_url(); ?>app/master"><i class="fa fa-sign-in"></i> Estate Operations <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu menu-open">
                            <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopest01"><i class="fa fa-sign-out"></i> SOP </a></li> 
                            <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopest02"><i class="fa fa-sign-out"></i> Instruksi Kerja </a></li> 
                        </ul>
                    </li>
                </ul>
            </li>
        </li>


        <!-- Tabel GA -->
        <li class="treeview">
            <a href="#"><i class="fa fa-archive"></i> <span>Galeri Album</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">              
                <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowfhoto"><i class="fa fa-sign-out"></i> Foto</a></li>
                <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowalbum"><i class="fa fa-sign-out"></i> Album</a></li>
                <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowvideo"><i class="fa fa-sign-out"></i> Video</a></li>
            </ul>
        </li>

        <li><a href="<?php echo base_url(); ?>loginsopwpg/logout"><i class="glyphicon glyphicon-off"></i> <span>Logout</span></a></li>

    </ul>
</section>