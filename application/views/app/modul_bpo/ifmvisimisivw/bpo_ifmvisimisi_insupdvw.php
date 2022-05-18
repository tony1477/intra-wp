<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header with-border'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Insert / Update Data Visi & Misi</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_bpo/ifmvisimisics/bpo_ifmvisimisics/ifinsupdrecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='idkode' value='$row[vsm_kode]'>
                        <tr><th scope='row'>Nama Visi / Misi (IDN)</th><td><textarea id='editor1' class='form-control' name='editornama' style='height:260px' required>$row[vsm_judul]</textarea></td></tr>
                        <tr><th scope='row'>Nama Visi / Misi (ENG)</th><td><textarea id='editornama2' class='form-control' name='editornama2' style='height:260px' >$row[vsm_judul2]</textarea></td></tr>
                    </tbody>
                </table>
            </div>
          </div>
                            
          <style>
            .btn-primary {
              box-shadow: 1px 2px 5px #000000;
            }
          </style>  

          <div class='box-footer'>
              <button type='submit' name='submit' class='btn btn-primary center-block' data-toggle='tooltip' data-placement='bottom' title='Simpan Data'><i class='glyphicon glyphicon-floppy-disk'></i> Simpan</button>
              <!-- <a href='".base_url().$this->uri->segment(1)."/ifmvisimisics/bpo_ifmvisimisics/ifinsupdrecord'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='glyphicon glyphicon-log-out'></i> Tutup</button></a> -->
          </div>
        </div></form>";
        echo form_close();
?>

<script type="text/javascript">
	function ifcekemptytext() {
		  if (!$("#editor1").val()) {
			    alert('Mohon mengisi visi dan misi');
			    $("#editor1").focus()
			    return false;
		  }
	}
</script>
