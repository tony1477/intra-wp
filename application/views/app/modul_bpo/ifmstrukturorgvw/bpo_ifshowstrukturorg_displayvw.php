<div class="row">
    <div class='col-md-12'>
        <!-- <div class='box'> -->
        <div class="box box-warning box-solid" style='margin: -20px 5px 5px 0px;'>    
            <div class='box-header'>
                <h3 class='box-title'>Struktur Organisasi Perusahaan</h3>
            </div>
            <div class='box-body'>
                <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorgdefault" class='btn btn-primary btn-app' data-toggle='tooltip' title='Struktur Organisasi Group Management'><i class='glyphicon glyphicon-king'></i> Struktur Group</a>
                <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmgm" class='btn btn-primary btn-app'><i class='glyphicon glyphicon-king'></i> Management</a>
                <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorgiacc" class='btn btn-primary btn-app'><i class='glyphicon glyphicon-king'></i> IA & CC</a>
                <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorghrga" class='btn btn-primary btn-app'><i class='glyphicon glyphicon-king'></i> HRGA</a>
                <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorgfinacc" class='btn btn-primary btn-app'><i class='glyphicon glyphicon-king'></i> Finance & Accounting</a>
                <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorglegal" class='btn btn-primary btn-app'><i class='glyphicon glyphicon-king'></i> Legal Compliance</a>
                <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorgcomercial" class='btn btn-primary btn-app'><i class='glyphicon glyphicon-king'></i> Commercial</a>
                <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorgit" class='btn btn-primary btn-app'><i class='glyphicon glyphicon-king'></i> IT</a>
                <!-- <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorgqc" class='btn btn-primary btn-app'><i class='glyphicon glyphicon-king'></i> Quality Control</a> -->
                <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorgmill" class='btn btn-primary btn-app'><i class='glyphicon glyphicon-king'></i> Mill</a>
                <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/Bpo_ifshowstrukturorgcs/ifshowviewstrukturorgestate" class='btn btn-primary btn-app'><i class='glyphicon glyphicon-king'></i> Estate</a>
            </div>
        </div>
    </div>


    <div class="col-sm-12">
        
        <!-- <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgdefault"><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='glyphicon glyphicon-log-out'></i> Tutup</button></a> -->

        <table class="table table-bordered">
            <tr>
                <th width="200px">Kode Struktur Organisasi</th>
                <th width="30px">:</th>
                <th><?= $rows['stg_kode'] ?></th>
            </tr>
            <tr>
                <th>Nama Struktur Organisasi</th>
                <th>:</th>
                <th><?= $rows['stg_nama'] ?></th>
            </tr>
        </table>

    </div>  

    <div class="col-sm-12">

        <!-- <iframe src="<?= base_url('datastruktur/file/'.$rows['stg_nmfile']) ?>#toolbar=0" frameborder="0"  style="border: none; height: 800px; width: 100%;"></iframe> -->
        <embed src="<?= base_url('datastruktur/file/'.$rows['stg_nmfile'])?>#toolbar=0&navpanes=0&scrollbar=0" scrolling="no" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen allowtransparency="true" style="border: none; height: 600px; width: 100%; overflow: hidden;" type="application/pdf"></embed> 

    </div>

</div>