            <div class="row" id="data_view">
                <div class="col-md-12">
                    <div class="box box-danger box-solid">
                       <div class="box-header">
                          <h4 class="box-title">
                            Daftar Surat
                          </h4>
                      </div>

                        <div class="box-body">
                            <table id="table" class="table table-hover table-bordered display nowrap" width="100%" cellspacing="0">
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript">
$(document).ready(function () {

  $('body').on('click', '.download_surat', function() {
      id = $(this).attr('value')

      //  $("#myModal").modal();
      $.get("<?php echo base_url('surat/download_surat') ?>",{id: id}).done(function(data) {
        window.location.href = data;
          //  $("#modal_content").html(data);
          // $("a#download_link").attr("href", data);
          // $("#download_link").show();
          // $("#loading_process").hide();
          // $("#keterangan_proses").text("Surat berhasil dibuat");

      })
  })

pagination = $('#table').pagination({
    href:"<?php echo site_url() ?>/surat/page",
    plus_column: [1,{'class':'download_surat','id':'id_surat','text':'Download'}],
    hide: "id_surat",
    edit: "id_surat",
    delete: "id_surat",
    search: true,
  });
  pagination.init();
      });

</script>
