<?php
require "../../libs/db.php";
header( 'Content-Type: text/html; charset=utf-8' );

$sql = "SELECT  * FROM `admin_kch_bank_ideas`";
$project = R::getAll($sql);
//создать в бд и сделать проверку
if(empty($_SESSION['logged_user']))$id_user=0; else $id_user=intval($_SESSION['logged_user']->id);
//var_dump($id_user);
//$id_user=0;
$lkdate=$_SESSION['logged_user'];
$id=$lkdate->id;
$surname=$lkdate->surname;
$name=$lkdate->name;
$namef=$lkdate->patronymic_name;
$tel=$lkdate->tel;
$email=$lkdate->email;
$date=$lkdate->date;
$photo=$lkdate->photo;
$city=$lkdate->city;
$sex=$lkdate->sex;
$job=$lkdate->job;
$k_ch=$lkdate->k_ch;
$ball=$lkdate->ball;
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <title>Социо35</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" media="all" href="/css/main_global.css"/>
    <link rel="stylesheet" media="all" href="/css/popup.css"/>
    <link rel="stylesheet" media="all" href="/css/pages/workshop_ideas.css">
    <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
        <style>
        .button_add_ideas
        {
            margin: 40px 80px 0px;
            margin-bottom:20px;
            display: inline-block;
            border: none;
            color: #fff;
            text-decoration: none;
            background-color: #da251d;
            padding: 10px 35px;
            font-family: Helvetica;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 600;
            border-radius: 2px;
            text-align: center;
            position: relative;
            outline: none;
            transition: background-color .1s ease;
            cursor: pointer; 
        }
    </style>
  </head>
  <body>
    <?php
    include '../../libs/header.php';
    php?>
    <section style="background-repeat: no-repeat;  background-size: cover; margin-bottom:0px; " class="bank_ideas">
    <div style="width: 1200px;background-color: #e8e8e8; " >
    <?php
            switch(UserRoles())
        {
            case 0 : $href='#no_aut'; break;
            case 1 : $href='#add_ideas';  break;
            case 2 : $href='#socio_yes_kch_no'; break;
        }
    echo '<a href="'.$href.'" class="button_add_ideas open_modal" >Добавить идею</a>';
    php?>
     <div id="add_ideas" class="authentication_modal modal_div"><span class="modal_close">X</span>
      <div class="modal-header"> <span>Заявка на участие</span></div>
      <form enctype="multipart/form-data"  class="modal-content js-send-form">
        <div class="content-right" style="width:100%;">
          <lable>Для участия в «Проектной мастерской Команды Череповца» необходимо ознакомиться с <a href="#">правилами.</a></lable>
            <div class="line">
                <input type="checkbox" name="k_ch" class="check"/>
                <lable>Ознакомлен и согласен с правилами участия</lable>
            </div>
            
            <div class="line">
                <lable style="min-width: 50%">ФИО:</lable>
                <?php $age=date("Y-M-D")-$date;
                echo '<lable name="fio">'.$surname.' '.$name.' '.$namef.'</lable>
                <input type="text" value="'.$surname.' '.$name.' '.$namef.'" name="fio" style="display: none;"/>
            </div>
            <div class="line">
                <lable style="min-width: 50%">Возраст:</lable>
                <lable name="god">'.$age.'</lable>
            </div>           
            <div class="line">
                <lable style="min-width: 50%">e-mail:</lable>
                <lable>'.$email.'</lable>
                <input type="text" value="'.$email.'" name="mail" style="display: none;"/>';?>
            </div>            
            <div class="line">
                <lable style="min-width: 50%">Введите номер телефона:</lable>
                <input type="tel" name="tel" style="height: 28px; min-width: 300px" class="none_border"/>
            </div>            
            
            <div class="line">
                <lable style="min-width: 50%">Выберите файл с заявкой:</lable>
                <input type="file" name="photo" style="height: 28px; min-width: 300px" class="none_border"/>
            </div>
            <div class="line">
                <lable style="min-width: 50%">Выберите обложку проекта:</lable>
                <input type="file" name="photo2" style="height: 28px; min-width: 300px" class="none_border"/>
            </div> 
            <div class="line">
                <input type="checkbox" name="k_ch2" class="check"/>
                <lable>Согласен с <a href="#">правилами</a> публикации и модерации сообщений</lable>
            </div>
            <div class="line" style="justify-content: center;">
                <input onclick="reconn();" type="submit" name="btn_registration" class="button" value="Отправить заявку" style="height: 45px; margin-left:0px; min-width: 300px"/>
            </div>
        </div>
      </form>
    </div>
    </div>
    </section>
    <section style="background-repeat: no-repeat;  background-size: cover;margin-top:0px;" class="bank_ideas">
      <div class="wrap-bank_ideas" style="padding-top:0px;">
        <?
            foreach($project as $item)
                {
                    
                    $sql = 'SELECT  * FROM `VoitingUsers` WHERE `id_user_voit`='.$id_user.' AND `id_voit`='.$item['id'].'';
                    $VoitingUsers = R::getAll($sql);
                    //echo $sql;
                    $id_user_voit=$VoitingUsers[0]['id_user_voit'];
                    $id_voit=$VoitingUsers[0]['id_voit'];
                    $rez=$item['voit_yes']+$item['voit_no'];
                    $after='  
                    <div class="voting_after">
                        <div class="title_voting">Поддерживаю идею?</div>
                        <progress max="100" data-value="'.round($item['voit_yes']/($rez/100),1).'" value="'.round($item['voit_yes']/($rez/100),1).'" class="html5"></progress><span> Да '.$item['voit_yes'].'</span>
                        <progress max="100" data-value="'.round($item['voit_no']/($rez/100),1).'" value="'.round($item['voit_no']/($rez/100),1).'" class="html5 mb"></progress><span> Нет '.$item['voit_no'].'</span>
                    </div>';
                    $before='
                    <div class="voting_before">
                        <div class="title_voting">Поддерживаю идею?</div>
                        <button id="btn" onclick="get_voit(\'yes\',\''.$item['id'].'\',\''.$id_user.'\');">Да</button>
                        <button onclick="get_voit(\'no\',\''.$item['id'].'\',\''.$id_user.'\');">Нет</button>
                    </div>';
                    if($id_user==$id_user_voit && $item['id']==$id_voit) $add_str=$after; else $add_str=$before;
                    echo '
                    <div class="item">
                      <div class="cards">
                        <div class="head-cards">
                          <p class="text">'.$item['name_ideas'].'</p>
                        </div>
                        <div class="content-cards">
                          <p class="text">'.iconv_substr ($item['short_description'], 0 , 200 , "UTF-8").'</p>
                        </div>
                      </div>'.$add_str.'</div>';
                }
        ?>
        <!-- <div class="item">
          <div class="cards">
            <div class="head-cards">
              <p class="text">Дворовая футбольная лига</p>
            </div>
            <div class="content-cards">
              <p class="text">Проект будет способствовать популяризации и повышению ценности здорового образа жизни, формированию активной жизненной позиции, профилактике деструктивного поведения несовершеннолетних, созданию условий для занятий детей и молодежи физической культурой и спортом, развитию дворовых видов спорта.</p>
            </div>
          </div>
          <div class="voting_before">
            <div class="title_voting">Поддерживаю идею?</div>
            <button>Да</button>
            <button>Нет</button>
          </div>
          <div style="display: none;" class="voting_after">
            <div class="title_voting"> </div>
            <progress><span></span></progress>
            <progress><span></span></progress>
          </div>
        </div>
        
        
        <div class="item">
          <div class="cards">
            <div class="head-cards">
              <p class="text">Формирование комфортной городской среды</p>
            </div>
            <div class="content-cards">
              <p class="text">Главные цели проекта - создание благоприятной современной городской среды, комплексное благоустройство дворовых территорий и общественное участие череповчан в подобных проектах.</p>
            </div>
          </div>
          <div style="display: none;" class="voting_before">
            <div class="title_voting">Поддерживаю идею?</div>
            <button>Да</button>
            <button>Нет</button>
          </div>
          <div class="voting_after">
            <div class="title_voting">Поддерживаю идею?</div>
            <progress max="100" data-value="67" value="67" class="html5"></progress><span>Да 124</span>
            <progress max="100" data-value="33" value="33" class="html5 mb"></progress><span>Нет 46</span>
          </div>
        </div>
        <div class="item">
          <div class="cards">
            <div class="head-cards">
              <p class="text">Построим площадку вместе</p>
            </div>
            <div class="content-cards">
              <p class="text">Проект направлен на детей. Сделаем площадку для детей и они будут рады. Ура-ура.</p>
            </div>
          </div>
          <div class="voting_before">
            <div class="title_voting">Поддерживаю идею?</div>
            <button>Да</button>
            <button>Нет</button>
          </div>
          <div style="display: none;" class="voting_after">
            <div class="title_voting"> </div>
            <progress><span></span></progress>
            <progress><span></span></progress>
          </div>
        </div>
        <div class="item">
          <div class="cards">
            <div class="head-cards">
              <p class="text">Подарим старикам время</p>
            </div>
            <div class="content-cards">
              <p class="text">Цель проекта устроить развлекательную программу для бабушек и дедушек.</p>
            </div>
          </div>
          <div style="display: none;" class="voting_before">
            <div class="title_voting">Поддерживаю идею?</div>
            <button>Да</button>
            <button>Нет</button>
          </div>
          <div class="voting_after">
            <div class="title_voting">Поддерживаю идею?</div>
            <progress max="100" data-value="67" value="67" class="html5"></progress><span>Да 124</span>
            <progress max="100" data-value="33" value="33" class="html5 mb"></progress><span>Нет 46</span>
          </div>
        </div>
              </div> -->
    </section>
     <?php
    include '../../libs/footer.php';
    php?>
    
    
    <script src="/js/all.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/popup.js"></script>
    <script src="/js/lib_calendar.js"></script>
    <script src="/js/calendar_eventkch.js"></script>
    <script>
        function get_voit(golos,id_voit,id_user)
        {
            var arrJson={};
            arrJson['golos']=golos;
            arrJson['id_voit']=id_voit;
            arrJson['id_user']=id_user;
            var myJsonString = JSON.stringify(arrJson);
            //alert(myJsonString);
            $.ajax({
        		url: 'https://www.socio35.ru/page/workshop_ideas/add_voit.php',
        		data: myJsonString,
        		//data: '{"status":false}',
        		type: 'POST',
        		//dataType: 'JSON',
        		success : function(data){
        			var data = JSON.parse(data);
        			//alert(data['status']);
        			location.replace("https://www.socio35.ru/page/workshop_ideas/bank_ideas.php");
        
        		},
        		error: function(data){
        		//	alert("er");
        		}
        	});
        	
        	//$.post('https://www.socio35.ru/page/workshop_ideas/add_voit.php',myJsonString);
        }
    </script>
        <script>
        $('.js-send-form').submit(function(){
	var that = $(this);
var dataR = new FormData(jQuery('.js-send-form')[0]);
	$.ajax({
		url: 'https://www.socio35.ru/page/workshop_ideas/mail.php',
		data: dataR,//that.serialize(),
		type: 'POST',
		//enctype: 'multipart/form-data',
		cache: false,
		processData: false,
        contentType: false,
		success : function(data){
			var data = JSON.parse(data);
			that[0].reset();
		},
		error: function(data){
		    
		}
	})


	return false;
})
    function reconn()
    {
        
        location.replace("https://www.socio35.ru/page/workshop_ideas/bank_ideas.php");
    }
    </script>
  </body>
</html>