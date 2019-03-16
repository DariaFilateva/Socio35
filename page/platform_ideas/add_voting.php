<?php
  require "db.php";
  $data=$_POST;
  //$pr_id=(int)$_GET['id'];

   if( isset($data['add_vot']))
   {
    $db = new Database();
    $db->connect();

    // print_r($data);
    // echo '<br>';


    $quest = mysql_real_escape_string($data['quest']);

    $var = array();

    $n = count($data) - 1;
    $key = array_keys($_POST);
    for($i=1; $i < $n; $i++){
      $temp = $i -1;
         $var[$temp] = mysql_real_escape_string($data[$key[$i]]);
    }

    // print_r($var);

    $date_start = date("Y-m-d H:i:s");
    $date_end = date("Y-m-d H:i:s", strtotime("+5 days"));


    $info=array($quest, 2, $date_start, $date_end, 1);

    $db->insert('Voting', $info, "question, user_id, date_start, date_end, icondition_id");

    $db->select('Voting','voting_id','question="'.$quest.'" AND date_start="'.$date_start.'"');
    $temp = $db->getResult();
    $vote_id = $temp['voting_id'];

    foreach($var as $variant)
    {
      $v = array($vote_id, $variant);
      $db->insert('Variant', $v, "voting_id, answer");
    }

    // $variant1 = array($vote_id, $var1);
    // $variant2 = array($vote_id, $var2);

    // $db->insert('Variant', $variant1, "voting_id, name");
    // $db->insert('Variant', $variant2, "voting_id, name");

    }
     else
      {
          echo "Error!\n";
      }

    header("Location: /page/platform_ideas/voting.php");
?>