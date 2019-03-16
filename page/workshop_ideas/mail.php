<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//require "../../libs/PHPMailer/Exception.php";
//require "../../libs/PHPMailer/OAuth.php";
//require "../../libs/PHPMailer/PHPMailer.php";
//require "../../libs/PHPMailer/POP3.php";
//require "../../libs/PHPMailer/SMTP.php";

require '../../libs/PHPMailer/PHPMailerAutoload.php';

require "../../libs/db.php";
if ( !R::testConnection() )
{
    exit ('Нет соединения с базой данных');
}
define("CONTACT_FORM", 'xtyr13@yandex.ru');



/**
 * @param $PostArr
 * @param $PostParameter
 * @param $Description
 * @return string
 */
function AddStringMessage($PostArr, $PostParameter, $Description)
{
    if (isset($PostArr[$PostParameter]) && $PostArr[$PostParameter]) {

        $text = htmlspecialchars($PostArr[$PostParameter]);
        if(isset($Description) && $Description != "") {
            $message = "<p><strong>" . $Description . "</strong>: " . $text . "</p>";
        } else{
            $message = "<p>" . $text . "</p>";
        }

        return $message;
    }
    return "";
}

//photo-заявка
//photo2-обложка
 // Если поле выбора вложения не пустое - закачиваем его на сервер 
function SendToServer($name){
    $picture="";
  if (!empty($_FILES[$name]['tmp_name'])) 

  { 

    // Закачиваем файл 

    $path = $_FILES[$name]['name']; 

    if (copy($_FILES[$name]['tmp_name'], $path)) $picture = $path; 

  } 
    return $picture;
}


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


function send_mail($to, $thm, $html, $path){ 
    $fp = fopen($path,"r"); 
    if (!$fp) 
    { 
      print "Файл $path не может быть прочитан"; 
      exit(); 
    } 
    $file = fread($fp, filesize($path)); 
    fclose($fp); 
    $boundary = "--".md5(uniqid(time())); // генерируем разделитель 
    $headers .= "MIME-Version: 1.0\n"; 
    $headers .="Content-Type: multipart/mixed; boundary=\"$boundary\"\n"; 
    $multipart .= "--$boundary\n"; 
    $kod ='utf-8';// 'koi8-r'; // или $kod = 'windows-1251'; 
    $multipart .= "Content-Type: text/html; charset=$kod\n"; 
    $multipart .= "Content-Transfer-Encoding: Quot-Printed\n\n"; 
    $multipart .= "$html\n\n"; 
    $message_part = "--$boundary\n"; 
    $message_part .= "Content-Type: application/octet-stream\n"; 
    $message_part .= "Content-Transfer-Encoding: base64\n"; 
    $message_part .= "Content-Disposition: attachment; filename = \"".$path."\"\n\n"; 
    $message_part .= chunk_split(base64_encode($file))."\n"; 
    $multipart .= $message_part."--$boundary--\n"; 
    
   if(!mail($to, $thm, $multipart, $headers)) 

    { 

      echo "К сожалению, письмо не отправлено"; 

      exit(); 

    } 

  } 




$post = (!empty($_POST)) ? true : false;

//send mail
if($post) {


    //$message = SendToServer($_POST['photo']);
	$theme = $_POST['theme']="Предложенная идея из банка идей";
	

    $email = CONTACT_FORM;

    $message .= AddStringMessage($_POST, "theme", "Тема сообщения");
    $message .= AddStringMessage($_POST, "fio", "Имя отправителя сообщения");
    $message .= AddStringMessage($_POST, "tel", "Номер телефона отправителя сообщения");
    $message .= AddStringMessage($_POST, "mail", "Телефон или E-mail отправителя сообщения");
    $message .= AddStringMessage($_POST, "text", "Текст сообщения");

    $message = '<html><head><title>'. $theme."gggggg".'</title></head><body>'.$message.'</body></html>';
    if ($error == '') {
       /* $mail = mail(CONTACT_FORM, $theme, $message,
            "From: test <" . CONTACT_FORM . ">\r\n"
            . "Reply-To: " . $email . "\r\n"
            . "Content-type: text/html; charset=utf-8 \r\n"
            . "X-Mailer: PHP/" . phpversion());*/
        
      //$mail= 
     // send_mail(CONTACT_FORM, $theme, $message, "http://www.admin.socio35.ru/img/s2.jpg");

        $mail = new PHPMailer();
        //$mail->setFrom('xtyrsssssss@yandex.ru', 'First Last');
        $mail->addAddress('xtyr13@yandex.ru', 'John Doe');
        $mail->Subject = $theme;
        $mail->msgHTML($message);
            // Attach uploaded files
        //$mail->AddAttachment('/../../img/1.png','new.png');
        //$mail->addAttachment('/../../img/1.png','new.png');
        $mail->addAttachment($_FILES['photo']['tmp_name'],$_FILES['photo']['name']);
        $mail->addAttachment($_FILES['photo2']['tmp_name'],$_FILES['photo']['name']);
        //$mail->addAttachment($_FILES['photo']);
        
        $r = $mail->send();

        if($mail){
            $response = array(
                'status' => true, 
                'replay' => $_POST['replay']);
        } else {
            $response = array('status' => false,
            'replay' => 'error' );
        }

        echo json_encode($response); 
        
    }
//header('Location: /');
//echo '<script>location.replace("https://www.socio35.ru/page/eventkch/eventkch.php");</script>'; exit; 
}
