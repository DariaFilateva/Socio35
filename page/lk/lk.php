<?php
require "../../libs/db.php";

if ( !R::testConnection() )
{
    exit ('Нет соединения с базой данных');
}
//var_dump($_SESSION['logged_user']);
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
<!-- - var nameServices = 'ЛК';--><!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <base href="/"/>
    <title>Социо35</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" media="all" href="/css/main_global.css"/>
    <link rel="stylesheet" media="all" href="/css/popup.css"/>
    <link rel="stylesheet" media="all" href="/css/pages/leisure_and_tourist.css">
    <link rel="stylesheet" media="all" href="/css/pages/lk.css">
    <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php
    include '../../libs/header.php';
    php?>
    <section style="background:#ffffff; background-repeat: no-repeat;  background-size: cover;" class="lat_services">
      <div class="lk">
        <div class="wrap">
          <div class="link">
            <div style="background-color: #DA251D;" class="prof-link textlk"><span style="color: #fff;">Мой профиль</span></div>
          </div>
          <div class="link">
            <div class="projectkch-link textlk"><span>Проектная мастерская</span></div>
          </div>
          <div class="link">
            <div class="ekosh-link textlk"><span>Кошелёк</span></div>
          </div>
        </div>
        <div class="div_flex">
          <?php echo '<div style="display:none;" class="content ekosh"><span>Количество баллов:<span>'.$ball.'</span></span>';?>
            <hr>
            <p class="text-content">Электронные кошельки имеют только члены Команды Череповца. Зарабатывая баллы, Вы имеете возможность обменять их на различного рода<a href="#" class="red-link"><span class="red-link-s">призы</span></a></p>
            <p class="text-content">За что начисляются баллы, вы можете узнать в следующем<a href="#" class="red-link"><span class="red-link-s">разделе</span></a></p>
            <div class="wrap">
              <button class="ball" hidden>ОБМЕНЯТЬ БАЛЛЫ</button>
            </div>
          </div>
          <div style="display:none;" class="content"></div>
          <div class="content prof">
            <div class="wrap wr">
                <?php if(empty($photo)){
              echo '<div class="avatar"><span>'.substr($name,0,-(strlen($name)-2)).'</span></div>';}
              else {
              echo '<div class="avatar"><span style="border-radius:50%;width: 100px;height: 100px;background:url(https://www.socio35.ru/'.$photo.'); background-repeat: no-repeat;  background-size: cover;"></span></div>';}?>
              <?php echo '<div class="discr">';
                echo '<p class="discr-fio">'.$surname.' '.$name.'</p>';
                echo '<p class="discr-email">'.$email.'</p>';
                echo '<p class="discr-email">'.$tel.'</p>';?>
              </div>
              <div class="izm">
                <button class="sett" hidden>ИЗМЕНИТЬ</button>
                <button style="display:none;" class="sett">СОХРАНИТЬ</button>
              </div>
            </div>
            <hr>
            <div class="cont">
              <p class="text-content-set">Откуда:</p>
              <div class="change">
                <?php echo '<p class="personaldate">'.$city.'</p>';?>
                <input style="display:none;">
              </div>
            </div>
            <div class="cont">
              <p class="text-content-set">Пол:</p>
              <div class="change">
                <?php echo '<p class="personaldate">'.$sex.'</p>';?>
                <input style="display:none;">
              </div>
            </div>
            <div class="cont">
              <p class="text-content-set">Возраст:</p>
              <div class="change">
                <?php $age=date("Y-M-D")-$date;
                echo '<p class="personaldate">'.$age.'</p>';?>
                <input style="display:none;">
              </div>
            </div>
            <div class="cont">
              <p class="text-content-set">Род занятости:</p>
              <div class="change">
                <?php echo '<p class="personaldate">'.$job.'</p>';?>
                <input style="display:none;">
              </div>
            </div>
            <div class="cont">
              <p class="text-content-set">Команда Череповца:</p>
              <div class="change">
                <?php if($k_ch==1){
                echo '<p class="personaldate">Член команды</p>';}
                else {echo '<p class="personaldate">Не член команды</p>';}?>
              </div>
            </div>
          </div>
          <?php if($k_ch==1){
          echo '<div style="display:none;" class="content projectkch">
            <p class="text-content">Здесь Вы можете просматривать свои идеи и проекты, как член команды Череповца. Видеть на какой они стадии и какой у них статус.</p>
            <div class="wrap">
              <a class="ball" href="https://xn--80aaahiha9aslihmm8gj.xn--p1ai/" target="_blank" style="text-decoration: none;" hidden>ЗАРЕГИСТРИРОВАТЬСЯ</a>
            </div>
            <hr>
            <div class="project">
              <div style="background: url(../../img/lk/1.png);" class="pro-img"><a href="#" class="title">Самый лучший проект Череповца</a></div>
              <div style="background: url(../../img/lk/2.png);" class="pro-img"><a href="#" class="title">Благотворительный марафон "Я помогаю детям Череповца"</a></div>
              <div style="background: url(../../img/lk/3.png);" class="pro-img"><a href="#" class="title">Благотворительный марафон "Я помогаю"</a></div>
            </div>';}
            else{
            echo '<div style="display:none;" class="content projectkch">
            <p class="text-content">Здесь Вы можете  просматривать проекты команды Череповца, которые осуществлются при поддержке мэрии города. Для просмотра информации о проектах и участия, необходимо зарегистрироваться в команде Череповца.</p>
            <div class="wrap">
              <a class="ball" href="https://xn--80aaahiha9aslihmm8gj.xn--p1ai/" target="_blank" style="text-decoration: none;">ЗАРЕГИСТРИРОВАТЬСЯ</a>
            </div>
            <hr>';
            }?>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer">
      <div class="footer-content">
        <div class="soc"><a href="https://vk.com/sociopolis35" aria-hidden="true" class="fa fa-vk fa-2x vk"></a><a href="#" aria-hidden="true" class="fa fa-facebook fa-2x facebook"></a><a href="http://www.thepictaram.club/instagram/chsu_media" aria-hidden="true" class="fa fa-instagram fa-2x instagram"></a><a href="#" aria-hidden="true" class="fa fa-twitter fa-2x twitter"></a></div>
        <div class="footer-menu">
          <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/page/page2.html">О проекте</a></li>
            <li><a href="/page/page2.html">Контакты</a></li>
          </ul>
        </div>
      </div>
    </footer>
    
    <script src="/js/all.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/lk.js"></script>
  </body>
</html>