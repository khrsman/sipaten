    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>Dashboard</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section> -->
        <section class="content" id="page_content">
          <div class="row">
            <div class="col-md-6">

              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="info-box">
                  <table >
                    <tr>
                      <td style="padding-right:20px"><img src="<?php echo base_url('img/logo_kota.png')?>" alt="" width="100px" height="100px"></td>
                      <td>
                        <h3>Desa Rancabolang</h3>
                        <h4>Kecamatan Gedebage</h4>
                        <h4>Kota Bandung</h4>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>

            </div>
            <div class="col-md-6">
              <div class="box box-default">
                <div class="box-header with-border">
                  <i class="fa fa-bank"></i>

                  <h3 class="box-title">Staff desa</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul>
                    <?php
                    foreach ($pamong as $key => $value) {
                      $nama = $value['nama'];
                      $jabatan = $value['jabatan'];
                    echo "<li>$jabatan :  $nama </li> ";
                    }
                     ?>                  
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Penduduk</span>
                      <span class="info-box-number"><?php echo $jumlah_warga ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-envelope-open-o"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Surat</span>
                      <span class="info-box-number"><?php echo $jumlah_surat ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
              </div>
                <!-- <div class="col-md-6">
                    <div class="box box-solid">
                      <div class="box-header with-border">
                        <h3 class="box-title">Surat paling banyak diterbitkan</h3>
                      </div>
                        <div class="box-body">
	<script src="<?php echo base_url('js/horizBarChart/horizBarChart.js') ?>"></script>
  <div class="chart-horiz">
    <ul class="chart">
      <li class="current" title="Surat Keterangan Sehat"><span class="bar" data-number="38000"></span><span class="number">80</span></li>
      <li class="past" title="Surat Keterangan 2"><span class="bar" data-number="28500"></span><span class="number">66</span></li>
      <li class="past" title="Surat Keterangan 2"><span class="bar" data-number="28500"></span><span class="number">66</span></li>
      <li class="past" title="Surat Keterangan 2"><span class="bar" data-number="28500"></span><span class="number">66</span></li>
      <li class="past" title="Surat Keterangan 2"><span class="bar" data-number="28500"></span><span class="number">66</span></li>
      <li class="past" title="Surat Keterangan 2"><span class="bar" data-number="28500"></span><span class="number">66</span></li>
      <li class="past" title="Surat Keterangan 2"><span class="bar" data-number="28500"></span><span class="number">66</span></li>
      <li class="past" title="Surat Keterangan 2"><span class="bar" data-number="28500"></span><span class="number">66</span></li>


    </ul>
  </div>
    </div>
            </div>
    </div> -->
</div>

</section>

<script type="text/javascript">
$(document).ready(function(){
$('.chart').horizBarChart({
selector: '.bar',
speed: 3000
});
});
</script>

<script type="text/javascript">

  // $(document).ready(function(){
  //   console.log('kaharisman');
  // })

  $(document).ready(function () {
  $('.style_prevu_kit').click(function(){
    id = this.id;
    $('#buat_surat').show();
      //  $('#jenis_surat').slideToggle();
      //   $('#show_jenis_surat').toggle();
      //   $('#hide_jenis_surat').toggle();
  });
  $('.toggle_jenis_surat').click(function(){
     $('#jenis_surat').slideToggle();
     $('#show_jenis_surat').toggle();
     $('#hide_jenis_surat').toggle();
  });
  });
</script>




<style media="screen">
.chart-horiz .chart { width: 90% }
.chart-horiz .chart li {
display: block;
height: 23px;
margin-top: 3px;
position: relative
}

.chart-horiz .chart li:before {
color: #fff;
content: attr(title);
left: 5px;
position: absolute
}

.chart-horiz .chart li.title:before {
color: black;
font-weight: bold;
left: 0
}

.chart-horiz .chart li:first-child { margin-top: 0 }

.chart-horiz .chart li .bar {
background: #27ae60;
height: 100%;
min-width: 164px;
}

.chart-horiz .chart li .number {
color: #FF5722;
font-size: 18px;
font-weight: bold;
padding-left: 5px;
position: absolute;
top: -3px
}

.chart-horiz .chart li.past .bar { background: #27ae60 }

.chart-horiz .chart li.past .number { color: #FF5722 }
</style>
