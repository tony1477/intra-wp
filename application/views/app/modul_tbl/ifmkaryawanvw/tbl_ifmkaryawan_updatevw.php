<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Edit Data User</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_tbl/ifmkaryawancs/tbl_ifmkaryawancs/ifupdaterecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='idkode' value='$row[kry_nik]'>
                        <tr><th width='130px' scope='row'>Nomor Induk</th><td><input type='text' id='txtkode' maxlength='30' class='form-control' name='txtkode' onkeyup='this.value = this.value.toUpperCase()' value='$row[kry_nik]' readonly required></td></tr>
                        <tr><th scope='row'>Nama Karyawan</th><td><input type='text' class='form-control' id='txtnama' name='txtnama' value='$row[kry_nama]' required></td></tr>

                        <tr><th scope='row'>Jabatan</th><td><select class='js-example-basic-single form-control' id='cmbjabatan' name='cmbjabatan' style='height: 32px; width: 250px;' required>
                        <option value=0 selected>- Pilih Jabatan -</option>";
                        foreach ($arjabatan as $rows) {
                          if ($rows['jab_kode']==$row['jab_kode']) {
                            echo "<option value='$rows[jab_kode]' selected>$rows[jab_nama]</option>";
                          } else {
                            echo "<option value='$rows[jab_kode]'>$rows[jab_nama]</option>";
                          }
                        }
                        echo "</select></td></tr>

                        <tr><th scope='row'>Nama User</th><td><select class='js-example-basic-single form-control' id='cmbuser' name='cmbuser' style='height: 32px; width: 250px;' required>
                        <option value=0 selected>- Pilih User -</option>";
                        foreach ($aruser as $rows) {
                          if ($rows['user_kode']==$row['user_kode']) {
                            echo "<option value='$rows[user_kode]' selected>$rows[user_nama]</option>";
                          } else {
                            echo "<option value='$rows[user_kode]'>$rows[user_nama]</option>";
                          }
                        }
                        echo "</select></td></tr>

                        <tr><th scope='row'>Status Karyawan</th><td>"; if ($row['kry_status'] == 'Aktif'){ echo "<input type='radio' id='optstatus' name='optstatus' value='Aktif' checked> Aktif &nbsp; <input type='radio' name='optstatus' value='Non Aktif'> Non Aktif"; }else{ echo "<input type='radio' name='optstatus' value='Aktif'> Aktif &nbsp; <input type='radio' name='optstatus' value='Non Aktif' checked> Non Aktif"; } echo "</td></tr>

                        <tr><th scope='row'>Gambar User</th><td><input type='file' class='form-control' id='txtgambar' name='txtgambar' value='$row[kry_fhoto]'><hr style='margin:5px'>
                        Gambar Aktif Saat ini : <img style='width:32px; height:32px' src='".base_url()."ifassetadm/imgkaryawan/$row[kry_fhoto]'></td></tr>

                    </tbody>
                </table>
            </div>
          </div>

          <div class='box-footer'>
              <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Update Data'><i class='glyphicon glyphicon-floppy-disk'></i> Update</button>
              <a href='".base_url().$this->uri->segment(1)."/ifmkaryawancs/tbl_ifmkaryawancs/ifshowtblkaryawan'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='fa fa-sign-out'></i>Tutup</button></a>
          </div>
        </div></form>";
?>

<script type="text/javascript">
	function ifcekemptytext() {
		if(!$("#txtnama").val()) {
			 alert('Mohon mengisi nama karyawan');
			 $("#txtnama").focus()
			 return false;
		}

	}
</script>