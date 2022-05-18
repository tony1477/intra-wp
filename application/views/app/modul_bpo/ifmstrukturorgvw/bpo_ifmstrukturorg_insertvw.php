<link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/plugins/select2/select2.min.css">

<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Insert Data Struktur Organisasi</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifinsertrecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='id' value=''>
                        <tr><th scope='row'>Kode Struktur Organisasi</th><td><input type='text' id='txtkode' style='width: 300px;' maxlength='30' class='form-control' name='txtkode' onkeyup='this.value = this.value.toUpperCase()' autofocus></td></tr>
                        <tr><th scope='row'>Nama Struktur Organisasi (IDN)</th><td><textarea id='txtnama' class='form-control' name='txtnama'></textarea></td></tr>
                        <tr><th scope='row'>Nama Struktur Organisasi (ENG)</th><td><textarea id='txtnama2' class='form-control' name='txtnama2'></textarea></td></tr>

                        <tr><th scope='row'>Departemen</th><td><select id='cmbgroup' class='js-example-basic-single form-control' name='cmbgroup' style='height: 32px; width: 500px;' required>
                        <option value=0 selected>- Pilih Departemen -</option>";
                        foreach ($ardatatemp as $rows) {
                          echo "<option value='$rows[dep_kode]'>$rows[dep_nama]</option>";
                        }
                        echo "</select></td></tr>

                        <tr><th scope='row'>Cari File Struktur Organisasi</th><td><input type='file' id='dokfilesop' width='120px' class='form-control' name='txtfile'></td></tr>
                        <tr><th scope='row'>Cover Struktur Organisasi (Image)</th><td><input type='file' id='coversop' width='120px' class='form-control' name='txtcoversop'></td></tr>

                        <tr><th scope='row'>Publish Struktur Organisasi</th><td><input type='radio' id='optpublish' name='optpublish' value='Y' checked> Ya &nbsp; <input type='radio' name='optpublish' value='N'> Tidak</td></tr>
                        <tr><th scope='row'>Status Struktur Organisasi</th><td><input type='radio' id='optstatus' name='optstatus' value='Y' checked> Aktif &nbsp; <input type='radio' name='optstatus' value='N'> Tidak</td></tr>
                        <tr><th scope='row'>Cover Pembukaan Awal</th><td><input type='radio' id='optdefault' name='optdefault' value='Y'> Ya &nbsp; <input type='radio' name='optdefault' value='N' checked> Tidak</td></tr>

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
              <a href='".base_url().$this->uri->segment(1)."/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifshowstrukturorg'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='glyphicon glyphicon-log-out'></i> Tutup</button></a>
          </div>
        </div></form>";

        echo form_close();
?>

<script>
  function ifkosongkantext() {
    // alert('.txtkdprovinsi');
    document.getElementById('txtkode').value='';
    document.getElementById('txtnama').value='';
    document.getElementById('txtnama2').value='';
    document.getElementById('txtkode').focus(); 
  }
</script>

<script type="text/javascript">
	function ifcekemptytext() {
    var lcGroup = document.getElementById('cmbgroup').selectedIndex;

    if (!$("#txtkode").val()) {
			  alert('Mohon mengisi kode struktur organisasi');
			  $("#txtkode").focus()
			  return false;
		}

		if (!$("#txtnama").val()) {
			  alert('Mohon mengisi nama struktur organisasi (IND)');
			  $("#txtnama").focus()
			  return false;
		}

    if (lcGroup < 1) {
      alert('Mohon mmemilih nama departemen');
      document.getElementById('cmbgroup').focus();
      return false;
    }

	}
</script>