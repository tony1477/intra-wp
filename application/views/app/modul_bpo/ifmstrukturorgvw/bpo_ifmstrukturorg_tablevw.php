<div class="col-xs-14">
    <div class="box box-warning box-solid" style='margin: -20px 5px 5px 0px;'>
        <div class="box-header">
          <h3 class="box-title"><span class='glyphicon glyphicon-share'></span>Data Struktur Organisasi</h3>
        </div>  

        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div style="padding-bottom: 10px;"'>
                        <?php echo anchor(site_url('modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifinsertrecord'), '<i class="glyphicon glyphicon-plus-sign" aria-hidden="true"></i> Insert Data', 'class="btn btn-primary btn-md" data-toggle="tooltip" title="Insert Data"'); ?>
                    </div> 

                    <div class="card-body">
                      <!-- <div class="table-responsive"> -->
                        <table id="example1" class="table table-sm table-borderless display nowrap" cellspacing="0" style="width:100%">
                            <thead class="bg-success">
                                <tr>
                                    <th style="width: 6%">Aksi</th>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 10%">Kode Struktur</th>
                                    <th style="width: 20%">Nama Struktur Organisasi (IDN)</th>
                                    <th style="width: 20%">Nama Struktur Organisasi (ENG)</th>
                                    <th style="width: 14%">Departemen</th>
                                    <th style="width: 14%">Nama File Struktur</th>
                                    <th style="width: 14%">Cover Struktur</th>
                                    <th style="width: 14%">Publish</th>
                                    <th style="width: 14%">Status</th>
                                    <th style="width: 14%">Cover Awal</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($ardatastruktur as $row) {
                                        echo "<tr>
                                                <td><center>
                                                    <a class='btn btn-success btn-xs' data-toggle='tooltip' title='Edit Data' href='".base_url()."modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifupdaterecord/$row[stg_kode]'><span class='glyphicon glyphicon-edit'></span></a>
                                                    <a class='btn btn-danger btn-xs' data-toggle='tooltip' title='Hapus Data' href='".base_url()."modul_bpo/ifmstrukturorgcs/bpo_ifmstrukturorgcs/ifdeleterecord/$row[stg_kode]' msgbox-confirm='Anda yakin akan menghapus data dengan kode : $row[stg_kode]'><span class='glyphicon glyphicon-trash'></span></a>
                                                </center></td>          
                                                <td>$no</td>
                                                <td>$row[stg_kode]</td>
                                                <td>$row[stg_nama]</td>
                                                <td>$row[stg_nama2]</td>
                                                <td>$row[dep_nama]</td>
                                                <td>$row[stg_nmfile]</td>
                                                <td><img src='".base_url()."datastruktur/cover/$row[stg_cover]' width='50'></td>
                                                <td>$row[stg_publish]</td>
                                                <td>$row[stg_aktif]</td>
                                                <td>$row[stg_default]</td>
                                              </tr>";
                                              $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                      <!-- </div>   -->
                    </div>
                </div>
            </div>
        </div>      
    </div>  
</div>

<script>
  function confirmation(ev) {
    ev.preventDefault();
    var data_id = ev.currentTarget.getAttribute('data-id');
    var currentLocation = window.location;
    Swal.fire({
      title: 'Konfirmasi Hapus Data',
      text: "Apakah Anda ingin menghapus data ini?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: site_url + 'admin/delete_strukturorg/' + data_id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            Swal.fire({
              title: 'Dihapus!',
              text: 'Data berhasil dihapus',
              icon: 'success',
              showConfirmButton: false,
              timer: 1500
            }).then(() => {
              location.reload();
            })
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.debug(jqXHR);
            console.debug(textStatus);
            console.debug(errorThrown);
          },
        });
      }
    })
  }
</script>