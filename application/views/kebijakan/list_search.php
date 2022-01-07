<script>
    var ajax_edit   = "<?= site_url('admin/pembayaran/ajax_edit/'); ?>";
    var ajax_add    = "<?= site_url('admin/pembayaran/ajax_add'); ?>";
    var ajax_update = "<?= site_url('admin/pembayaran/ajax_update/'); ?>";
    var ajax_delete = "<?= site_url('admin/pembayaran/ajax_delete/'); ?>";  
</script>
<script src="<?= base_url('assets/script/pembayaran.js'); ?>"></script>

<?php  
    $validasi = $this->db->where('nim', $nim)->get('validasi')->row();
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Pembayaran UKT UNIMA</h1>
    <p class="mb-4"></p>

    <div class="card shadow mb-4 border-bottom-success ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <?php if (empty($validasi)) { ?>
                    <a href="<?= site_url('pembayaran/tambah/'. $nim) ?>" class="btn btn-primary btn-sm">
                       <i class="fas fa-fw fa-plus"></i>
                    </a>
                    <a href="#" data-toggle="modal" data-target="#confirmModal" class="btn btn-success btn-sm">
                       <i class="fas fa-fw fa-check"></i> Validasi
                    </a> 
                <?php } ?>
                <a href="<?= site_url('pembayaran') ?>" class="btn btn-danger btn-sm">
                   <i class="fas fa-fw fa-arrow-left"></i> Kembali
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
                            <th style="text-align: center;">Semester</th> 
                            <th style="text-align: center;">Total Bayar</th>
                            <th style="text-align: center;">Tanggal Bayar</th>
                            <th style="text-align: center;">Bank Bayar</th> 
                            <th style="width: 10%; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($cari as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->mhsregMhsNiu ?></td>
                                <td><?= $row->mhsregSemId ?></td>
                                <td><?= $row->mhsregTotalBayar ?></td>
                                <td><?= $row->mhsregTanggalRegistrasi ?></td>
                                <td><?= $row->mhsregKeterangan ?></td>
                                <td style="text-align: center;">
                                    <?php if (empty($validasi)) { ?>
                                        <a href="<?= site_url('pembayaran/ubah/'. $row->mhsregMhsNiu . '/' . $row->mhsregSemId) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?= site_url('pembayaran/ajax_delete/'. $row->mhsregMhsNiu . '/' . $row->mhsregSemId) ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')" class="btn btn-danger btn-sm">
                                            <i class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                    <?php } else { ?>
                                        <span align="center" style="text-align: center;">-</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Validasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda yakin untuk verifikasi data ini ?</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-success" href="<?= site_url('pembayaran/validasi/'. $nim) ?>">Validasi</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
</script>