<div class="col-xs-14">
    <div class="box box-warning box-solid" style='margin: -20px 5px 5px 0px;'>
        <div class="box-header">
          <h3 class="box-title"><span class='glyphicon glyphicon-share'></span>Data Kategori Dokumen</h3>
        </div>  

        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div style="padding-bottom: 10px;"'>
                        <!-- class='pull-left' style='width:50px; margin-right:10px; border:1px solid #e3e3e3' -->
                        <!-- button kode : btn-primary, btn-danger, btn-warning, btn-success, btn-info, btn-default -->
                        <?php echo anchor(site_url('modul_bpo/ifmdokumensopcs/bpo_ifmkategorics/ifinsertrecord'), '<i class="glyphicon glyphicon-plus-sign" aria-hidden="true"></i> Insert Data', 'class="btn btn-primary btn-md" data-toggle="tooltip" title="Insert Data"'); ?>
                    </div> 

                    <div class="card-body">
                      <!-- <div class="table-responsive"> -->
                        <table id="example1" class="table table-sm table-borderless display nowrap" cellspacing="0" style="width:100%">
                            <thead class="bg-success">
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 10%">Kode Kategori</th>
                                    <th style="width: 25%">Nama Kategori Dokumen (IDN)</th>
                                    <th style="width: 25%">Nama Kategori Dokumen (ENG)</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($ardatatemp as $row) {
                                        echo '<tr>
                                                <td>'.$no.'</td>
                                                <td>'.$row['kat_kode'].'</td>
                                                <td>'.$row['kat_nama'].'</td>
                                                <td>'.$row['kat_nama2'].'</td>
                                                <td><center>
                                                    <a class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit Data" href="'.site_url('modul_bpo/ifmdokumensopcs/bpo_ifmkategorics/ifupdaterecord/'.$row['kat_kode']).'"><span class="glyphicon glyphicon-edit"></span></a>
                                                    <a class="btn btn-danger btn-xs" data-toggle="tooltip" title="Hapus Data" href="'.site_url('modul_bpo/ifmdokumensopcs/bpo_ifmkategorics/ifdeleterecord/'.$row['kat_kode']).'" msgbox-confirm="Anda yakin akan menghapus data dengan kode : '.$row['kat_kode'].'?"><span class="glyphicon glyphicon-trash"></span></a>
                                                </center></td>
                                              </tr>';
                                              $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                      <!-- </div>   -->
                    </div>
                </div>
            </div>
        </div>      
    </div>  
</div>

<!-- Form Modal Dialog Messagebox Untuk Konfirmasi Hapus Data -->
<?php
    foreach ($ardatatemp as $row) {
        $id=$row['kat_kode'];
        $nm=$row['kat_nama'];
        $nm=$row['kat_nama2'];
    ?>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title" id="myModalLabel"><p><strong>Konfirmasi...</strong></h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'modul_bpo/ifmdokumensopcs/bpo_ifmkategorics/ifdeleterecord'?>">
                    
                    <div class="modal-body">
                        <p>Yakin akan menghapus data ini?</p>
                        <input name="kode" type="hidden" value="<?php echo $id; ?>">
                    </div>
                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger btn-ok">Ya</button>
                    </div>

                </div>
        </div>
    </div>
<?php
}
?>
<!-- End Script -->
