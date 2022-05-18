<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Edit Data Struktur Organisasi</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifupdaterecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='idkode' value='$row[stg_kode]'>
                        <tr><th width='130px' scope='row'>Kode Struktur Organisasi</th><td><input type='text' id='txtkode' maxlength='30' class='form-control' name='txtkode' onkeyup='this.value = this.value.toUpperCase()' value='$row[stg_kode]' readonly required></td></tr>
                        <tr><th scope='row'>Nama Struktur Organisasi (IDN)</th><td><textarea id='txtnama' class='form-control' name='txtnama' autofocus>$row[stg_nama]</textarea></td></tr>
                        <tr><th scope='row'>Nama Struktur Organisasi (ENG)</th><td><textarea id='txtnama2' class='form-control' name='txtnama2' autofocus>$row[stg_nama2]</textarea></td></tr>

                        <tr><th scope='row'>Departemen</th><td><select id='cmbgroup' class='js-example-basic-single form-control' name='cmbgroup' style='height: 32px; width: 500px;' required>
                        <option value=0 selected>- Pilih Departemen -</option>";
                        foreach ($ardatatemp as $rows) {
                          if ($rows['dep_kode']==$row['dep_kode']) {
                              echo "<option value='$rows[dep_kode]' selected>$rows[dep_nama]</option>";
                          } else {
                              echo "<option value='$rows[dep_kode]'>$rows[dep_nama]</option>";
                          }
                        }
                        echo "</select></td></tr>

                        <tr><th scope='row'>Ganti File Struktur Organisasi</th><td><input type='file' width='120px' class='form-control' name='txtfile'>";
                        if ($row['stg_nmfile'] != '') { 
                            echo "File : <a target='_BLANK' href='".base_url()."datastruktur/file/$row[stg_nmfile]'>$row[stg_nmfile]</a>"; 
                        } 
                        echo "</td></tr>

                        <tr><th scope='row'>Ganti Cover (Image)</th><td><input type='file' width='120px' class='form-control' name='txtcoversop'>";
                        if ($row['stg_cover'] != '') { 
                            echo "File : <a target='_BLANK' href='".base_url()."datastruktur/cover/$row[stg_cover]'>$row[stg_cover]</a>"; 
                        } 
                        echo "</td></tr>

                        <tr><th scope='row'>Publish Dokumen</th><td>"; if ($row['stg_publish'] == 'Y'){ echo "<input type='radio' id='optpublish' name='optpublish' value='Y' checked> Ya &nbsp; <input type='radio' name='optpublish' value='N'> Tidak"; }else{ echo "<input type='radio' name='optpublish' value='Y'> Ya &nbsp; <input type='radio' name='optpublish' value='N' checked> Tidak"; } echo "</td></tr>
                        <tr><th scope='row'>Status Dokumen</th><td>"; if ($row['stg_aktif'] == 'Y'){ echo "<input type='radio' id='optstatus' name='optstatus' value='Y' checked> Aktif &nbsp; <input type='radio' name='optstatus' value='N'> Tidak"; }else{ echo "<input type='radio' name='optstatus' value='Y'> Aktif &nbsp; <input type='radio' name='optstatus' value='N' checked> Tidak"; } echo "</td></tr>
                        <tr><th scope='row'>Cover Pembukaan Awal</th><td>"; if ($row['stg_default'] == 'Y'){ echo "<input type='radio' id='optdefault' name='optdefault' value='Y' checked> Ya &nbsp; <input type='radio' name='optdefault' value='N'> Tidak"; }else{ echo "<input type='radio' name='optdefault' value='Y'> Ya &nbsp; <input type='radio' name='optdefault' value='N' checked> Tidak"; } echo "</td></tr>

                    </tbody>
                </table>
            </div>
          </div>

          <div class='box-footer'>
              <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Update Data'><i class='glyphicon glyphicon-floppy-disk'></i> Update</button>
              <a href='".base_url().$this->uri->segment(1)."/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifshowstrukturorg'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='fa fa-sign-out'></i>Tutup</button></a>
          </div>
        </div></form>";
?>

<script type="text/javascript">
	function ifcekemptytext() {
		if(!$("#txtnama").val()) {
			 alert('Mohon mengisi nama struktur organisasi (IDN)');
			 $("#txtnama").focus()
			 return false;
		}
	}
</script>