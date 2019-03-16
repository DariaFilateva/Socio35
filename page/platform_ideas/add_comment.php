<?php
  require "db.php";
  $data=$_POST;
  $pr_id=(int)$_GET['id'];

   if( isset($data['add_com']))
   {
    $db = new Database();
    $db->connect();

    $guest=array(mysql_real_escape_string($data['name']),mysql_real_escape_string($data['email']));

    $db->select('Guest','count(guest_id) as gid','name="'.$guest[0].'" AND email="'.$guest[1].'"');
    $temp = $db->getResult();
    $count = $temp['gid'];

    if ($count == 0)
    {
      $db->insert('Guest', $guest, "name, email");
    }

    $db->select('Guest','guest_id','name="'.$guest[0].'" AND email="'.$guest[1].'"');
    $temp = $db->getResult();
    $g_id = $temp['guest_id'];

    $date = date("Y-m-d H:i:s");

    $info=array(2, $g_id, $pr_id, $date, mysql_real_escape_string($data['content']));

    $db->insert('Comment', $info, "user_id, guest_id, id, comment_date, content");
    }
     else
      {
          echo "Error!\n";
      }

    header("Location: /page/platform_ideas/project.php?id=".$pr_id);
?>