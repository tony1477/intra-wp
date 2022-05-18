<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Edit Data Group Divisi</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_tbl/ifmdivisigroupcs/tbl_ifmdivisigroupcs/ifupdaterecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='idkode' value='$row[gdiv_kode]'>
                        <tr><th width='130px' scope='row'>Kode Group Divisi</th><td><input type='text' id='txtkode' maxlength='3' class='form-control' name='txtkode' onkeyup='this.value = this.value.toUpperCase()' value='$row[gdiv_kode]' readonly required></td></tr>
                        <tr><th scope='row'>Nama Group Divisi (IDN)</th><td><textarea id='txtnama' class='form-control' name='txtnama' autofocus>$row[gdiv_nama]</textarea></td></tr>
                        <tr><th scope='row'>Nama Group Divisi (ENG)</th><td><textarea id='txtnama2' class='form-control' name='txtnama2' autofocus>$row[gdiv_nama2]</textarea></td></tr>
                    </tbody>
                </table>
            </div>
          </div>

          <div class='box-footer'>
              <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Update Data'><i class='glyphicon glyphicon-floppy-disk'></i> Update</button>
              <a href='".base_url().$this->uri->segment(1)."/ifmdivisigroupcs/tbl_ifmdivisigroupcs/ifshowtbldivisigroup'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='fa fa-sign-out'></i>Tutup</button></a>              
          </div>
        </div></form>";
?>

<script type="text/javascript">
	function ifcekemptytext() {
		if(!$("#txtnama").val()) {
			 alert('Mohon mengisi nama group divisi (IDN)');
			 $("#txtnama").focus()
			 return false;
		}
	}
</script>