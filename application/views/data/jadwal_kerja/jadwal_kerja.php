  <!-- partial -->
  <div class="main-panel">
      <div class="content-wrapper">
          <div class="page-header">
              <h3 class="page-title"> <?= $breadcumb ?> </h3>
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Tables</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><?= $breadcumb ?></li>
                  </ol>
              </nav>
          </div>
          <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title"><?= $breadcumb ?> Bulan <?= date('F') ?></h4>
                          <button onClick="addData('<?= base_url() ?>')" data-target="#modalAdd" data-toggle="modal" style="float: right;position:relative;bottom:45px;" class="btn btn-outline-info">Tambah Jadwal</button>
                          <button onClick="addData('<?= base_url() ?>')" data-target="#modalAdd" data-toggle="modal" style="float: right;position:relative;bottom:45px; margin-right:20px;" class="btn btn-outline-warning">Pilih Bulan</button>
                          </p>
                          <div class="table-responsive">
                              <table class="table table-bordered dataTable js-exportable mt-3">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Status Kerja</th>
                                          <th>Jumlah Hari</th>
                                          <th>Lihat Detail</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $i = 1; foreach($data_jadwal as $row){ ?>
                                      <tr>
                                        <td><?= $i++ ?></td>
                                        <td>
                                            <?php if($row['work_day'] == 0){ ?>
                                                <span class="badge badge-outline-danger">Hari Libur</span>
                                            <?php }else{ ?>
                                                <span class="badge badge-outline-success">Hari Kerja</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                          <?php if($row['work_day'] == 1){ ?>
                                           <span class="badge badge-outline-primary"><?= $row['jumlah_kerja']; ?> hari</span>
                                          <?php }else{ ?>
                                            <span class="badge badge-outline-primary"><?= $row['jumlah_libur']; ?> hari</span>
                                          <?php } ?>
                                        </td>
                                        <td></td>
                                      </tr>
                                      <?php $totalHari = $row['jumlah_kerja']+$row['jumlah_libur']; ?>
                                      <?php } ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                            <th colspan="2">Total Jumlah Hari</th>
                                            <th colspan="2"><span class="badge badge-outline-primary"><?= $totalHari ?> Hari</span></th>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- content-wrapper ends -->
      <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-size" role="document">
              <div class="modal-content bg-primary">
                  <div class="modal-header">
                      <h4 class="modal-title" id="title_modal">Form Tambah Jadwal Kerja Bulanan</h4>
                  </div>
                  <hr>
                  <div class="modal-body">
                      <div class="container-custom">
                          <form id="form" method="post" action="<?= base_url() ?>absensi/startAbsensiByDate">
                              <div class="form-group row">
                                  <label for="nama_jabatan" class="col-sm-2 col-form-label">Dari Tanggal</label>
                                  <div class="col-sm-10">
                                      <input type="date" class="form-control" id="dari_tanggal" name="dari_tanggal">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="gaji" class="col-sm-2 col-form-label">Sampai Tanggal</label>
                                  <div class="col-sm-10">
                                      <input type="date" class="form-control" id="sampai_tanggal" name="sampai_tanggal">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="" class="col-sm-2 col-form-label"></label>
                                  <div class="col-md-3">
                                      <div class="form-check form-check-success">
                                          <label class="form-check-label">
                                              <input type="checkbox" name="check_kerja" class="form-check-input"> Hitung hari kerja<i class="input-helper"></i></label>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-check form-check-danger">
                                          <label class="form-check-label">
                                              <input type="checkbox" name="check_libur" class="form-check-input"> Hitung hari libur <i class="input-helper"></i></label>
                                      </div>
                                  </div>
                              </div>
                      </div>
                  </div>
                  <hr>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btn-fw">Simpan Data</button>
                      <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">CLOSE</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>