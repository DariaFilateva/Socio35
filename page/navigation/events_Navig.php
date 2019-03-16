<?php
// Подключение к базе данных MYSQL
$connection=mysql_connect ("localhost", "o9052991_socio35", "socio35");
// $connection=mysql_connect ("localhost", "root", "");
mysql_set_charset('utf8');
if (!$connection) {
  die('Not connected : ' . mysql_error());
}
// Активировать подключение
$db_selected = mysql_select_db('o9052991_socio35', $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
// Выбрать все записи из таблицы с метками мероприятий
$query = "SELECT  Place.name as place, Poster.place_id, Place.place_id, date,poster_id, latitute,longitute FROM Poster JOIN Place where Poster.place_id=Place.place_id";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
$lt1=array();
$lg1=array();
$name1=array();
$address1=array();
$type1=array();
$countVar=0;
while ($row = @mysql_fetch_assoc($result)){
$lt1[$countVar]=$row[latitute];
$lg1[$countVar]=$row[longitute];
$name1[$countVar]=$row[place];
$address1[$countVar]=$row[date];
$type1[$countVar]=$row[poster_id];
$countVar++;
}
// Передача данных из базы в JS var type1=['.implode(",",$type1).']; var name1=["'.implode("\",\"",$name1).'"];
print '<script language="javascript" async >var lt1 =['.implode(",",$lt1).'];
var lg1 =['.implode(",",$lg1).'];
var name1=["'.implode("\",\"",$name1).'"];
var address1=["'.implode("\",\"",$address1).'"];
type1=['.implode(",",$type1).'];
</script>';
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <base href="/"/>
    <title>Home</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" media="all" href="/css/main_global.css"/>
    <link rel="stylesheet" media="all" href="/css/pages/navigationStyles.css">
    <link rel="stylesheet" media="all" href="/css/pages/leisure_and_tourist.css">
  </head>
  <body>
    <header>
      <div class="header-content">
        <p>#социополис<span>35</span></p>
      </div>
      <div class="menu-content">
        <div class="name-services"> <a href="/page/navigation/mainNavig.html" class="item-services"></a><a href="/page/navigation/onlineTransportNavig.html" class="item-services"></a></div>
        <ul>
          <li> <a href="/">Главная</a></li>
          <li> <a href="/page/page2.html">О проекте</a></li>
          <li> <a href="/page/page2.html">Контакты</a></li>
          <li> <a href="/page/page2.html">Поиск				</a></li>
        </ul>
      </div>
    </header>
    <section class="navigWrap">
      <div class="lat_services-wrap"><a href="/page/navigation/mainNavig.html" class="lat_services-title"><span>Места мероприятий</span></a></div>
      <div class="navig-content">
        <!-- Загрузка Google карты -->
        <div id="map"></div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQeYi6WN1c1GKRzwjHxtpNzWJXqgR_XdI&amp;callback=initMap" defer></script>
    <script src="/js/eventsMarkets.js"></script>
    
  </body>
</html>