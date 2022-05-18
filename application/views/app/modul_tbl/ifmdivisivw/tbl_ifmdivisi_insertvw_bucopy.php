<link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>ifassetadm/admin/plugins/select2/select2.min.css">

<?php 
    echo "<div class='col-xs-12'>
            <div class='box box-info box-solid' style='margin: -20px -5px 15px 1px;'>
                <div class='box-header'>
                  <h3 class='box-title'><span class='glyphicon glyphicon-new-window'></span> Insert Data Divisi</h3>
                </div>

            <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form','onsubmit'=>'return ifcekemptytext()','action'=>'<?php echo base_url()');
              echo form_open_multipart('modul_tbl/ifmdivisics/tbl_ifmdivisics/ifinsertrecord', $attributes);
              
    echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>                    
                    <tr><th scope='row'>Kode Divisi</th><td><input type='text' id='txtkddivisi' width='130px' maxlength='3' class='form-control' name='kddivisi' onkeyup='this.value = this.value.toUpperCase()' autofocus></td></tr>
                    <tr><th scope='row'>Nama Divisi (IDN)</th><td><textarea id='txtnmdivisi' class='form-control' name='nmdivisi'></textarea></td></tr>
                    <tr><th scope='row'>Nama Divisi (ENG)</th><td><textarea id='txtnmdivisi2' class='form-control' name='nmdivisi2'></textarea></td></tr>
                    <tr><th scope='row'>Group Divisi</th><td><select name='kdgroupdivisi' class='js-example-basic-single form-control' id='cmbnmgroupdivisi' style='height: 32px; width: 250px;' required>
                    
                          <option value=0 selected>- Pilih Group Divisi -</option>";
                          foreach ($ardatatemp as $rows) {
                              echo "<option value='$rows[gdiv_kode]'>$rows[gdiv_nama]</option>";
                          }
                    echo "</select></td></tr>

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
                    <a href='".base_url().$this->uri->segment(1)."/ifshowtblmprovinsi'><button type='button' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Kembali'><i class='glyphicon glyphicon-log-out'></i> Tutup</button></a>

              </div>
          </div></form>";
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
    if (!$("#txtkode").val()) {
			    alert('Mohon mengisi kode divisi');
			    $("#txtkode").focus()
			    return false;
		  }

		  if (!$("#txtnama").val()) {
			    alert('Mohon mengisi nama divisi');
			    $("#txtnama").focus()
			    return false;
		  }
	}
</script>