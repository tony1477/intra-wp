<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Edit Data Jabatan</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_tbl/ifmjabatancs/tbl_ifmjabatancs/ifupdaterecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='idkode' value='$row[jab_kode]'>
                        <tr><th width='130px' scope='row'>Kode Jabatan</th><td><input type='text' id='txtkode' maxlength='3' class='form-control' name='txtkode' onkeyup='this.value = this.value.toUpperCase()' value='$row[jab_kode]' readonly required></td></tr>
                        <tr><th scope='row'>Nama Jabatan (IDN)</th><td><textarea id='txtnama' class='form-control' name='txtnama' autofocus>$row[jab_nama]</textarea></td></tr>
                        <tr><th scope='row'>Nama Jabatan (ENG)</th><td><textarea id='txtnama2' class='form-control' name='txtnama2' autofocus>$row[jab_nama2]</textarea></td></tr>
                    </tbody>
                </table>
            </div>
          </div>

          <div class='box-footer'>
              <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Update Data'><i class='glyphicon glyphicon-floppy-disk'></i> Update</button>
              <a href='".base_url().$this->uri->segment(1)."/ifmjabatancs/tbl_ifmjabatancs/ifshowtbljabatan'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='fa fa-sign-out'></i>Tutup</button></a>
          </div>
        </div></form>";
?>

<script type="text/javascript">
	function ifcekemptytext() {
		if(!$("#txtnama").val()) {
			 alert('Mohon mengisi nama jabatan (IDN)');
			 $("#txtnama").focus()
			 return false;
		}
	}
</script>