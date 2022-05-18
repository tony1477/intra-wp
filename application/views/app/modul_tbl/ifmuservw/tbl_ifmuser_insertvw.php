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
              echo form_open_multipart('modul_tbl/ifmusercs/tbl_ifmusercs/ifinsertrecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='id' value=''>
                        <tr><th scope='row'>Kode User</th><td><input type='text' id='txtkode' width='130px' maxlength='30' class='form-control' name='txtkode' autofocus></td></tr>
                        <tr><th scope='row'>Nama User</th><td><input id='txtnama' class='form-control' name='txtnama'></td></tr>
                        <tr><th scope='row'>Password</th><td><input type='password' class='form-control' id='txtpasword' name='txtpasword' onkeyup=\"nospaces(this)\" required></td></tr>
                        
                        <tr><th scope='row'>Group User</th><td><select id='cmbgroup' class='js-example-basic-single form-control' name='cmbgroup' style='height: 32px; width: 250px;' required>
                        <option value=0 selected>- Pilih Group User -</option>";
                            foreach ($argroupuser as $rows) {
                              echo "<option value='$rows[guser_kode]'>$rows[guser_nama]</option>";
                            }
                            echo "</select></td></tr>

                        <tr><th scope='row'>Departemen</th><td><select id='cmbdepartemen' class='js-example-basic-single form-control' name='cmbdepartemen' style='height: 32px; width: 250px;' required>
                        <option value=0 selected>- Pilih Departemen -</option>";
                            foreach ($ardepartemen as $rows) {
                              echo "<option value='$rows[dep_kode]'>$rows[dep_nama]</option>";
                            }
                            echo "</select></td></tr>


                        <tr><th scope='row'>Email</th><td><input id='txtemail' class='form-control' name='txtemail'></textarea></td></tr>
                        <tr><th scope='row'>Level</th><td><input type='radio' id='optlevel' name='optlevel' value='2' checked> 2 &nbsp; <input type='radio' name='optlevel' value='1'> 1</td></tr>
                        <tr><th scope='row'>Status User</th><td><input type='radio' id='optstatus' name='optstatus' value='Karyawan' checked> Karyawan &nbsp; <input type='radio' name='optstatus' value='Administrator'> Administrator</td></tr>
                        <tr><th scope='row'>Blokir User</th><td><input type='radio' id='optblokir' name='optblokir' value='Tidak' checked> Tidak &nbsp; <input type='radio' name='optblokir' value='Ya'> Ya</td></tr>

                        <tr><th scope='row'>Gambar User</th><td><input type='file' id='txtgambar' width='120px' class='form-control' name='txtgambar'></td></tr>

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
              <a href='".base_url().$this->uri->segment(1)."/ifmusercs/tbl_ifmusercs/ifshowtbluser'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='glyphicon glyphicon-log-out'></i> Tutup</button></a>
          </div>
        </div></form>";

        echo form_close();
?>

<script>
  function ifkosongkantext() {
    // alert('.txtkdprovinsi');
    document.getElementById('txtkode').value='';
    document.getElementById('txtnama').value='';
    document.getElementById('txtpasword').value='';
    document.getElementById('txtemail').value='';    
    document.getElementById('txtkode').focus(); 
  }
</script>

<script type="text/javascript">
	function ifcekemptytext() {
    var lcGroup = document.getElementById('cmbgroup').selectedIndex;

    if (!$("#txtkode").val()) {
			  alert('Mohon mengisi kode user');
			  $("#txtkode").focus()
			  return false;
		}

		if (!$("#txtnama").val()) {
			  alert('Mohon mengisi nama user');
			  $("#txtnama").focus()
			  return false;
		}

		if (!$("#txtpasword").val()) {
			  alert('Mohon mengisi pasword user');
			  $("#txtpasword").focus()
			  return false;
		}

    if (lcGroup < 1) {
      alert('Mohon mmemilih nama group user');
      document.getElementById('cmbgroup').focus();
      return false;
    }

	}
</script>

<script>
  $("#mstcheckbox").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
</script>
