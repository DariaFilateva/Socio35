<?php


$login = 'socio35';
$password = 'Ka6TSkYtW9YLfRXH';
 if( $curl = curl_init() ) {
  
    curl_setopt($curl, CURLOPT_URL, 'https://xn--80a.xn--e1aj3b.xn--p1ai/api/persons/search?surname=Ефимова&name=Галина&patronymicName=Алексеевна&birthDate=1954-07-03');
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        'Authorization: Basic ' . base64_encode("$login:$password"),
    )
);

    //curl_setopt($curl, CURLOPT_HEADERFUNCTION, 'Authorization: socio35 Ka6TSkYtW9YLfRXH'); http://httpbin.org/get?qwe=rty&a=qqq
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    $out = curl_exec($curl);
    echo $out;
    var_dump($json);
    curl_close($curl);
  }




/*


//require "db.php";
$surname='Ефимова';
$name='Галина';
$patronymicName='Алексеевна';
$birthDate='1954-07-03';
// массив для переменных, которые будут переданы с запросом
$paramsArray = array(
    'surname' => $surname,
    'name' => $name, 
    'patronymicName' => $patronymicName,
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
var_dump($result); // вывод результата
echo $result;

$json = json_decode($result);
var_dump($json);

$count = count($json);
echo 'Count = ' . $count;


*/

