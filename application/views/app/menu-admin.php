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
        <li><a href="<?php echo base_url(); ?>app/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <!-- Tabel Menu -->
        <li class="treeview">
            <!-- <a href="#"><i class=" "></i> <span>Tabel</span><i class=""></i><img src='ifassetadm/imgmenu/home.png' width='20' height='20'></span></a> -->
            <a href="#"><i class="fa fa-archive"></i> <span>Tabel</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">              
                <li><a href="<?php echo base_url(); ?>modul_tbl/ifmdivisigroupcs/tbl_ifmdivisigroupcs/ifshowtbldivisigroup"><i class="fa fa-sign-out"></i> Group Divisi</a></li>
                <li><a href="<?php echo base_url(); ?>modul_tbl/ifmdivisics/tbl_ifmdivisics/ifshowtbldivisi"><i class="fa fa-sign-out"></i> Data Divisi</a></li>
                <li><a href="<?php echo base_url(); ?>modul_tbl/ifmdepartemencs/tbl_ifmdepartemencs/ifshowtbldepartemen"><i class="fa fa-sign-out"></i> Departemen</a></li>
                <li><a href="<?php echo base_url(); ?>modul_tbl/ifmjabatancs/tbl_ifmjabatancs/ifshowtbljabatan"><i class="fa fa-sign-out"></i> Jabatan</a></li>
                <li><a href="<?php echo base_url(); ?>modul_tbl/ifmusergroupcs/tbl_ifmusergroupcs/ifshowtblusergroup"><i class="fa fa-sign-out"></i> Group User</a></li>
                <li><a href="<?php echo base_url(); ?>modul_tbl/ifmusercs/tbl_ifmusercs/ifshowtbluser"><i class="fa fa-sign-out"></i> Data User</a></li>
                <li><a href="<?php echo base_url(); ?>modul_tbl/ifmkaryawancs/tbl_ifmkaryawancs/ifshowtblkaryawan"><i class="fa fa-sign-out"></i> Data Karyawan</a></li>                
            </ul>
        </li>

        <li class="treeview">
            <!-- Company Profile Menu -->
            <a href="#"><i class="fa fa-archive"></i> <span>Company Profile</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- Menu Tentang (Halaman Utama) -->
                    <li><a href="<?php echo base_url(); ?>app/master"><i class="fa fa-sign-in"></i> Modul Halaman Utama <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu menu-open">
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmpemakai"><i class="fa fa-sign-out"></i> Profile Perusahaan </a></li> 
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmarea"><i class="fa fa-sign-out"></i> Visi, Misi Dan Value </a></li> 
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmsalesgroup"><i class="fa fa-sign-out"></i> Strategic </a></li>
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmlokasi"><i class="fa fa-circle-o"></i> Direksi (Struktur) </a></li>                      
                        </ul>
                    </li>

                    <!-- Menu Bisnis Kami -->
                    <li><a href="<?php echo base_url(); ?>app/master"><i class="fa fa-sign-in"></i> Modul Bisnis Kami <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu menu-open">
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmpemakai"><i class="fa fa-sign-out"></i> Perkebunan </a></li> 
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmarea"><i class="fa fa-sign-out"></i> Pabrik Kelapa Sawit </a></li> 
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmsalesgroup"><i class="fa fa-sign-out"></i> Serai Wangi </a></li>
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmlokasi"><i class="fa fa-circle-o"></i> Food & Bevorage </a></li>                      
                        </ul>
                    </li>

                    <!-- Menu Investor -->
                    <li><a href="<?php echo base_url(); ?>app/master"><i class="fa fa-sign-in"></i> Modul Investor <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu menu-open">
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmpemakai"><i class="fa fa-sign-out"></i> Input Investor </a></li> 
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmarea"><i class="fa fa-sign-out"></i> Show Investor </a></li> 
                        </ul>
                    </li>

                    <!-- Menu Sustainability -->
                    <li><a href="<?php echo base_url(); ?>app/master"><i class="fa fa-sign-in"></i> Modul Sustainability <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu menu-open">
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmpemakai"><i class="fa fa-sign-out"></i> Policy </a></li> 
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmarea"><i class="fa fa-sign-out"></i> Certification </a></li> 
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmsalesgroup"><i class="fa fa-sign-out"></i> Environment </a></li>
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmlokasi"><i class="fa fa-circle-o"></i> Communtity Development </a></li>                      
                        </ul>
                    </li>

                    <!-- Menu Informasi -->
                    <li><a href="<?php echo base_url(); ?>app/master"><i class="fa fa-sign-in"></i> Modul Informasi <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu menu-open">
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmpemakai"><i class="fa fa-sign-out"></i> Carir </a></li> 
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmarea"><i class="fa fa-sign-out"></i> Lowongan Kerja </a></li> 
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmsalesgroup"><i class="fa fa-sign-out"></i> Galery Foto </a></li>
                            <li><a href="<?php echo base_url(); ?>inventorycnt/ifshowtblmlokasi"><i class="fa fa-circle-o"></i> Galery Video </a></li>                      
                        </ul>
                    </li>
                </ul>
            </li>
        </li>

        <!-- Meeting Room Menu -->
        <li class="treeview">
            <a href="#"><i class="fa fa-money"></i> <span>Meeting Room</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>app/ifmjeniskontrak"><i class="fa fa-circle-o"></i> Data Ruangan</a></li>
                    <li><a href="<?php echo base_url(); ?>app/ifmbank"><i class="fa fa-circle-o"></i> Jadwal Meeting</a></li>
                </ul>
            </li>
        </li>
        
        <!-- SOP Menu -->
        <li class="treeview">
            <a href="#"><i class="fa fa-money"></i> <span>Best Practice Operational</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>modul_bpo/ifmvisimisics/bpo_ifmvisimisics/ifinsupdrecord"><i class="glyphicon glyphicon-home"></i> Input Visi & Misi</a></li>
                    <li><a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifshowstrukturorg"><i class="glyphicon glyphicon-equalizer"></i> Input Struktur Organisasi</a></li>
                    <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmkategorics/ifshowbpokategori"><i class="glyphicon glyphicon-th"></i> Input Kategori</a></li>
                    <li><a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop"><i class="fa fa-circle-o"></i> Input Dokumen</a></li>
                </ul>
            </li>
        </li>

        <li><a href="<?php echo base_url(); ?>loginwpg/logout"><i class="glyphicon glyphicon-off"></i> <span>Logout</span></a></li>

    </ul>
</section>