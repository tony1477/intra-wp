<div class="col-xs-14">
    <div class="box box-warning box-solid" style='margin: -20px 5px 5px 0px;'>
        <div class="box-header">
          <h3 class="box-title"><span class='glyphicon glyphicon-share'></span>Show Dokumen SOP</h3>
        </div>  

        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div style="padding-bottom: 10px;"'>
                        <!-- <table id="example1" class="table table-bordered table-striped table-condensed" > -->
                        <!-- <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%"> -->
                        <table id="example1" class="table table-sm table-borderless display nowrap" cellspacing="0" style="width:100%">
                            <thead class="bg-success">
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 10%">Nomor SOP</th>
                                    <th style="width: 18%">Nama Dokumen SOP (IDN)</th>
                                    <th style="width: 15%">Nama Dokumen SOP (ENG)</th>
                                    <th style="width: 10%">Nama Departemen</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach ($ardatatemp as $row) {
                                        $lckode = $row['dok_nosop'];

                                        echo '<tr>
                                            <td>'.$no.'</td>
                                            <td>'.$row['dok_nosop'].'</td>
                                            <td>'.$row['dok_nmsop'].'</td>
                                            <td>'.$row['dok_nmsop2'].'</td>
                                            <td>'.$row['dep_nama'].'</td>
                                            <td><center>
                                                <a class="btn btn-success btn-xs" data-toggle="tooltip" title="Open Data" href="'.site_url('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/viewpdf/'.$row['dok_nosop']).'"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                <a class="btn btn-success btn-xs" data-toggle="tooltip" title="Download Data" href="'.site_url('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdownloadfile/'.$row['dok_nmfile2']).'"><span class="glyphicon glyphicon-cloud-download"></span></a>
                                                <!-- <a class="btn btn-success btn-xs" data-toggle="tooltip" title="Download Data" href="'.site_url('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdownloadfile2/'.$row['dok_nmfile3']).'"><span class="glyphicon glyphicon-download-alt"></span></a> -->
                                                <!-- <a class="btn btn-success btn-xs" data-toggle="tooltip" title="Download Data" href="'.site_url('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdownloadfile3/'.$row['dok_nmfile4']).'"><span class="glyphicon glyphicon-download"></span></a> -->
                                            </center></td>
                                            </tr>';
                                            $no++;                                  
                                    }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        
        </div>

    </div>  
</div>

<!-- End Script -->