<?php 
  echo "<div class='col-xs-12'>
          <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
            <div class='box-header'>
              <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Edit Data Dokumen SOP</h3>
            </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_bpo/ifmdokumensopcs/bpo_ifmdokumensopcs/ifupdaterecord', $attributes);
              echo "<div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                    <tbody>
                        <input type='hidden' name='idkode' value='$row[dok_nosop]'>
                        <tr><th width='130px' scope='row'>Nomor SOP</th><td><input type='text' id='txtnosop' maxlength='30' class='form-control' name='txtnosop' onkeyup='this.value = this.value.toUpperCase()' value='$row[dok_nosop]' readonly required></td></tr>
                        <tr><th scope='row'>Nama SOP (IDN)</th><td><textarea id='txtnama' class='form-control' name='txtnama' autofocus>$row[dok_nmsop]</textarea></td></tr>
                        <tr><th scope='row'>Nama SOP (ENG)</th><td><textarea id='txtnama2' class='form-control' name='txtnama2' autofocus>$row[dok_nmsop2]</textarea></td></tr>

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

                        <tr><th scope='row'>Kategori Dokumen</th><td><select id='cmbkategori' class='js-example-basic-single form-control' name='cmbkategori' style='height: 32px; width: 500px;' required>
                        <option value=0 selected>- Pilih Kategori -</option>";
                        foreach ($arkategori as $rows) {
                          if ($rows['kat_kode']==$row['kat_kode']) {
                              echo "<option value='$rows[kat_kode]' selected>$rows[kat_nama]</option>";
                          } else {
                              echo "<option value='$rows[kat_kode]'>$rows[kat_nama]</option>";
                          }
                        }
                        echo "</select></td></tr>

                        <tr><th scope='row'>Ganti File SOP</th><td><input type='file' width='120px' class='form-control' name='txtfile'>";
                        if ($row['dok_nmfile'] != '') { 
                            echo "File : <a target='_BLANK' href='".base_url()."datasop/file/$row[dok_nmfile]'>$row[dok_nmfile]</a>"; 
                        } 
                        echo "</td></tr>

                        <tr><th scope='row'>Ganti File Form</th><td><input type='file' width='120px' class='form-control' name='txtfile2'>";
                        if ($row['dok_nmfile2'] != '') { 
                            echo "File : <a target='_BLANK' href='".base_url()."datasop/form/$row[dok_nmfile2]'>$row[dok_nmfile2]</a>"; 
                        } 
                        echo "</td></tr>

                        <tr><th scope='row'>Ganti File Form-2</th><td><input type='file' width='120px' class='form-control' name='txtfile3'>";
                        if ($row['dok_nmfile3'] != '') { 
                            echo "File : <a target='_BLANK' href='".base_url()."datasop/form2/$row[dok_nmfile3]'>$row[dok_nmfile3]</a>"; 
                        } 
                        echo "</td></tr>

                        <tr><th scope='row'>Ganti File Form-3</th><td><input type='file' width='120px' class='form-control' name='txtfile4'>";
                        if ($row['dok_nmfile4'] != '') { 
                            echo "File : <a target='_BLANK' href='".base_url()."datasop/form3/$row[dok_nmfile4]'>$row[dok_nmfile4]</a>"; 
                        } 
                        echo "</td></tr>

                        <tr><th scope='row'>Ganti Cover (Image)</th><td><input type='file' width='120px' class='form-control' name='txtcoversop'>";
                        if ($row['dok_cover'] != '') { 
                            echo "File : <a target='_BLANK' href='".base_url()."coversop/cover/$row[dok_cover]'>$row[dok_cover]</a>"; 
                        } 
                        echo "</td></tr>

                        <tr><th scope='row'>Publish Dokumen</th><td>"; if ($row['dok_publish'] == 'Y'){ echo "<input type='radio' id='optpublish' name='optpublish' value='Y' checked> Ya &nbsp; <input type='radio' name='optpublish' value='N'> Tidak"; }else{ echo "<input type='radio' name='optpublish' value='Y'> Ya &nbsp; <input type='radio' name='optpublish' value='N' checked> Tidak"; } echo "</td></tr>
                        <tr><th scope='row'>Status Dokumen</th><td>"; if ($row['dok_aktif'] == 'Y'){ echo "<input type='radio' id='optstatus' name='optstatus' value='Y' checked> Aktif &nbsp; <input type='radio' name='optstatus' value='N'> Tidak"; }else{ echo "<input type='radio' name='optstatus' value='Y'> Aktif &nbsp; <input type='radio' name='optstatus' value='N' checked> Tidak"; } echo "</td></tr>

                    </tbody>
                </table>
            </div>
          </div>

          <div class='box-footer'>
              <button type='submit' name='submit' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Update Data'><i class='glyphicon glyphicon-floppy-disk'></i> Update</button>
              <a href='".base_url().$this->uri->segment(1)."/ifmdokumensopcs/bpo_ifmdokumensopcs/ifshowbpodokumensop'><button type='button' class='btn btn-primary pull-right' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='fa fa-sign-out'></i>Tutup</button></a>
          </div>
        </div></form>";
?>

<script type="text/javascript">
	function ifcekemptytext() {
		if(!$("#txtnama").val()) {
			 alert('Mohon mengisi nama SOP (IDN)');
			 $("#txtnama").focus()
			 return false;
		}
	}
</script>