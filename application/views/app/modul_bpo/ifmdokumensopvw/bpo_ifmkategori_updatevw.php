<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Edit Data Kategori</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_bpo/ifmdokumensopcs/bpo_ifmkategorics/ifupdaterecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='idkode' value='$row[kat_kode]'>
                        <tr><th width='130px' scope='row'>Kode Kategori</th><td><input type='text' id='txtkode' maxlength='30' class='form-control' name='txtkode' onkeyup='this.value = this.value.toUpperCase()' value='$row[kat_kode]' readonly required></td></tr>
                        <tr><th scope='row'>Nama Kategori (IDN)</th><td><textarea id='txtnama' class='form-control' name='txtnama' autofocus>$row[kat_nama]</textarea></td></tr>
                        <tr><th scope='row'>Nama Kategori (ENG)</th><td><textarea id='txtnama2' class='form-control' name='txtnama2' autofocus>$row[kat_nama2]</textarea></td></tr>
                    </tbody>
                </table>
            </div>
          </div>

          <div class='box-footer'>
              <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Update Data'><i class='glyphicon glyphicon-floppy-disk'></i> Update</button>
              <a href='".base_url().$this->uri->segment(1)."/ifmdokumensopcs/bpo_ifmkategorics/ifshowbpokategori'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='fa fa-sign-out'></i>Tutup</button></a>
          </div>
        </div></form>";
?>

<script type="text/javascript">
	function ifcekemptytext() {
		if(!$("#txtnama").val()) {
			 alert('Mohon mengisi nama kategori (IDN)');
			 $("#txtnama").focus()
			 return false;
		}
	}
</script>