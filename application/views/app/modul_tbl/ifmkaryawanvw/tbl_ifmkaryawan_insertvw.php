<link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/plugins/select2/select2.min.css">

<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Insert Data SOP</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_tbl/ifmkaryawancs/tbl_ifmkaryawancs/ifinsertrecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='id' value=''>
                        <tr><th scope='row'>Nomor Induk</th><td><input type='text' id='txtkode' width='130px' maxlength='30' class='form-control' name='txtkode' autofocus></td></tr>
                        <tr><th scope='row'>Nama Karyawan</th><td><input type='text' id='txtnama' class='form-control' name='txtnama'></td></tr>

                        <tr><th scope='row'>Jabatan</th><td><select id='cmbjabatan' class='js-example-basic-single form-control' name='cmbjabatan' style='height: 32px; width: 250px;' required>
                        <option value=0 selected>- Pilih Jabatan -</option>";
                        foreach ($arjabatan as $rows) {
                          echo "<option value='$rows[jab_kode]'>$rows[jab_nama]</option>";
                        }
                        echo "</select></td></tr>

                        <tr><th scope='row'>Nama User</th><td><select id='cmbuser' class='js-example-basic-single form-control' name='cmbuser' style='height: 32px; width: 250px;' required>
                        <option value=0 selected>- Pilih User -</option>";
                        foreach ($aruser as $rows) {
                          echo "<option value='$rows[user_kode]'>$rows[user_nama]</option>";
                        }
                        echo "</select></td></tr>

                        <tr><th scope='row'>Status Karyawan</th><td><input type='radio' id='optstatus' name='optstatus' value='Aktif' checked> Aktif &nbsp; <input type='radio' name='optstatus' value='Non Aktif'> Non Aktif</td></tr>
                        <tr><th scope='row'>Fhoto Karyawan</th><td><input type='file' id='txtgambar' width='120px' class='form-control' name='txtgambar'></td></tr>
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
              <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Simpan Data'><i class='glyphicon glyphicon-floppy-disk'></i> Simpan</button>
              <button type='button' onclick='ifkosongkantext()' name='reset' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Batal'><i class='fa fa-reply'></i> Batal</button>
              <a href='".base_url().$this->uri->segment(1)."/ifmkaryawancs/tbl_ifmkaryawancs/ifshowtblkaryawan'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='glyphicon glyphicon-log-out'></i> Tutup</button></a>
          </div>
        </div></form>";

        echo form_close();
?>

<script>
  function ifkosongkantext() {
    // alert('.txtkdprovinsi');
    document.getElementById('txtkode').value='';
    document.getElementById('txtnama').value='';
    document.getElementById('txtkode').focus(); 
  }
</script>

<script type="text/javascript">
	function ifcekemptytext() {
    var lcJabatan = document.getElementById('cmbjabatan').selectedIndex;
    var lcUser = document.getElementById('cmbuser').selectedIndex;

    if (!$("#txtkode").val()) {
			  alert('Mohon mengisi nomor induk karyawan');
			  $("#txtkode").focus()
			  return false;
		}

		if (!$("#txtnama").val()) {
			  alert('Mohon mengisi nama karyawan');
			  $("#txtnama").focus()
			  return false;
		}

    if (lcJabatan < 1) {
      alert('Mohon mmemilih nama jabatan karyawan');
      document.getElementById('cmbjabatan').focus();
      return false;
    }

    if (lcUser < 1) {
      alert('Mohon mmemilih nama user karyawan');
      document.getElementById('cmbuser').focus();
      return false;
    }

	}
</script>