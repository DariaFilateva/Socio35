<?php
require "db.php";

$data=$_POST;
//если нажата кнопка
if(isset($data['all_items']))
{

    $db = new Database();
    $db->connect();
    $db->select('attraction','*','type=2','id');//запрос
    $item = $db->getResult();
    $db->getResultNull();
    $db->select('services','*','id=6');
    $res = $db->getResult();

}
else
{
    $db = new Database();
    $db->connect();
   // $r="r";
   // $db->select('places_for_rest','*','','id  limit 3');//запрос
    $db->select('attraction','*','type=2','id  limit 3');//запрос
    $item = $db->getResult();
    //var_dump($item);
    $db->getResultNull();
    $db->select('services','*','id=6');
    $res = $db->getResult();

}
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <base href="/"/>
    <title>Home</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" media="all" href="/css/main_global.css"/>
    <link rel="stylesheet" media="all" href="/css/pages/leisure_and_tourist.css">
  </head>
  <body>
    <header>
      <div class="header-content">
        <p>#социополис<span>35</span></p>
        <div class="weather">
        </div>
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
    <section style="background:url(../../img/leisure_and_tourist/bg-places_for_rest.jpg); background-repeat: no-repeat;  background-size: cover;" class="lat_services">
      <div class="lat_services-wrap"><a href="/page/leisure_and_tourist/places_for_rest.html" class="lat_services-title"><span><?php echo $res[title] ; ?></span></a>
        <div class="lat_services-content">
          <div class="lat_services-description"><?php echo $res[description] ; ?></div>
          <div class="lat_services-list">
              <?php

              for($i=0;$i<count($item);$i++)
              {
                  echo '<a href="'.$item[$i][url_link].'" class="item-list add-description"><img src="'.$item[$i][url_img].'"><p> '.$item[$i][name].'</p><div class="item-description"> '.$zzz=rtrim(mb_strimwidth($item[$i][description], 0, 100))."...".'</div></a>';
              }

              ?>
          </div>
            <form method="post" action="/page/leisure_and_tourist/places_for_rest.php">
                <button name="all_items" type="submit" value="Показать" class="lat_services-button">полный список</button>
            </form>

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
  </body>
</html>