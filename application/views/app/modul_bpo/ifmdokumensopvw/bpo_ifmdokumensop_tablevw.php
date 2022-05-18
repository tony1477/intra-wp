<div class="col-xs-14">
    <div class="box box-warning box-solid" style='margin: -20px 5px 5px 0px;'>
        <div class="box-header">
          <h3 class="box-title"><span class='glyphicon glyphicon-share'></span>Data Dokumen SOP</h3>
        </div>  

        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div style="padding-bottom: 10px;"'>
                        <!-- class='pull-left' style='width:50px; margin-right:10px; border:1px solid #e3e3e3' -->
                        <!-- button kode : btn-primary, btn-danger, btn-warning, btn-success, btn-info, btn-default -->
                        <?php echo anchor(site_url('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifinsertrecord'), '<i class="glyphicon glyphicon-plus-sign" aria-hidden="true"></i> Insert Data', 'class="btn btn-primary btn-md" data-toggle="tooltip" title="Insert Data"'); ?>
                    </div> 

                    <div class="card-body">
                      <!-- <div class="table-responsive"> -->
                        <!-- <table id="example1" class="table table-bordered table-striped table-condensed" > -->
                        <!-- <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%"> -->
                        <table id="example1" class="table table-sm table-borderless display nowrap" cellspacing="0" style="width:100%">
                            <thead class="bg-success">
                                <tr>
                                    <th style="width: 6%">Aksi</th>

                                    <th style="width: 3%">No</th>
                                    <th style="width: 10%">Nomor SOP</th>
                                    <th style="width: 18%">Nama Dokumen SOP (IDN)</th>
                                    <th style="width: 16%">Nama Dokumen SOP (ENG)</th>
                                    <th style="width: 10%">Nama Departemen</th>
                                    <th style="width: 10%">Kategori Dokumen</th>
                                    <th style="width: 2%">Nama File Dokumen</th>
                                    <th style="width: 1%">Nama Form Dokumen</th>
                                    <th style="width: 1%">Nama Form Dokumen-2</th>
                                    <th style="width: 1%">Nama Form Dokumen-3</th>
                                    <th style="width: 1%">Cover Dokumen</th>
                                    <th style="width: 2%">Publish</th>
                                    <th style="width: 2%">Status Dokumen</th>
                                    <th style="width: 2%">Download</th>                                    
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach ($ardatatemp as $row) {
                                        $lckode = $row['dok_nosop'];

                                        echo '<tr>
                                            <td><center>
                                                <a class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit Data" href="'.site_url('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifupdaterecord/'.$row['dok_nosop']).'"><span class="glyphicon glyphicon-edit"></span></a>
                                                <a class="btn btn-danger btn-xs" data-toggle="tooltip" title="Hapus Data" href="'.site_url('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdeleterecord/'.$row['dok_nosop']).'" msgbox-confirm="Anda yakin akan menghapus data dengan kode : '.$row['dok_nosop'].'?"><span class="glyphicon glyphicon-trash"></span></a>
                                            </center></td>
                                            
                                            <td>'.$no.'</td>
                                            <td>'.$row['dok_nosop'].'</td>
                                            <td>'.$row['dok_nmsop'].'</td>
                                            <td>'.$row['dok_nmsop2'].'</td>
                                            <td>'.$row['dep_nama'].'</td>
                                            <td>'.$row['kat_nama'].'</td>
                                            <td>'.$row['dok_nmfile'].'</td>
                                            <td>'.$row['dok_nmfile2'].'</td>
                                            <td>'.$row['dok_nmfile3'].'</td>
                                            <td>'.$row['dok_nmfile4'].'</td>
                                            <td>'.$row['dok_cover'].'</td>
                                            <td>'.$row['dok_publish'].'</td>
                                            <td>'.$row['dok_aktif'].'</td>
                                            <td>'.$row['hitsdwnl'].'</td>
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
        $id=$row['dok_nosop'];
        $nm=$row['dok_nmsop'];
        ?>
            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title" id="myModalLabel"><p><strong>Konfirmasi...</strong></h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdeleterecord'?>">
                            
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
