<?php
include "header.php";
if (!isset($_SESSION['user']) && !isset($_SESSION['pwd'])) {
  header('location:./');
}
?>

<script src="jquery-latest.js"></script>
<script>
  $(document).ready(function() {
    setInterval(function() {
      $('#responsecontainer').load('data.php');
    }, 1000);
  });
</script>

<!-- Begin page content -->
<div class="container">

  <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>

  <div id="responsecontainer">

  </div>
</div>

<?php include "footer.php"; ?>