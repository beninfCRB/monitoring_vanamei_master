<?php
include "koneksi.php";
?>

<?php
$tgl = mysqli_query($konek, "SELECT date FROM vanamei ORDER BY id DESC LIMIT 1");
$x_tanggal  = mysqli_query($konek, 'SELECT time FROM ( SELECT * FROM vanamei ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
$y_ph   = mysqli_query($konek, 'SELECT ph FROM ( SELECT * FROM vanamei ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
$y_temp  = mysqli_query($konek, 'SELECT temp FROM ( SELECT * FROM vanamei ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
$y_ppm  = mysqli_query($konek, 'SELECT ppm FROM ( SELECT * FROM vanamei ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
$ppm = mysqli_query($konek, "SELECT ppm FROM vanamei ORDER BY id DESC LIMIT 1");
$ph = mysqli_query($konek, "SELECT ph FROM vanamei ORDER BY id DESC LIMIT 1");
$temp = mysqli_query($konek, "SELECT temp FROM vanamei ORDER BY id DESC LIMIT 1");
$tgl = mysqli_fetch_assoc($tgl);
$t_ppm = mysqli_fetch_assoc($ppm);
$t_ph = mysqli_fetch_assoc($ph);
$t_temp = mysqli_fetch_assoc($temp);
$tgl = explode('/', $tgl['date']);
switch ($tgl[1]) {
  case 1:
    $plh = "Januari";
    break;
  case 2:
    $plh = "Februari";
    break;
  case 3:
    $plh = "Maret";
    break;
  case 4:
    $plh = "April";
    break;
  case 5:
    $plh = "Mei";
    break;
  case 6:
    $plh = "Juni";
    break;
  case 7:
    $plh = "Juli";
    break;
  case 8:
    $plh = "Agustus";
    break;
  case 9:
    $plh = "September";
    break;
  case 10:
    $plh = "Oktober";
    break;
  case 11:
    $plh = "November";
    break;
  case 12:
    $plh = "Desember";
    break;

  default:
    $plh = "Januari";
    break;
}
?>
<div class="col-lg-12">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body text-center bg-success text-white">
          <h2>Salinitas</h2>
          <h1><?= $t_ppm['ppm'] ?></h1>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center bg-danger text-white">
          <h2>Ph</h2>
          <h1><?= $t_ph['ph'] ?></h1>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center bg-primary text-white">
          <h2>Temperatur</h2>
          <h1><?= $t_temp['temp'] ?></h1>
        </div>
      </div>
    </div>

    <div class="col-md-9">
      <div class="card">
        <div class="card-header bg-primary">
          <div class="row text-white">
            <div class="col-md-4">
              <h4>Grafik Parameter</h4>
            </div>
            <div class="col-md-4 ml-auto">
              <h4><?= $tgl[0] . ' ' . $plh . ' ' . $tgl[2]; ?></h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <canvas id="myChart"></canvas>
          <script>
            var canvas = document.getElementById('myChart');
            var data = {
              labels: [<?php foreach ($x_tanggal as $b) {
                          echo '"' . $b['time'] . '",';
                        } ?>],
              datasets: [{
                  label: "Salinitas",
                  fill: true,
                  lineTension: 0.1,
                  backgroundColor: "rgb(57, 255, 20, .2)",
                  borderColor: "rgb(57, 255, 20)",
                  borderCapStyle: 'butt',
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderJoinStyle: 'miter',
                  pointBorderColor: "rgb(57, 255, 20)",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgb(57, 255, 20)",
                  pointHoverBorderColor: "rgb(57, 255, 20)",
                  pointHoverBorderWidth: 2,
                  pointRadius: 5,
                  pointHitRadius: 10,
                  data: [<?php foreach ($y_ppm as $b) {
                            echo  $b['ppm'] . ',';
                          } ?>],
                },
                {
                  label: "pH Air",
                  fill: true,
                  lineTension: 0.1,
                  backgroundColor: "rgba(235, 9, 9, .1)",
                  borderColor: "rgba(235, 9, 9, 1)",
                  borderCapStyle: 'butt',
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderJoinStyle: 'miter',
                  pointBorderColor: "rgba(200, 99, 132, .7)",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(200, 99, 132, .7)",
                  pointHoverBorderColor: "rgba(200, 99, 132, .7)",
                  pointHoverBorderWidth: 2,
                  pointRadius: 5,
                  pointHitRadius: 10,
                  data: [<?php foreach ($y_ph as $b) {
                            echo  $b['ph'] . ',';
                          } ?>],
                },
                {
                  label: "Temperatur Air",
                  fill: true,
                  lineTension: 0.1,
                  backgroundColor: "rgba(0, 10, 130, .7)",
                  borderColor: "rgba(0, 10, 130, 7)",
                  borderCapStyle: 'butt',
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderJoinStyle: 'miter',
                  pointBorderColor: "rgba(0, 10, 130, 7)",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(0, 10, 130, 7)",
                  pointHoverBorderColor: "rgba(0, 10, 130, 7)",
                  pointHoverBorderWidth: 2,
                  pointRadius: 5,
                  pointHitRadius: 10,
                  data: [<?php foreach ($y_temp as $b) {
                            echo  $b['temp'] . ',';
                          } ?>],
                },
              ]
            };

            var option = {
              showLines: true,
              animation: {
                duration: 0
              }
            };

            var myLineChart = Chart.Line(canvas, {
              data: data,
              options: option
            });
          </script>
        </div>
      </div>
    </div>