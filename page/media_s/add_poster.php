<?php
  require "db.php";
  $data_pos=$_POST;

      function translitText($str) 
{
    $tr = array(
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ё"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
    );
    return strtr($str,$tr);
}


   if( isset($data_pos['add_pos'])){
      $db = new Database(); 
      $db->connect(); 

      $header = mysql_real_escape_string($data_pos['header']);
      $date_pol = mysql_real_escape_string($data_pos['date_pol']);
      $place_pos = mysql_real_escape_string($data_pos['place_pos']);

      $po = $_FILES['add_img']['name'];
      if ($po!="")
      {
        // Каталог, в который мы будем принимать файл:
        $uploaddir = '../../img/media_s/poster/';
        $add_img = $uploaddir.translitText($header).translitText(basename($po));
        move_uploaded_file($_FILES['add_img']['tmp_name'], $add_img);
        }
    else
      {
        $add_img="../../img/media_s/poster/posterpo.png";
      }

      $db->select('Place','*','name=\''.$place_pos.'\'');
      $idpl1 = $db->getResult();
      $idpl=$idpl1[place_id];

      $info=array($header,$idpl,$date_pol,1,$add_img);
      $db->insert('Poster', $info,"name,place_id,date,ICondition_id,photo_url");
    }
     else
      {
          echo "Ошибка!\n";
      }


       header('Location: /page/media_s/posters.php');
?>