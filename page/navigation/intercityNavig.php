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
        <div class="weather">
        </div>
      </div>
      <div class="menu-content">
        <ul>
          <li> <a href="/">Главная</a></li>
          <li> <a href="/page/page2.html">О проекте</a></li>
          <li> <a href="/page/page2.html">Контакты</a></li>
          <li> <a href="/page/page2.html">Поиск				</a></li>
        </ul>
      </div>
    </header>
    <section class="navigWrap">
      <div class="lat_services-wrap"><a href="/page/navigation/mainNavig.html" class="lat_services-title"><span>Междугородний транспорт</span></a></div>
      <div class="navig-content">
        <h2>Расписание</h2>
      </div>

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
//Строительство таблицы с данными из базы данных 
$table = "<table border=2 width = '1200px' align=center class='tableBus'>";
$query = "SELECT * FROM intercity_bus";     // запрос
$result = mysql_query($query);
if (!$result) {
die('Invalid query: ' . mysql_error());
}   
if($k%2==0) $color="#FFFFFF";else $color="#AFEEEE"; //Окрашивание ячеек в разный цвет (белый и синий)
$k++;
$table .= "<tr BGCOLOR='$color class='tableTRBus'>";
 $table .= "<td class='tableTRBus'> Маршрут </td>";
 $table .= "<td class='tableTRBus'> Отправление от начального пункта </td>";
 $table .= "<td class='tableTRBus'> Отправление от конечного пункта </td>";
while ($row = @mysql_fetch_assoc($result)){
if($k%2==0) $color="#FFFFFF";else $color="#AFEEEE"; 
$k++;
$table .= "<tr BGCOLOR='$color' class='tableBus' cellspacing='5' cellpadding='10'>";
 $table .= "<td class='tableTRBus'>".$row['City']."</td>";
 $table .= "<td class='tableTDBus'>".$row['start_time']."</td>";
 $table .= "<td class='tableTDBus'>".$row['end_time']."</td>";
 $table .= "</tr>";
}
$table .= "</table>";
        echo $table;           // выводится
?>
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