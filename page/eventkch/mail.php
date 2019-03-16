<?php
require "../../libs/db.php";
if ( !R::testConnection() )
{
    exit ('Нет соединения с базой данных');
}
define("CONTACT_FORM", 'xtyr13@yandex.ru');
//define("CONTACT_FORM", 'smm@shotrise.ru');

/**
 * @param $value
 * @return bool
 */
function ValidateEmail($value){
    $regex = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';

    if($value == '') {
        return false;
    } else {
        $string = preg_replace($regex, '', $value);
    }

    return empty($string) ? true : false;
}

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

/**
 * @param $PostArr
 * @param $PostParameter
 * @param $Description
 * @return string
 */
function AddStringMessage_noClear($PostArr, $PostParameter, $Description)
{
    if (isset($PostArr[$PostParameter]) && $PostArr[$PostParameter]) {

        $text = $PostArr[$PostParameter];
        if(isset($Description) && $Description != "") {
            $message = "<p><strong>" . $Description . "</strong>: " . $text . "</p>";
        } else{
            $message = "<p>" . $text . "</p>";
        }

        return $message;
    }
    return "";
}

$post = (!empty($_POST)) ? true : false;

if($post) {



    $sql = 'UPDATE `admin_kch_event` SET `count_member` = `count_member`-1 WHERE `admin_kch_event`.`id` = '.intval($_POST['id']).'';
    R::exec($sql);
    $message ="";
	$theme = $_POST['theme'];
	

    $email = CONTACT_FORM;

    $message .= AddStringMessage($_POST, "theme", "Тема сообщения");
    $message .= AddStringMessage($_POST, "name", "Имя отправителя сообщения");
    $message .= AddStringMessage($_POST, "phone", "Номер телефона отправителя сообщения");
    $message .= AddStringMessage($_POST, "contact", "Телефон или E-mail отправителя сообщения");
    $message .= AddStringMessage($_POST, "text", "Текст сообщения");

    $message = '<html><head><title>' . $theme . '</title></head><body>' . $message . '</body></html>';
    if ($error == '') {
        $mail = mail(CONTACT_FORM, $theme, $message,
            "From: test <" . CONTACT_FORM . ">\r\n"
            . "Reply-To: " . $email . "\r\n"
            . "Content-type: text/html; charset=utf-8 \r\n"
            . "X-Mailer: PHP/" . phpversion());

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
