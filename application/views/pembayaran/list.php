<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Pembayaran UKT UNIMA</h1>
    <p class="mb-4"></p>

    <div class="card shadow mb-4 border-bottom-success ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                          
            </h6>            
        </div>
        <div class="card-body">
            <form action="<?= site_url('pembayaran/cari'); ?>" method="GET">
                <div class="form-group row">
                  <label class="control-label" for="lunchBegins">NIM</label>
                  <div class="col-lg-3">
                    <input type="text" name="nim" id="nim" class="form-control form-control-sm" />
                    <span class="help-block text-danger" style="font-size: 10pt"></span>
                  </div>

                  <div class="col-lg-3">
                      <button class="btn btn-primary" type="submit">Search</button>
                  </div>
                </div>
            </form>
        </div>
    </div>    
</div>