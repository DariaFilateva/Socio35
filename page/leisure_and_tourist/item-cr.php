<?php
require "db.php";

$data=$_POST;
    $db = new Database();
    $db->getResultNull();
    $db->connect();
    //$db->select('item_sports','*','id='.(int)$_GET['id'].'');
    $db->select('attraction','*','id='.(int)$_GET['id'].'');
    $res = $db->getResult();

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
    <section style="background:url(../../img/leisure_and_tourist/bg-guidebooks.jpg); background-repeat: no-repeat;  background-size: cover;" class="lat_services">
      <div class="lat_services-wrap"><a href="/page/leisure_and_tourist/item-guidebooks.html" class="lat_services-title"><span><?php echo $res[name] ; ?></span></a>
        <div class="lat_services-content">
          <div class="lat_services-places-header"><?php echo '<img src="'.$res[url_img].'">'; ?>
            <div class="description">
              <p><?php echo $res[address] ; ?> </p>
              <p>Телефон: <?php echo '<a href="'.$res[telefon].'" > '.$res[telefon].'</a>'; ?> </p>
              <p>Ссылка: <?php echo '<a style="text-decoration: none;" href="'.$res[link].'" > '.$res[link].'</a>'; ?> </p>
              <p><?php echo $res[time] ; ?></p>
            </div>
          </div>
          <div class="lat_services-description"><?php echo $res[description] ; ?></div>

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