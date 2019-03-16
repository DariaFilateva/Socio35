<?php
  require "db.php";
  $data=$_POST;
  $destination = '../../img/platform_ideas/projects_img/';

  echo $_FILES['parameter']['tmp_name'];

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

   if( isset($data['add_pr']))
   {

    $db = new Database();
     $db->connect();

    $head = mysql_real_escape_string($data['head']);
    $desc = mysql_real_escape_string($data['desc']);

      

      $file = translitText($_FILES['uploadfile']['name']);

      // echo $file;

      if ($file != "")
      {
        // Каталог, в который мы будем принимать файл:
      // $uploaddir = '../../img/platform_ideas/projects_img/';
      $uploadfile = $destination.translitText($head).basename($file);
        // Копируем файл из каталога для временного хранения файлов:
        if(!move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile))
        {
          $uploadfile = "";
        }
      }
      else
      {
        $uploadfile = "";
      }

      // echo $uploadfile;



      $info=array(1, 1, $head, 1, $desc, $desc, $uploadfile);

      $db->insert('admin_kch_bank_ideas', $info,"condition_id, type_idea, name_ideas, status, short_description,  full_description, url_file");
    }
     else
      {
          echo "Error!\n";
      }

       header("Location: /page/platform_ideas/projects.php");
?>