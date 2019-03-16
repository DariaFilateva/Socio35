<?php
    require "db.php";
header( 'Content-Type: text/html; charset=utf-8' );
    $user_data = $_POST;
    $destination = '../img/avatars/'; 
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

    if( isset($user_data['btn_registration'])){

        $surname = $user_data["surname"];
        $name = $user_data["name"];
        $patronymic_name = $user_data["patronymic_name"];
        $tel = $user_data["tel"];
        $email = $user_data["email"];
        $password = $user_data["password"];
        $password_req = $user_data["password_req"];
        $date = $user_data["date"];
        //$photo = '';//$user_data["photo"];
        $k_ch = (isset($user_data["k_ch"]))?1:0;
        
         $file = translitText($_FILES['photo']['name']);
        if ($file != "")
           {
                //Каталог, в который мы будем принимать файл:
                //$uploaddir = '../../img/platform_ideas/projects_img/';
                    $mail = explode("@",$email);
                    //echo $mail[0];
                $photo = $destination.$mail[0].basename($file);
                //$photo =substr($photo, 3);
                // Копируем файл из каталога для временного хранения файлов:
                if(!move_uploaded_file($_FILES['photo']['tmp_name'], $photo))
                {
                  $photo = "";
                }
            }
            else
            {
                $photo = "";
            }
        
        
        $error_list = array();

           
            if( R::count('users', "email = ?", array($user_data['email']))> 0 ){
                $error_list[]='Пользователь с таким e-mail уже существует';
            }
            if($password != $password_req){
                $error_list[]='Пароли не совпадают';
            }
            
            
            
            //////////////////запрос к кче
        $birthDate=$date;
        // массив для переменных, которые будут переданы с запросом
$paramsArray = array(
    'surname' => $surname,
    'name' => $name, 
    'patronymicName' => $patronymic_name,
    'birthDate' => $birthDate //date("y.m.d") 
    );
 // преобразуем массив в URL-кодированную строку
$vars = http_build_query($paramsArray);
// создаем параметры контекста
$apiUrl = 'https://xn--80a.xn--e1aj3b.xn--p1ai/api/persons/search';
$login = 'socio35';
$password = 'Ka6TSkYtW9YLfRXH';
$options = array(
    'http' => array(  
                'method' => 'GET',  // метод передачи данных
                'header' => 'Authorization: Basic ' . base64_encode("$login:$password"),
            ) 
);  
$context = stream_context_create($options);  // создаём контекст потока
$result = file_get_contents($apiUrl . '?' . $vars, false, $context); //отправляем запрос http://httpbin.org/get?qwe=rty&a=qqq

//var_dump($result); // вывод результата
//echo $result;

$json = json_decode($result);
//var_dump($json);

$count = count($json);


        if($k_ch==1) 
        {
            if($count==1) {$status_kch;
               
                //пользователь в кче, отправить их это
                $id = $json[0]->ID;
                $paramsArray = array('id' => $id);
                $vars = http_build_query($paramsArray);
                $apiUrl = 'https://xn--80a.xn--e1aj3b.xn--p1ai/api/persons/register';

                $options = array(
                    'http' => array(
                    'method' => 'POST',
                    'header' => 'Authorization: Basic ' . base64_encode("$login:$password"),
                                    )
                                );
                $context = stream_context_create($options);
                $result = file_get_contents($apiUrl . '?' . $vars, false, $context);
                
                
            }
            else{

                if($count>1) $error_list[]='В команде череповца найдено несколько человек с такими данными, свяжитесь с администрацией';
                else $error_list[]='Такой пользователь не найден в команде череповца';
            }
        }
        
/////////////////////////////////////////////////////////////////
            
            
            
            
            

            if (empty($error_list)) {

                $new_user = R::dispense('users');

                $new_user->surname = $surname;
                $new_user->name = $name;
                $new_user->patronymic_name = $patronymic_name;
                $new_user->tel = $tel;
                $new_user->email = $email;
                //$new_user->password = password_hash($password, PASSWORD_DEFAULT);
                $new_user->password = md5($user_data["password"]);
                $new_user->date = $date;
                $new_user->photo = $photo;
                $new_user->k_ch = $k_ch;

                R::store($new_user);

                header('Location: /');
            }
            else {
                echo '<div style="color: red; text-align: center; background-color: azure;">'.array_shift($error_list).'<BR><a href="/">Вернутся назад</a></div><hr>';
            }
    }

php?>