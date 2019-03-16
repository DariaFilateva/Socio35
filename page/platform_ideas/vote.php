<?php
  require "db.php";
  $data=$_POST;
  $vote_id=(int)$_GET['id'];
  $ip_s = $_SERVER['REMOTE_ADDR']; 

   if( isset($data['vote']))
   {
    $db = new Database();
    $db->connect();


    $var_id = (int)$data['name'.$vote_id];

    $db->select('Variant','variant_result','variant_id='.$var_id);
    $var_res = $db->getResult();
    $var_res['variant_result']++;

    $where = array('variant_id='.$var_id);

    $db->update('Variant', $var_res, $where, '');

    $ip = sprintf('%u', ip2long($ip_s));
    $date = date("Y-m-d H:i:s");

    $info = array($vote_id, $ip, $date);
    $db->insert('IP_voting', $info, 'voting_id, ip, date_ip');

    }
     else
      {
          echo "Error!\n";
      }

    header("Location: /page/platform_ideas/voting.php");
?>