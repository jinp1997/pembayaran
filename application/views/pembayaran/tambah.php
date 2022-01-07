<script>
    var ajax_edit   = "<?= site_url('admin/pembayaran/ajax_edit/'); ?>";
    var ajax_add    = "<?= site_url('admin/pembayaran/ajax_add'); ?>";
    var ajax_update = "<?= site_url('admin/pembayaran/ajax_update/'); ?>";
    var ajax_delete = "<?= site_url('admin/pembayaran/ajax_delete/'); ?>";  
</script>
<script src="<?= base_url('assets/script/pembayaran.js'); ?>"></script>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Data Pembayaran UKT UNIMA</h1>
    <p class="mb-4"></p>

    <div class="card shadow mb-4 border-bottom-success ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= site_url('pembayaran/cari?nim='. $nim) ?>" class="btn btn-danger btn-sm">
                   <i class="fas fa-fw fa-arrow-left"></i> Kembali
                </a>                
            </h6>            
        </div>
        <div class="card-body">
            <form action="<?= site_url('pembayaran/ajax_add') ?>" method="post">
                <input type="hidden" name="nim" value="<?= $nim ?>" />  
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="tanggal">Tanggal Bayar</label>
                    <div class="col-sm-3">
                        <input type="date" name="tanggal" id="tanggal" class="form-control form-control-sm" />
                    </div>
                    <div class="col-sm-3">
                        <input type="time" name="jam" id="jam" class="form-control form-control-sm" />
                    </div>
                    <span class="help-block text-danger" style="font-size: 10pt"></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="mhsregSemId">Semester</label>
                    <div class="col-sm-6">
                        <input type="number" name="mhsregSemId" id="mhsregSemId" class="form-control form-control-sm" />
                        <span class="help-block text-danger" style="font-size: 10pt"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="mhsregTotalBayar">Total Bayar</label>
                    <div class="col-sm-6">
                        <input type="number" name="mhsregTotalBayar" id="mhsregTotalBayar" class="form-control form-control-sm" />
                        <span class="help-block text-danger" style="font-size: 10pt"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="mhsregKeterangan">Bank Bayar</label>
                    <div class="col-sm-6">
                        <input type="text" name="mhsregKeterangan" id="mhsregKeterangan" class="form-control form-control-sm" />
                        <span class="help-block text-danger" style="font-size: 10pt"></span>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-8 col-form-label col-form-label-sm"></label>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-check"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>