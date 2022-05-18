<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Insert Data Jabatan</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_tbl/ifmjabatancs/tbl_ifmjabatancs/ifinsertrecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='id' value=''>
                        <tr><th width='130px' scope='row'>Kode Jabatan</th><td><input type='text' id='txtkode' maxlength='3' class='form-control' name='txtkode' onkeyup='this.value = this.value.toUpperCase()' autofocus></td></tr> 
                        <tr><th scope='row'>Nama Jabatan (IDN)</th><td><textarea id='txtnama' class='form-control' name='txtnama'></textarea></td></tr>
                        <tr><th scope='row'>Nama Jabatan (ENG)</th><td><textarea id='txtnama2' class='form-control' name='txtnama2'></textarea></td></tr>
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
              <!-- <button type='submit' name='submit' class='btn btn-primary' onclick='validate(this)' data-toggle='tooltip' data-placement='bottom' title='Simpan Data'><i class='glyphicon glyphicon-floppy-disk'></i> Simpan</button> -->
              <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Simpan Data'><i class='glyphicon glyphicon-floppy-disk'></i> Simpan</button>
              <button type='button' onclick='ifkosongkantext()' name='reset' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Batal'><i class='fa fa-reply'></i> Batal</button>
              <a href='".base_url().$this->uri->segment(1)."/ifmjabatancs/tbl_ifmjabatancs/ifshowtbljabatan'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='glyphicon glyphicon-log-out'></i> Tutup</button></a>
          </div>
        </div></form>";
?>

<script>
  function ifkosongkantext() {
    // alert('.txtkode');
    document.getElementById('txtkode').value='';
    document.getElementById('txtnama').value='';
    document.getElementById('txtnama2').value='';
    document.getElementById('txtkode').focus(); 
  }
</script>

<script type="text/javascript">
	function ifcekemptytext() {
		  if (!$("#txtkode").val()) {
			    alert('Mohon mengisi kode jabatan');
			    $("#txtkode").focus()
			    return false;
		  }

		  if (!$("#txtnama").val()) {
			    alert('Mohon mengisi nama jabatan (Indonesia)');
			    $("#txtnama").focus()
			    return false;
		  }
	}
</script>
