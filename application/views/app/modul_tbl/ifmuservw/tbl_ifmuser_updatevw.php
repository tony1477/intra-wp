<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Edit Data User</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_tbl/ifmusercs/tbl_ifmusercs/ifupdaterecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='idkode' value='$row[user_kode]'>
                        <tr><th width='130px' scope='row'>Kode User</th><td><input type='text' id='txtkode' maxlength='30' class='form-control' name='txtkode' onkeyup='this.value = this.value.toUpperCase()' value='$row[user_kode]' readonly required></td></tr>
                        <tr><th scope='row'>Nama User</th><td><input type='text' class='form-control' id='txtnama' name='txtnama' value='$row[user_nama]' required></td></tr>
                        <tr><th scope='row'>Password</th><td><input type='password' class='form-control' id='txtpasword' name='txtpasword' onkeyup=\"nospaces(this)\"></td></tr>

                        <tr><th scope='row'>Group User</th><td><select class='js-example-basic-single form-control' id='cmbgroup' name='cmbgroup' style='height: 32px; width: 250px;' required>
                        <option value=0 selected>- Pilih Group User -</option>";
                        foreach ($argroupuser as $rows) {
                          if ($rows['guser_kode']==$row['guser_kode']) {
                              echo "<option value='$rows[guser_kode]' selected>$rows[guser_nama]</option>";
                          } else {
                              echo "<option value='$rows[guser_kode]'>$rows[guser_nama]</option>";
                          }
                        }
                        echo "</select></td></tr>

                        <tr><th scope='row'>Departemen</th><td><select class='js-example-basic-single form-control' id='cmbdepartemen' name='cmbdepartemen' style='height: 32px; width: 250px;' required>
                        <option value=0 selected>- Pilih Departemen -</option>";
                        foreach ($ardepartemen as $rows) {
                          if ($rows['dep_kode']==$row['dep_kode']) {
                            echo "<option value='$rows[dep_kode]' selected>$rows[dep_nama]</option>";
                          } else {
                            echo "<option value='$rows[dep_kode]'>$rows[dep_nama]</option>";
                          }
                        }
                        echo "</select></td></tr>


                        <tr><th scope='row'>Email</th><td><input type='text' class='form-control' id='txtemail' name='txtemail' value='$row[user_email]'></td></tr>

                        <tr><th scope='row'>Level</th><td>"; if ($row['user_level'] == '1'){ echo "<input type='radio' id='optlevel' name='optlevel' value='1' checked> 1 &nbsp; <input type='radio' name='optlevel' value='2'> 2"; }else{ echo "<input type='radio' name='optlevel' value='1'> 1 &nbsp; <input type='radio' name='optlevel' value='2' checked> 2"; } echo "</td></tr>
                        <tr><th scope='row'>Status User</th><td>"; if ($row['user_stts'] == 'Karyawan'){ echo "<input type='radio' id='optstatus' name='optstatus' value='Karyawan' checked> Karyawan &nbsp; <input type='radio' name='optstatus' value='Administrator'> Administrator"; }else{ echo "<input type='radio' name='optstatus' value='Karyawan'> Karyawan &nbsp; <input type='radio' name='optstatus' value='Administrator' checked> Administrator"; } echo "</td></tr>
                        <tr><th scope='row'>Blokir User</th><td>"; if ($row['user_blokir'] == 'Tidak'){ echo "<input type='radio' id='optblokir' name='optblokir' value='Tidak' checked> Tidak &nbsp; <input type='radio' name='optblokir' value='Ya'> Ya"; }else{ echo "<input type='radio' name='optblokir' value='Tidak'> Tidak &nbsp; <input type='radio' name='optblokir' value='Ya' checked> Ya"; } echo "</td></tr>                        
                        <tr><th scope='row'>Gambar User</th><td><input type='file' class='form-control' id='txtgambar' name='txtgambar' value='$row[user_fhoto]'><hr style='margin:5px'>
                        Gambar Aktif Saat ini : <img style='width:32px; height:32px' src='".base_url()."ifassetadm/imguser/$row[user_fhoto]'></td></tr>

                        <tr><th scope='row'>Hak Akses Modul</th><td><div class='checkbox-scroll'>";
                        foreach ($arusermodul as $rowaks) {
                          echo "<span style='display:block'><a class='text-primary'><span class='glyphicon glyphicon-ok'></span></a> $rowaks[dok_nosop] - $rowaks[dok_nmsop] ($rowaks[dep_kode])</span> ";
                        }
                        echo "</div></td></tr>

                    </tbody>
                </table>
            </div>
          </div>

          <div class='box-footer'>
              <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Update Data'><i class='glyphicon glyphicon-floppy-disk'></i> Update</button>
              <a href='".base_url().$this->uri->segment(1)."/ifmusercs/tbl_ifmusercs/ifshowtbluser'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='fa fa-sign-out'></i>Tutup</button></a>
          </div>
        </div></form>";
?>

<script type="text/javascript">
	function ifcekemptytext() {
		if(!$("#txtnama").val()) {
			 alert('Mohon mengisi nama user');
			 $("#txtnama").focus()
			 return false;
		}

		//if(!$("#txtpasword").val()) {
		//	 alert('Mohon mengisi pasword user');
		//	 $("#txtpasword").focus()
		//	 return false;
		//}
	}
</script>
