<?php
include 'koneksi.php';
include "header.php";

$bulan = $_POST['bln'];
$tahun = $_POST['thn'];
$limit = $_POST['limit'];
$kd_print = $bulan . $tahun;
?>
<!-- Begin page content -->
<div class="container">
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>

    <div class="card mb-12">
        <div class="card-header text-center">
            <h4>Riwayat Data Monitoring</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-stripped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class='text-center'>No</th>
                            <th class='text-center'>Tanggal</th>
                            <th class='text-center'>Waktu</th>
                            <th class='text-center'>Salinitas (ppt)</th>
                            <th class='text-center'>pH air (pH)</th>
                            <th class='text-center'>temperatur (&deg;C)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sqlAdmin = mysqli_query($konek, "SELECT date,time,ph,temp,ppm,id FROM vanamei WHERE kd_print='$kd_print' ORDER BY id DESC LIMIT 0,$limit");
                        while ($data = mysqli_fetch_array($sqlAdmin)) {
                        ?>
                            <tr>
                                <td>
                                    <center><?= $no++; ?></center>
                                </td>
                                <td>
                                    <center><?= $data['date']; ?></center>
                                </td>
                                <td>
                                    <center><?= $data['time']; ?></center>
                                </td>
                                <td>
                                    <center><?= $data['ppm'] ?></center>
                                </td>
                                <td>
                                    <center><?= $data['ph'] ?></center>
                                </td>
                                <td>
                                    <center><?= $data['temp'] ?></center>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include "footer.php"; ?>

<script>
    window.print();
</script>