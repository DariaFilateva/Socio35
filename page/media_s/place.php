<?php
require "db.php"
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
    <section style="background:url(../../img/media_s/place.png); background-repeat: no-repeat;  background-size: cover;" class="lat_services">
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
          <a href="/page/media_s/posters.php" class="item-list1">
            <img src="img/icons/af.png">
            <p> афиши</p></a>
              </div>
          </div></div>
      <div class="lat_services-wrap"><a href="/page/media_s/news.php"></a>
        <div class="lat_services-title"><span>места проведения мероприятий</span></div>
        <div class="lat_services-content">
          <?php
          $db = new Database(); 
          $db->connect();
          $db->select('Place','*','','name ASC');
          $res = $db->getResult();
          if(empty($res)){
            echo "<div class=\"item-z\"><span> К сожалению, таких мест проведения мероприятий нет</span></div>";
          }
          else 
            if((count($res, COUNT_RECURSIVE) - count($res)) == 0){
            echo"
            <div class=\"item-z\">
          <span>";
          echo $res[name];
          echo "</span>
            <div class=\"item2\"><a href=\"".$res[photo_url]."\"class=\"image-popup-no-margins\"><img src=\""; 
          $photo_url=$res[photo_url]; 
          echo $photo_url;
          echo"\" class=\"news\"></a>
             <pre style=\"white-space: pre-wrap;\"><p>";
          $description=$res[description]; 
          echo $description;
        echo"</br><a href=\"".$res[site_pl]."\">".$res[site_pl]."</a></p></pre>
            </div>
          </div>";}
          else
            { 
          foreach($res as $re){
          echo "<div class=\"item-z\">
          <span>";
          echo $re[name];
          echo "</span>
            <div class=\"item2\"><a href=\"".$re[photo_url]."\"class=\"image-popup-no-margins\"><img src=\"";  
          echo $re[photo_url];
          echo"\" class=\"news\"></a>
             <pre style=\"white-space: pre-wrap;\"><p>";
          $description=$re[description]; 
          echo $description;
        echo"</br><a href=\"".$re[site_pl]."\">".$re[site_pl]."</a></p></pre>
            </div>
          </div>";
        }}
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
    <script src="/js/ipop.js"></script>
    <script src="/js/modalm.js"></script>
    <script src="/js/silderm.js"></script>
    <script src="/js/popup.js"></script>
    <script src="/js/lib_calendar.js"></script>
    <!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
  </body>
</html>