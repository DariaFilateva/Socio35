<?php

	if(isset($_GET['pr2'])){
  $date_end = date("Y-m-d", strtotime("-1 month"));}


    header('Location: /page/media_s/report.php?pr2='.$date_end);
?>