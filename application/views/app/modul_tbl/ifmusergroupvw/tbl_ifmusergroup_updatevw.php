<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Edit Data Group User</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_tbl/ifmusergroupcs/tbl_ifmusergroupcs/ifupdaterecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' id='idkode' name='idkode' value='$row[guser_kode]'>
                        <tr><th width='130px' scope='row'>Kode Group User</th><td><input type='text' id='txtkode' maxlength='30' class='form-control' name='txtkode' onkeyup='this.value = this.value.toUpperCase()' value='$row[guser_kode]' readonly required></td></tr>
                        <tr><th scope='row'>Nama Group User (IDN)</th><td><textarea id='txtnama' class='form-control' name='txtnama' autofocus>$row[guser_nama]</textarea></td></tr>
                        <tr><th scope='row'>Nama Group User (ENG)</th><td><textarea id='txtnama2' class='form-control' name='txtnama2' autofocus>$row[guser_nama2]</textarea></td></tr>
                    </tbody>
                </table>
            </div>
          </div>

          <div class='box-footer'>
              <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Update Data'><i class='glyphicon glyphicon-floppy-disk'></i> Update</button>
              <a href='".base_url().$this->uri->segment(1)."/ifmusergroupcs/tbl_ifmusergroupcs/ifshowtblusergroup'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='fa fa-sign-out'></i>Tutup</button></a>
          </div>
        </div></form>";
?>

<script type="text/javascript">
	function ifcekemptytext() {
		if(!$("#txtnama").val()) {
			 alert('Mohon mengisi nama group user (IDN)');
			 $("#txtnama").focus()
			 return false;
		}
	}
</script>