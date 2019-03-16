<?php
require "db.php";
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <base href="/"/>
    <title>Социо35</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" media="all" href="/css/main_global.css"/>
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
    <section style="background:url(../../img/media_s/news.png); background-repeat: no-repeat;  background-size: cover;" class="lat_services">
      <div style="background-color: #fff;" class="lat_services-wrap"><a href="/page/media_s/news.php"></a>
        <div class="lat_services-title"><span>Медиа</span></div>
        <div style="background-color: #fff;" class="lat_services-content">
          <div style="background-color: #fff;" class="lat_services-list">
          <a href="/page/media_s/posters.php" class="item-list1">
            <img src="img/icons/af.png">
            <p> афиши</p></a>
          <a href="/page/media_s/report.php" class="item-list1">
            <img src="img/icons/report.png">
            <p> репортажи</p></a>
          <a href="/page/media_s/place.php" class="item-list1">
            <img src="img/icons/place.png">
            <p> места проведения мероприятий</p></a>
              </div>
          </div></div>
      <div class="lat_services-wrap"><a href="/page/media_s/news.php"></a>
        <div class="lat_services-title"><span>Новости</span></div>
        <div class="lat_services-content">
          <img id="pp" src="img/media_s/cal.jpg" width="25px" height="25px" style="vertical-align: sub;">
          <input id="calendar" type="text" name="datei" value="" class="calendar" placeholder="Новости за день">
          <div id="period">
          <form methot="get" action="/page/media_s/buttonnews.php">
          <button name="p1" class="lat_services-button">Новости за неделю</button>
          <button name="p2" class="lat_services-button">Новости за месяц</button></form></div>
          <a onclick="showA();" class="lat_services-button">Предложить новость</a>
          <div id="b"></div>
          <div id="a">
            <div id="windows"><a onclick="hideA();" style="float: right;" class="pages">X</a>
              <form class="forma" method="post" action="/page/media_s/add_news.php" enctype=multipart/form-data >
                <h2>ПРЕДЛОЖИТЬ НОВОСТЬ</h2>
                <fieldset>
                  <p>Если Вы знаете о каком-либо событии, которого нет на нашем портале, но оно произошло в городе, смело предлагайте его!</p>
                  <input id="header" name="header" type="text" placeholder="Заголовок" required="">
                  <input id="date_n" name="date_n" type="text" placeholder="Дата" required="" class="calendarpol">
                  <textarea id="desc" name="desc" placeholder="Описание"></textarea>
                  <input type="file" name="uploadfile" id="add_img" value="Добавить изображение" accept="image/jpeg,image/png">
                  <button name="add_n" class="lat_services-button">Отправить</button>
                </fieldset>
              </form>
            </div>
          </div>
          <?php
          $db = new Database(); 
          $db->connect();
          if(isset($_GET['date'])){
            $da=$_GET['date'];
            $db->select('News','*','ICondition_id=2 AND date=\''.$da.'\'');
          $res = $db->getResult();
          }
          else{
            if($_GET['p2']==""){
            $date_end = date("Y-m-d", strtotime("-7 days"));}
            else{$date_end=$_GET['p2'];}
            $date_start = date("Y-m-d");
            $db->select('News','*','ICondition_id=2 AND date BETWEEN \''.$date_end.'\'AND\''.$date_start.'\'');
          $res = $db->getResult();
          }

          if(empty($res)){
            echo "<div class=\"item-z\"><span> К сожалению, на этот день нет новостей</span></div>";
          }
          else 
            if((count($res, COUNT_RECURSIVE) - count($res)) == 0){
            echo"
            <div class=\"item-z\"><span>"; echo $res[header]; echo"</span>
              <div class=\"item2\"><a href=\""; $photo_url=$res[photo_url]; 
            echo $photo_url; echo"\" class=\"image-popup-no-margins\"><img src=\""; $photo_url=$res[photo_url]; 
            echo $photo_url; echo"\" class=\"news\"></a>
                <pre style=\"white-space: pre-wrap;\"><p>"; $description=$res[description]; 
            echo $description; echo"</p></pre>
              </div>
            </div>";}
          else
            { 
              foreach($res as $re)
                {
                  echo"
                  <div class=\"item-z\"><span>"; echo $re[header]; echo"</span>
                    <div class=\"item2\"><a href=\""; $photo_url=$re[photo_url]; 
                  echo $photo_url; echo"\" class=\"image-popup-no-margins\"><img src=\""; $photo_url=$re[photo_url]; 
                  echo $photo_url; echo"\" class=\"news\"></a>
                      <pre style=\"white-space: pre-wrap;\"><p>"; $description=$re[description]; 
                  echo $description; echo"</p></pre>
                    </div>
                  </div>";
                }
            }
            ?>

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
    <script src="/js/calendar.js"></script>
    <script src="/js/calendarpol.js"></script>
    <script src="/js/ipop.js"></script>
    <script src="/js/modalm.js"></script>
    <script src="/js/silderm.js"></script>
    <script src="/js/popup.js"></script>
    <script src="/js/lib_calendar.js"></script>
    <!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
  </body>
</html>