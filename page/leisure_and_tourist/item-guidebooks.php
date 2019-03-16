<?php
require "db.php";

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
  <?php
  $db = new Database();
  $db->connect();
  //$db->select('attraction','name','','id desc limit 6');//запрос
  $res = $db->getResult();
 // $db->close_connect();

  // print_r($res[0][name]);
  //echo '<br>';
  //var_dump($res);
  //print_r($res)
  ?>
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
      <div class="lat_services-wrap">  <?php echo '<a href="/page/leisure_and_tourist/item-guidebooks.php?id='.(int)$_GET['id'].'" class="lat_services-title"><span>Путеводител № '.(int)$_GET['id'].'</span></a>'?>
        <div class="lat_services-content">
          <div class="lat_services-description"> <?php
              $db->getResultNull();
              $db->select('services','*','id=3');//запрос
              $res = $db->getResult(); echo $res[description]; ?></div>
          <ol type="A" class="lat_services-list_path">
              <?php
              $db->getResultNull();
              $db->select('routes','*','id='.(int)$_GET['id'].'');//запрос
              $res = $db->getResult();
              $string=$res[id_center];
              $string_id = explode(',', $string);


              $db->getResultNull();
              $db->select('attraction','*','id='.$res[id_start].'');//запрос
              $st_res = $db->getResult();

              echo '<li><a href="'.$st_res[url_link].'">'.$st_res[name].'</a></li>';
              for ($i=0;$i<count($string_id);$i++)
              {
                  $db->getResultNull();
                  $db->select('attraction','*','id='.$string_id[$i].'');//запрос
                  $m_res = $db->getResult();
                  echo '<li><a href="'.$m_res[url_link].'">'.$m_res[name].'</a></li>';
              }
              $db->getResultNull();
              $db->select('attraction','*','id='.$res[id_finish].'');//запрос
              $fn_res = $db->getResult();
              echo '<li><a href="'.$fn_res[url_link].'">'.$fn_res[name].'</a></li>';
              ?>

          </ol>
          <div class="lat_services-map">
            <div id="map"></div>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhjSHJaekCrs00AyJ9rpXUWS-ZPeH9MQQ&amp;callback=initMap"></script>
<!--маршрут из базы на карту    -->
    <?php
        $db = new Database();
        $db->connect();
        $db->select('routes','*','id='.(int)$_GET['id'].'');//запрос
        $res = $db->getResult();

        $db->select('attraction','*','id='.$res[id_finish].'');//запрос
        $finish = $db->getResult();

        $db->select('attraction','*','id='.$res[id_start].'');//запрос
        $start = $db->getResult();

         $string=$res[id_center];
         $string_id = explode(',', $string);

        for ($i=0;$i<count($string_id);$i++)
        {

            $db->select('attraction', '*', 'id=' . $string_id[$i] . '');//запрос
            $center = $db->getResult();
            $centerx[$i]=$center[lat];
            $centery[$i]=$center[lng];

        }

            print '<script language="javascript">var startx = '.$start[lat].';
            var starty = '.$start[lng].';
            var finishx = '.$finish[lat].';
            var finishy = '.$finish[lng].';
            var centerx = ['.implode(",",$centerx).'];
            var centery = ['.implode(",",$centery).'];

            </script>';



//        $db->select('mysqlcrud','ln','name=\'Figo\'');//запрос
//        $res = $db->getResult();
//        print '<script language="javascript">var startx = '.$res[ln].';
//        </script>';
//        $db->select('mysqlcrud','lg','name=\'Figo\'');//запрос
//        $res = $db->getResult();
//        print '<script language="javascript">var starty = '.$res[lg].';
//        </script>';
        ?>
    <script src="/js/guide.js"></script>
  </body>
</html>