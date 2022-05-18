<link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/plugins/select2/select2.min.css">

<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Insert Data Dokumen</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifinsertrecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='id' value=''>
                        <tr><th scope='row'>Nomor Dokumen</th><td><input type='text' id='txtnosop' width='130px' maxlength='30' class='form-control' name='txtnosop' onkeyup='this.value = this.value.toUpperCase()' autofocus></td></tr>
                        <tr><th scope='row'>Nama Dokumen (IDN)</th><td><textarea id='txtnama' class='form-control' name='txtnama'></textarea></td></tr>
                        <tr><th scope='row'>Nama Dokumen (ENG)</th><td><textarea id='txtnama2' class='form-control' name='txtnama2'></textarea></td></tr>

                        <tr><th scope='row'>Departemen</th><td><select id='cmbgroup' class='js-example-basic-single form-control' name='cmbgroup' style='height: 32px; width: 500px;' required>
                        <option value=0 selected>- Pilih Departemen -</option>";
                        foreach ($ardatatemp as $rows) {
                          echo "<option value='$rows[dep_kode]'>$rows[dep_nama]</option>";
                        }
                        echo "</select></td></tr>

                        <!-- <tr><th scope='row'>Kategori Dokumen</th><td><select name='cmbkategori' class='form-control'><option>Kebijakan</option><option>Manual</option><option>SOP</option><option>Instruksi Kerja</option><option>IK</option></select></td></tr> -->
                        <tr><th scope='row'>Kategori Dokumen</th><td><select id='cmbkategori' class='js-example-basic-single form-control' name='cmbkategori' style='height: 32px; width: 500px;' required>
                        <option value=0 selected>- Pilih Kategori -</option>";
                        foreach ($arkategori as $rows) {
                          echo "<option value='$rows[kat_kode]'>$rows[kat_nama]</option>";
                        }
                        echo "</select></td></tr>

                        <tr><th scope='row'>Cari File SOP</th><td><input type='file' id='dokfilesop' width='120px' class='form-control' name='txtfile'></td></tr>
                        <tr><th scope='row'>Cari File Form</th><td><input type='file' id='dokfileform' width='120px' class='form-control' name='txtfile2'></td></tr>
                        <tr><th scope='row'>Cari File Form-2</th><td><input type='file' id='dokfileform2' width='120px' class='form-control' name='txtfile3'></td></tr>
                        <tr><th scope='row'>Cari File Form-3</th><td><input type='file' id='dokfileform3' width='120px' class='form-control' name='txtfile4'></td></tr>
                        <tr><th scope='row'>Cover (Image)</th><td><input type='file' id='coversop' width='120px' class='form-control' name='txtcoversop'></td></tr>

                        <tr><th scope='row'>Publish Dokumen</th><td><input type='radio' id='optpublish' name='optpublish' value='Y' checked> Ya &nbsp; <input type='radio' name='optpublish' value='N'> Tidak</td></tr>
                        <tr><th scope='row'>Status Dokumen</th><td><input type='radio' id='optstatus' name='optstatus' value='Y' checked> Aktif &nbsp; <input type='radio' name='optstatus' value='N'> Tidak</td></tr>

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
              <a href='".base_url().$this->uri->segment(1)."/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='glyphicon glyphicon-log-out'></i> Tutup</button></a>
          </div>
        </div></form>";

        echo form_close();
?>

<script>
  function ifkosongkantext() {
    // alert('.txtkdprovinsi');
    document.getElementById('txtnosp').value='';
    document.getElementById('txtnama').value='';
    document.getElementById('txtnama2').value='';
    document.getElementById('txtnosop').focus(); 
  }
</script>

<script type="text/javascript">
	function ifcekemptytext() {
    var lcGroup = document.getElementById('cmbgroup').selectedIndex;

    if (!$("#txtnosop").val()) {
			  alert('Mohon mengisi nomor dokumen sop');
			  $("#txtnosop").focus()
			  return false;
		}

		if (!$("#txtnama").val()) {
			  alert('Mohon mengisi nama dokumen sop (IND)');
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