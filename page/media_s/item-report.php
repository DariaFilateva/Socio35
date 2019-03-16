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
    <section style="background:url(../../img/media_s/report.png); background-repeat: no-repeat;  background-size: cover;" class="lat_services">
      <div class="lat_services-wrap">
        <a href="/page/media_s/report.php" class="lat_services-title"><span>Назад к репортажам</span></a>
        <div class="lat_services-content">

          <?php
          $db = new Database(); 
          $db->connect();
          $re_id = (int)$_GET['id'];
          $db->select('Report','*','report_id=\''.$re_id.'\'');
          $res = $db->getResult();
          echo "<div class=\"itemz\">
            <div class=\"item2\">
              <p>".$res[description]."</p>
            </div>
          </div>";
          echo"<div class=\"sections-slider\"> 
            <div id=\"goToPrevSlider\" class=\"prev\"></div>
            <div id=\"goToNextSlider\" class=\"next\"></div>
            <ul id=\"lightSliderr\">";
            $db->select('Photoreport','*','report_id=\''.$re_id.'\'');
          $res = $db->getResult();
          foreach($res as $re){
              echo"<li><div class=\"slid-content\"><a href=\"/page/navigation/mainNavig.html\" class=\"content-items\"><img src=\"".$re[photo_url]."\"></a>";
            }?>
                </div>
              </li>
            </ul>
          </div>
          <div class="itemz">
            <div class="item2">
              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum aspernatur corporis unde excepturi eaque quia, repellendus similique iure voluptates consequatur ea repudiandae repellat, facilis illum velit eum quae enim ab rem quaerat. Maiores quaerat vero obcaecati commodi sequi atque eius impedit perferendis? Obcaecati assumenda, dolorem commodi cupiditate recusandae amet explicabo.</p>
            </div>
          </div>
          <div class="sections-slider"> 
            <div id="goToPrevSlider" class="prev"></div>
            <div id="goToNextSlider" class="next"></div>
            <ul id="lightSliderr">
              <li>
                <div class="slid-content"><a href="/page/navigation/mainNavig.html" class="content-items"><img src="img/5.png"></a></div>
              </li>
              <li>
                <div class="slid-content"><a href="/page/page2.html" class="content-items"><img src="img/8.png"></a></div>
              </li>
            </ul>
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
    <script src="/js/calendar.js"></script>
    <!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
  </body>
</html>