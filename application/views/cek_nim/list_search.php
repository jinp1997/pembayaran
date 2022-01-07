<?php  
    $this->db2 = $this->load->database('second', TRUE);
    $this->db3 = $this->load->database('third', TRUE);
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Cek NIM</h1>
    <p class="mb-4"></p>

    <div class="card shadow mb-4 border-bottom-success ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="<?= site_url('cek_nim') ?>" class="btn btn-danger btn-m">
                   <i class="fas fa-fw fa-arrow-left"></i> Kembali
                </a>
            </h6>            
        </div>
        <?php if (empty($cari)) { ?>
            <div class="card-body">
                <div class="table-responsive">                
                    <table class="table table-bordered" width="100%" cellspacing="0">                    
                        <tbody>
                            <tr>
                                NIM Tidak Ditemukan.
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } else { ?>
            <?php
                $mahasiswa = $this->db3->where('KdMahasiswa', $cari->KdMahasiswa)->get('ms_data_mahasiswa')->row();
                $prodi = $this->db3->where('KdProdi', $mahasiswa->KdProdi)->get('ms_program_studi')->row();
                $registrasi = $this->db2->where('mhsregMhsNiu', $nim)->where('mhsregSemId', '20202')->get('mahasiswa_registrasi')->row();

                if (empty($registrasi)) {
                    $ket_bank = '';
                } else {
                    $ket_bank = $registrasi->mhsregKeterangan;
                }
            ?>
            <div class="card-body">
                <div class="table-responsive">                
                    <table class="table table-bordered" width="100%" cellspacing="0">                    
                        <tbody>
                            <tr>
                                <td>NIM : <b><?= $nim ?></b></td>
                                <td>Nama : <b><?= $mahasiswa->NmMahasiswa ?></b></td>
                                <td>Jur/Prodi : <b><?= $prodi->NmProdi ?></b></td>
                                <td>Keterangan : <b><?= $ket_bank ?></b></td>
                                <td>Jumlah UKT : <b><?= $cari->Nilai ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>    
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
</script>