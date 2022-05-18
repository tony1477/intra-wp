<div class="row">
    <div class="col-sm-12">
        <div style='margin: -28px 5px 5px 20px;'>
            
            <a href="<?php echo base_url(); ?>modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifdisplaybpodokumensopho03"><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='glyphicon glyphicon-log-out'></i> Tutup</button></a>
            
            <div style="padding-bottom: 15px;"'>
                <tr>
                    <th width="100px">Nomor SOP</th>
                    <th width="30px">:</th>
                    <td><?= $row['dok_nosop'] ?></td>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <th width="300px">Nama SOP</th>
                    <th width="30px">:</th>
                    <td><?= $row['dok_nmsop'] ?></td>
                </tr>

                <!-- <tr>
                    <th>Nama SOP</th>
                    <th>:</th>
                    <th><?= $row['dok_nmsop'] ?></th>
                </tr> -->
            </div>

        </div>
    

        <div class="col-sm-12">

            <!-- <iframe src="<?= base_url('datasop/file/'.$row['dok_nmfile']) ?>#toolbar=0" frameborder="0"  style="border: none; height: 800px; width: 100%;"></iframe> -->
            <embed src="<?= base_url('datasop/file/'.$row['dok_nmfile'])?>#toolbar=0&navpanes=0&scrollbar=0" scrolling="no" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen allowtransparency="true" style="border: none; height: 600px; width: 100%; overflow: hidden;" type="application/pdf"></embed> 

        </div>

    </div>
</div>
