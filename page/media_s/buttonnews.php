<?php

	if(isset($_GET['p2'])){
  $date_end = date("Y-m-d", strtotime("-1 month"));}


    header('Location: /page/media_s/news.php?p2='.$date_end);
?>