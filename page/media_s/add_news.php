<?php
  require "db.php";
  $data_n=$_POST;

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


   if( isset($data_n['add_n'])){
      $db = new Database(); 
      $db->connect(); 

      $header = mysql_real_escape_string($data_n['header']);
      $date_n = mysql_real_escape_string($data_n['date_n']);
      $desc = mysql_real_escape_string($data_n['desc']);
      
      $ph = $_FILES['uploadfile']['name'];
      

      // Копируем файл из каталога для временного хранения файлов:
      if ($ph!="")
      {
        // Каталог, в который мы будем принимать файл:
        $uploaddir = '../../img/media_s/news/';
        $uploadfile = $uploaddir.translitText($header).translitText(basename($ph));
        move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile);
        }
    else
      {
        $uploadfile="../../img/media_s/news/newspo.jpg";
      }

      $info=array($header,$date_n,$desc,1,$uploadfile);
      $db->insert('News', $info,"header,date,description,ICondition_id,photo_url");

    }
     else
      {
          echo "Ошибка!\n";
      }


       header('Location: /page/media_s/news.php');
?>