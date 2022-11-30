<?php
include 'header.php';
include 'koneksi/koneksi.php';
$RPL = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='RPL'"));
$MM = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='MM'"));
$MP = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='MP'"));
$AKL = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='AKL'"));
$BDP = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='BDP'"));
$PKM = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='PKM'"));
?>
<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row" style="display: inline-block;">
    <div class="tile_count">
      <div class="col-md-2 col-4  tile_stats_count">
        <span class="count_top "><i class="fa fa-user"></i> RPL</span>
        <div class="count pr-5"><?= $RPL; ?></div>
      </div>
      <div class="col-md-2 col-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> DKV</span>
        <div class="count"> <?= $MM; ?></div>
      </div>
      <div class="col-md-2 col-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> MP</span>
        <div class="count"> <?= $MP; ?></div>
      </div>
      <div class="col-md-2 col-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> AKL</span>
        <div class="count"> <?= $AKL; ?></div>
      </div>
      <div class="col-md-2 col-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> BDP</span>
        <div class="count"> <?= $BDP; ?></div>
      </div>
      <div class="col-md-2 col-4  tile_stats_count">
        <span class="count_top "><i class="fa fa-user"></i> PKM</span>
        <div class="count pr-5"> <?= $PKM; ?></div>
      </div>
    </div>
  </div>
  <!-- /top tiles -->
  <br />

  <div class="row">


    <div class="col-md-5 col-sm-5 ">
      <div class="x_panel tile fixed_height_320">
        <div class="x_title">
          <h2>App Versions</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
              </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <h4>App Usage across versions</h4>
          <div class="widget_summary">
            <div class="w_left w_25">
              <span>0.1.5.2</span>
            </div>
            <div class="w_center w_55">
              <div class="progress">
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>
            </div>
            <div class="w_right w_20">
              <span>123k</span>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="widget_summary">
            <div class="w_left w_25">
              <span>0.1.5.3</span>
            </div>
            <div class="w_center w_55">
              <div class="progress">
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>
            </div>
            <div class="w_right w_20">
              <span>53k</span>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="widget_summary">
            <div class="w_left w_25">
              <span>0.1.5.4</span>
            </div>
            <div class="w_center w_55">
              <div class="progress">
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>
            </div>
            <div class="w_right w_20">
              <span>23k</span>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="widget_summary">
            <div class="w_left w_25">
              <span>0.1.5.5</span>
            </div>
            <div class="w_center w_55">
              <div class="progress">
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>
            </div>
            <div class="w_right w_20">
              <span>3k</span>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="widget_summary">
            <div class="w_left w_25">
              <span>0.1.5.6</span>
            </div>
            <div class="w_center w_55">
              <div class="progress">
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>
            </div>
            <div class="w_right w_20">
              <span>1k</span>
            </div>
            <div class="clearfix"></div>
          </div>

        </div>
      </div>
    </div>

    <div class="col-md-5 col-sm-5 ">
      <div class="x_panel tile fixed_height_320 overflow_hidden">
        <div class="x_title">
          <h2>Presentase Siswa</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
              </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="" style="width:100%">
            <tr>
              <th style="width:37%;">
                <p>Presentase</p>
              </th>
              <th>
                <div class="col-lg-7 col-md-7 col-sm-7 ">
                  <p class="">Jurusan</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 ">
                  <p class="">Progress</p>
                </div>
              </th>
            </tr>
            <tr>
              <td>
                <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
              </td>
              <td>
                <table class="tile_info">
                  <tr>
                    <td>
                      <p><i class="fa fa-square blue"></i>DKV </p>
                    </td>
                    <td>30%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square green"></i>BDP </p>
                    </td>
                    <td>10%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square purple"></i>AKL </p>
                    </td>
                    <td>20%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square aero"></i>MP </p>
                    </td>
                    <td>15%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square red"></i>RPL </p>
                    </td>
                    <td>15%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square Gold"></i>PKM </p>
                    </td>
                    <td>15%</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /page content -->

<?php
include 'footer.php';
?>