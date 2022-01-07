<script>
    var ajax_edit   = "<?= site_url('admin/kebijakan_ipi/ajax_edit/'); ?>";
    var ajax_add    = "<?= site_url('admin/kebijakan_ipi/ajax_add'); ?>";
    var ajax_update = "<?= site_url('admin/kebijakan_ipi/ajax_update/'); ?>";
    var ajax_delete = "<?= site_url('admin/kebijakan_ipi/ajax_delete/'); ?>";  
</script>
<script src="<?= base_url('assets/script/kebijakan.js'); ?>"></script>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Kebijakan IPI UNIMA</h1>
    <p class="mb-4"></p>

    <div class="card shadow mb-4 border-bottom-success ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= site_url('kebijakan_ipi/tambah') ?>" class="btn btn-primary btn-sm">
                   <i class="fas fa-fw fa-plus"></i>
                </a> 
            </h6>            
        </div>
        <div class="card-body">
            <div class="table-responsive">                
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="text-align: center;">NIM</th> 
                            <th style="text-align: center;">No. Pendaftaran</th> 
                            <th style="text-align: center;">Jumlah IPI</th> 
                            <th style="text-align: center;">Jumlah Keringanan</th>
                            <th style="text-align: center;">Angsuran</th>
                            <th style="text-align: center;">Verifikator</th>
                            <th style="width: 10%; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($kebijakan as $row) { 
                            if (!empty($row->angsuran) || $row->angsuran == '0') {
                              $angsuran = $row->angsuran . ' kali pada <b> Bulan ' . $row->bulan_1 . '</b> dan <b> Bulan ' . $row->bulan_2 . '</b>';
                            } else {
                              $angsuran = '-';
                            }
                        ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->nim ?></td>
                                <td><?= $row->no_pendaftaran ?></td>
                                <td><?= formatRupiah($row->jlh_ipi) ?></td>
                                <td><?= formatRupiah($row->jlh_keringanan) ?></td>
                                <td><?= $angsuran ?></td>
                                <td><?= $row->verifikator ?></td>
                                <td style="text-align: center;">
                                  <a href="<?= site_url('kebijakan_ipi/ubah/'. $row->id_kebijakan) ?>" class="btn btn-warning btn-sm">
                                      <i class="fas fa-fw fa-edit"></i>
                                  </a>
                                  <a href="<?= site_url('kebijakan_ipi/ajax_delete/'. $row->id_kebijakan) ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" class="btn btn-danger btn-sm">
                                      <i class="fas fa-fw fa-trash-alt"></i>
                                  </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
</script>