<?php
include 'koneksi.php';
include "header.php";
if (!isset($_SESSION['user']) && !isset($_SESSION['pwd'])) {
    header('location:index.php');
}

$tgl =  mysqli_query($konek, "SELECT date FROM vanamei GROUP BY date");

while ($y = mysqli_fetch_array($tgl)) {
    $p = explode('/', $y[0]);
    $bulan[] = $p[1];
    $tahun[] = $p[2];
}
$bulan = array_unique($bulan);
$tahun = array_unique($tahun);
?>
<!-- Begin page content -->
<div class="container">
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>

    <div class="card mb-12">
        <div class="card-header text-center">
            <h4>Laporan</h4>
        </div>
        <div class="card-body">
            <form action="cetak_laporan.php" method="post">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <select class="form-control" name="bln">
                                <option selected disabled value="">Pilih Bulan</option>
                                <?php foreach ($bulan as $b) :
                                    switch ($b) {
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
                                    <option value="<?= $b ?>"><?= $plh ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control" name="thn">
                                <option selected disabled value="">Pilih Tahun</option>
                                <?php foreach ($tahun as $t) : ?>
                                    <option value="<?= $t ?>"><?= $t ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="limit" placeholder="Masukan Limit Data .....">
                        </div>
                        <button type="submit" class="btn btn-dark cl">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include "footer.php"; ?>