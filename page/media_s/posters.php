<?php
require "db.php";
require "fun.php"
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <base href="/"/>
    <title>Социо35</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" media="all" href="/css/main_global.css"/>
    <link rel="stylesheet" media="all" href="/css/pages/leisure_and_tourist.css">
    <link rel="stylesheet" media="all" href="/css/pages/media_s.css">
    <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header>
      <div class="header-content">
        <p>#социополис<span>35</span></p>
      </div>
      <div class="menu-content">
        <ul>
          <li> <a href="/">Главная</a></li>
          <li> <a href="/page/page2.html">О проекте</a></li>
          <li> <a href="/page/page2.html">Контакты</a></li>
          <li> <a href="/page/page2.html">Поиск</a></li>
        </ul>
        <div class="mobile-menu-content">
          <div aria-hidden="true" class="menu-icon fa fa-bars fa-2x"></div>
          <ul class="m_menu-content">
            <li> <a href="/">Главная</a></li>
            <li> <a href="/page/page2.html">О проекте</a></li>
            <li> <a href="/page/page2.html">Контакты</a></li>
            <li> <a href="/page/page2.html">Поиск</a></li>
          </ul>
        </div>
        <p class="logo">#социополис<span>35</span></p>
      </div>
    </header>
    <section style="background:url(../../img/media_s/posters.png); background-repeat: no-repeat;  background-size: cover;" class="lat_services">
      <div style="background-color: #fff;" class="lat_services-wrap"><a href="/page/media_s/news.php"></a>
        <div class="lat_services-title"><span>Медиа</span></div>
        <div style="background-color: #fff;" class="lat_services-content">
          <div style="background-color: #fff;" class="lat_services-list">
          <a href="/page/media_s/news.php" class="item-list1">
            <img src="img/icons/new.png">
            <p> новости</p></a>
          <a href="/page/media_s/report.php" class="item-list1">
            <img src="img/icons/report.png">
            <p> репортажи</p></a>
          <a href="/page/media_s/place.php" class="item-list1">
            <img src="img/icons/place.png">
            <p> места проведения мероприятий</p></a>
              </div>
          </div></div>
      <div class="lat_services-wrap"><a href="/page/media_s/news.php"></a>
        <div class="lat_services-title"><span>Афиши</span></div>
        <div class="lat_services-content">
          <img src="img/media_s/cal.jpg" width="25px" height="25px" style="vertical-align: sub;">
          <input type="text" name="date" value="" class="calendar" placeholder="Афиши за день">
          <div id="period">
          <form methot="get" action="/page/media_s/buttonposter.php">
          <button name="pa1" class="lat_services-button">Афиши за неделю</button>
          <button name="pa2" class="lat_services-button">Афиши за месяц</button></form></div>
          <a onclick="showA();" class="lat_services-button">Предложить афишу</a>
          <div id="b"></div>
          <div id="a">
            <div id="windows"><a onclick="hideA();" style="float: right;" class="pages">X</a>
              <form class="forma" method="post" action="/page/media_s/add_poster.php" enctype=multipart/form-data>
                <h2>ПРЕДЛОЖИТЬ АФИШУ</h2>
                <fieldset>
                  <p>Если Вы знаете о каком-либо мероприятии, которого нет на нашем портале, но оно будет проводиться в городе, смело предлагайте его!</p>
                  <input id="header" name="header" type="text" placeholder="Название мероприятия" required>
                  <input id="date_pol" name="date_pol" type="text" placeholder="Дата" required="" class="calendarpol">
                  <select name="place_pos">
                    <option disabled>Место проведения мероприятия</option>
                    <?php
                    $db = new Database(); 
                    $db->connect();
                    $db->select('Place','*');
                    $namepl = $db->getResult();
                    foreach($namepl as $nm){
                    echo"<option>".$nm['name']."</option>";}?>
                  </select>
                  <input type="file" name="add_img" id="add_img" value="Добавить изображение" accept="image/jpeg,image/png">
                  <button name="add_pos" class="lat_services-button">Отправить</button>
                </fieldset>
              </form>
            </div>
          </div>
          <div class="item-z">
           <?php
          $db = new Database(); 
          $db->connect();
          if(isset($_GET['date'])){
            $da=$_GET['date'];
             $db->select('Poster','*','ICondition_id=2 AND date=\''.$da.'\'');
          $res = $db->getResult();
          }
          else{
            if($_GET['pa2']==""){
            $date_end = date("Y-m-d", strtotime("+7 days"));}
            else{$date_end=$_GET['pa2'];}
          $date_start = date("Y-m-d");
          $db->select('Poster','*','ICondition_id=2 AND date BETWEEN \''.$date_start.'\'AND\''.$date_end.'\'');
          $res = $db->getResult();
          }

          if(empty($res)){
            echo "<div class=\"item-z\"><span> К сожалению, на этот день нет мероприятий</span></div>";
          }
          else 
            if((count($res, COUNT_RECURSIVE) - count($res)) == 0){
            echo"
            <a href=\"#t";echo $res['poster_id'] ;echo"\" class=\"open_modal\"><img src=\""; echo $res['photo_url']; echo"\" class=\"poster\"></a>
            <div id=\"t";echo $res['poster_id'] ;echo"\" class=\"modal_div class1\"><span class=\"modal_close\">X</span>
              <div class=\"wrap\"><a href=\"".$res['photo_url']."\"class=\"image-popup-no-margins\"><img src=\"";echo $res['photo_url']; echo"\" class=\"poster\"></a>
                <pre style=\"white-space: pre-wrap;\"><p>";echo $res['name']; echo"</br> Дата: "; echo $res['date'];
                $db->select('Place','*','place_id='.$res['place_id']); $pla = $db->getResult(); echo"</br> Место: ".$pla['name'].",</br>".$pla['description']."</p></pre>
              </div>
            </div>";}
          else
            { 
          foreach($res as $re){
          echo "<a href=\"#t";echo $re['poster_id'] ;echo"\" class=\"open_modal\"><img src=\""; echo $re['photo_url']; echo"\" class=\"poster\"></a>
            <div id=\"t";echo $re['poster_id'] ;echo"\" class=\"modal_div class1\"><span class=\"modal_close\">X</span>
              <div class=\"wrap\"><a href=\"".$re['photo_url']."\"class=\"image-popup-no-margins\"><img src=\"";echo $re['photo_url']; echo"\" class=\"poster\"></a>
                <pre style=\"white-space: pre-wrap;\"><p>";echo $re['name']; echo"</br> Дата: "; echo $re['date'];$db->select('Place','*','place_id='.$re['place_id']); $pla = $db->getResult(); echo"</br> Место: ".$pla['name'].",</br>".$pla['description']."</p></pre>
              </div>
            </div>";
            }}
            ?>

         
            <div id="overlay"></div>
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
    <script src="/js/ipop.js"></script>
    <script src="/js/modalm.js"></script>
    <script src="/js/silderm.js"></script>
    <script src="/js/lib_calendar.js"></script>
    <!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
    <script src="/js/calendar1.js"></script>
    <script src="/js/calendarpol.js"></script>
    <script src="/js/popup.js"></script>
  </body>
</html>