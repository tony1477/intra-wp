<!DOCTYPE html>
<html>
    <head>
        <!-- Untuk Judul Disini -->  
    </head>
    <body>

        <div class="col-xs-14">

            <!-- style='margin: top right bottom left' -->
            <div class="box box-warning box-solid" style='margin: -20px 5px 5px 0px;'>

                <div class="box-header">
                    <!-- <h3 class="box-title"><span class='glyphicon glyphicon-share'></span> Data Divisi</h3> -->
                    <!-- Mengambil kode user yang di aktifkan --->
                    <h3 class="box-title">Hak Akses Dokumen User :  <b><?php echo ucwords($arrusertemp['user_nama']) ?></b></h3>
                    <a href="<?php echo site_url('modul_tbl/ifmusercs/tbl_ifmusercs/ifshowtbluser') ?>"><button type='button' class="btn btn-success pull-right" data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class="fa fa-sign-out"></i> Kembali</button></a></td></tr>
                </div>
                
                <div class="box-body">
                    <div class='row'>
                        <div class='col-xs-12'>

                            <!-- <?php echo alertbox('alert-info', 'Informasi', 'Silahkan Cheklist Pada Modul Dokumen Yang Akan Diberikan Hak Akses') ?> -->                    
                            <form method="post" action="<?php echo base_url(); ?>modul_tbl/ifmusercs/tbl_ifmusercs/ifbukahaksesmodul">    

                                <div style="padding-bottom: 10px;"'>
                                    <input type='hidden' name='myidkode' value=<?php echo $arrusertemp['user_kode'] ?>>
                                    <input type='hidden' id='myiddept' name='myiddept' value=<?php echo $arrusertemp['dep_kode'] ?>>

                                    <!-- class='pull-left' style='width:50px; margin-right:10px; border:1px solid #e3e3e3' -->
                                    <!-- button kode : btn-primary, btn-danger, btn-warning, btn-success, btn-info, btn-default -->
                                    <!-- <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Update Akses Modul Dokumen'><i class='glyphicon glyphicon-floppy-disk'></i> Update</button> -->
                                    <!-- <tr><th scope='row'></th><td><input type='checkbox' id='mstcheckbox' name='mstcheckbox'><strong>  Pilih Semua Modul </strong><br><div class='checkbox-scroll'>  -->
                                    <!-- <a href="<?php echo site_url('modul_tbl/ifmusercs/tbl_ifmusercs/ifshowtbluser') ?>"><button type='button' class="btn btn-primary pull-right" data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class="fa fa-sign-out"></i> Kembali</button></a></td></tr> -->
                                    <!-- &nbsp; -->
                                </div>
                                
                                <!-- <table class="table table-bordered table-striped" id="mytable"> -->
                                <table id="example1" class="table table-bordered table-striped table-condensed cellspacing="0" width="100%">
                                    <thead class="bg-success">
                                        <tr>
                                            <th width="100px" class='text-center sorting_disabled' rowspan='1' colspan='1'>Pilih Akses</th>
                                            <th width="30px">No</th>
                                            <th style="width:200px">Kode Modul</th>
                                            <th>Nama Modul</th>
                                            <th>Departemen</th>                                
                                        </tr>
                            
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach ($armodultemp as $mdl) {
                                                    
                                                    echo "<tr>
                                                            <input type='hidden' name='id_modulkey[]' value='$mdl->dok_nosop'>
                                                            <td align='center'><input name='id_moduldok[]' type='checkbox' value='$mdl->dok_nosop' ".ifchecked_haksesmodul(rawurldecode($this->uri->segment(5)), rawurldecode($mdl->dok_nosop))."></td>
                                                            <!-- <td align='center'><input id='id_moduldok[]' name='id_moduldok[]' type='checkbox' class='chkbox' value='$mdl->dok_nosop' onClick='ifmodul_akses(rawurldecode($mdl->dok_nosop))' ".ifchecked_haksesmodul(rawurldecode($this->uri->segment(5)), rawurldecode($mdl->dok_nosop))."></td> -->
                                                            <td>$no</td>
                                                            <td>$mdl->dok_nosop</td>
                                                            <td>$mdl->dok_nmsop</td>
                                                            <td>$mdl->dep_nama</td>
                                                        </tr>";
                                                        $no++;
                                                }
                                            ?>
                                        </tbody>    
                                    </thead>
                                </table>
                            </form>    
                        </div>
                    </div>  
                </div>      
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('input[type="checkbox"]').click(function() {
                    //if($(this).prop("checked") == true) {
                        //alert("checkbox aktif");

                    //}else if($(this).prop("checked") == false) {
                        //alert("checkbox non aktif");

                        var idnosop = this.value;
                        var iduser = '<?php echo $this->uri->segment(5); ?>';
                        var iddept = document.getElementById('myiddept').value;
                        //var idsession = document.getElementById('myidkode').value.'-'.date('YmdHis');
                        //var idsession = document.getElementById('myidkode').value;
                        //alert(idnosop);
                        //alert(iduser);

                        $.ajax({
                            //type: "POST",
                            //context: "application/json",
                            url:"<?php echo base_url()?>index.php/modul_tbl/ifmusercs/tbl_ifmusercs/ifhaksesmodulajax",
                            //data:"idnosop=" + idnosop + "&iduser="+ iduser,
                            data:"idnosop=" + idnosop + "&iduser="+ iduser + "&iddept="+ iddept,
                            success: function(html) {
                                //load();
                                //alert('sukses');
                            }
                        });
                    //}
                });
            });
        </script>

        <script>
            $("#mstcheckbox").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);

                var idnosop = this.value;
                var iduser = '<?php echo $this->uri->segment(5); ?>';

                $.ajax({
                    url:"<?php echo base_url()?>index.php/modul_tbl/ifmusercs/tbl_ifmusercs/ifhaksesmodulajax",
                    data:"idnosop=" + idnosop + "&iduser="+ iduser,
                    success: function(html) {
                    }
                });
                 
            });
        </script>

        <!-- <script type="text/javascript"> -->
        <script>    
            function ifmodul_akses(idnosop) {
                //alert(dok_nosop);
                var idnosop = idnosop;
                var iduser = '<?php echo $this->uri->segment(5); ?>';
                
                //alert(iduser);
                alert('testing lah');

                $.ajax({
                    //type: "POST",
                    //context: "application/json",
                    url: "<?php echo site_url('modul_tbl/ifmusercs/tbl_ifmusercs/ifhaksesmodulajax')?>",
                    data:"idnosop=" + idnosop + "&iduser="+ iduser ,
                    success: function(html) { 
                        //load();
                        //alert('sukses');
                    }
                });
            }    
        </script>

    </body>
</html>