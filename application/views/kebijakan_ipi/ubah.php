<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Ubah Data Kebijakan IPI UNIMA</h1>
    <p class="mb-4"></p>

    <div class="card shadow mb-4 border-bottom-success ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= site_url('kebijakan_ipi') ?>" class="btn btn-danger btn-sm">
                   <i class="fas fa-fw fa-arrow-left"></i> Kembali
                </a>                
            </h6>            
        </div>
        <div class="card-body">
            <form action="<?= site_url('kebijakan_ipi/ajax_update/'.$id_kebijakan) ?>" method="post">
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="nim">NIM / No. Pendaftaran</label>
                    <div class="col-sm-6">
                        <input type="text" name="nim" id="nim" value="<?= $mhs->nim ?>" class="form-control form-control-sm" />
                    </div>
                    <span class="help-block text-danger" style="font-size: 10pt"></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="no_pendaftaran">No. Pendaftaran</label>
                    <div class="col-sm-6">
                        <input type="text" name="no_pendaftaran" id="no_pendaftaran" value="<?= $mhs->no_pendaftaran ?>" class="form-control form-control-sm" />
                    </div>
                    <span class="help-block text-danger" style="font-size: 10pt"></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="jlh_ipi">Jumlah IPI</label>
                    <div class="col-sm-6">
                        <input type="number" name="jlh_ipi" id="jlh_ipi" value="<?= $mhs->jlh_ipi ?>" class="form-control form-control-sm" />
                        <span class="help-block text-danger" style="font-size: 10pt"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="jlh_keringanan">Jumlah Keringanan</label>
                    <div class="col-sm-6">
                        <input type="number" name="jlh_keringanan" id="jlh_keringanan" value="<?= $mhs->jlh_keringanan ?>" class="form-control form-control-sm" />
                        <span class="help-block text-danger" style="font-size: 10pt"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="angsuran">Jumlah Angsuran</label>
                    <div class="col-sm-6">
                        <input type="number" name="angsuran" id="angsuran" value="<?= $mhs->angsuran ?>" class="form-control form-control-sm" />
                        <span class="help-block text-danger" style="font-size: 10pt"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="bulan_1">Angsuran Bulan 1</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" id="bulan_1" name="bulan_1" value="<?= $mhs->bulan_1 ?>">
                            <option value="">- Pilih Angsuran Bulan 1 -</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                        <span class="help-block text-danger" style="font-size: 10pt"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="bulan_2">Angsuran Bulan 2</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" id="bulan_2" name="bulan_2" value="<?= $mhs->bulan_2 ?>">
                            <option value="">- Pilih Angsuran Bulan 2 -</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                        <span class="help-block text-danger" style="font-size: 10pt"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label col-form-label-sm" for="verifikator">Verifikator</label>
                    <div class="col-sm-6">
                        <input type="text" name="verifikator" id="verifikator" value="<?= $mhs->verifikator ?>" class="form-control form-control-sm" />
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