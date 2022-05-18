<?php if ($this->session->user_level == 'admin'){ ?> 

<?php } ?>

    <div style='clear:both'></div>

        <div class='col-md-20'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Struktur Organisasi Perusahaan</h3>
                </div>
                <div class='box-body'>
                    <a href="<?php echo base_url(); ?>app/satuan" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> Management</a>
                    <a href="<?php echo base_url(); ?>app/rak" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> IA & CC</a>
                    <a href="<?php echo base_url(); ?>app/kategori" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> HRGA</a>
                    <a href="<?php echo base_url(); ?>app/subkategori" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> Finance & Accounting</a>
                    <a href="<?php echo base_url(); ?>app/kategori_pelanggan" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> Legal Compliance</a>
                    <a href="<?php echo base_url(); ?>app/agen_ekspedisi" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> Commercial</a>
                    <a href="<?php echo base_url(); ?>app/sebab_alasan" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> IT</a>
                    <a href="<?php echo base_url(); ?>app/negara" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> Quality Control</a>
                    <a href="<?php echo base_url(); ?>app/provinsi" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> Mill</a>
                    <a href="<?php echo base_url(); ?>app/kota" class='btn btn-app'><i class='glyphicon glyphicon-king'></i> Estate</a>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-sm-12">
            
            <!-- <a href="<?php echo base_url(); ?>modul_bpo/ifmstrukturorgcs/bpo_ifshowstrukturorgcs/ifshowviewstrukturorgdefault"><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='glyphicon glyphicon-log-out'></i> Tutup</button></a> -->

            <table class="table table-bordered">
                <tr>
                    <th width="100px">Kode Struktur Organisasi</th>
                    <th width="30px">:</th>
                    <th><?= $rows['stg_kode'] ?></th>
                </tr>
                <tr>
                    <th>Struktur Organisasi</th>
                    <th>:</th>
                    <th><?= $rows['stg_nama'] ?></th>
                </tr>
            </table>

        </div>
        

        <div class="col-sm-12">

            <!-- <iframe src="<?= base_url('datasop/file/'.$rows['stg_nmfile']) ?>#toolbar=0" frameborder="0"  style="border: none; height: 800px; width: 100%;"></iframe> -->
            <embed src="<?= base_url('datasop/file/'.$rows['stg_nmfile'])?>#navpanes=0&scrollbar=0" scrolling="no" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen allowtransparency="true" style="border: none; height: 600px; width: 100%; overflow: hidden;" type="application/pdf"></embed> 

        </div>

    </div>    
