              <div class="row" id="form_view">
                <div class="col-md-6">
                  <div class="box box-danger box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title ">Konfigurasi Desa</h3>
                    </div>
                        <div class="box-body">
                            <form role="form" class="form-horizontal xform">
                                <?php
                                 foreach ($config as $key => $value) {
                                 ?>
                                 <div class="form-group">
                                   <input type = "hidden" name="data[<?php echo $key ?>][id]" value="<?php echo $value['id']; ?>" >
                                   <div class="col-sm-4">
                                       <input  type = "text" name="data[<?php echo $key ?>][kode]" id="kode" class="form-control" value="<?php echo $value['kode']; ?>" >
                                   </div>
                                   <label class="col-sm-1 control-label"> : </label>
                                   <div class="col-sm-7">
                                       <input type = "text" name="data[<?php echo $key ?>][nama]" id="kode" class="form-control" value="<?php echo $value['nama']; ?>" >
                                   </div>
                             </div>
                                <?php } ?>

													<!-- <div class="form-group">
                                  <label class="col-sm-4 control-label">Nama</label>
                                  <div class="col-sm-8">
                                      <input type = "text" name="nama" id="nama" class="form-control"  >
                                  </div>
                            </div> -->

                            </form>
                        </div>
                        <div class="box-footer" style="text-align:right">
                            <a class="btn btn-danger" id="btn_cancel"><span class="fa fa-remove "></span> Cancel</a>
                            <!-- <a class="btn btn-primary add_page" id="btn_save"><span class="fa fa-check "></span> Simpan</a> -->
                            <a class="btn btn-primary" id="btn_update"><span class="fa fa-check "></span> update</a>
                        </div>
                    </div>
                </div>
            </div>
