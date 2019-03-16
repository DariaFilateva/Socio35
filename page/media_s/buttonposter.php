<?php

	if(isset($_GET['pa2'])){
  $date_end = date("Y-m-d", strtotime("+1 month"));}


    header('Location: /page/media_s/posters.php?pa2='.$date_end);
?>