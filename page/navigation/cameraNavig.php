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
$query = "UPDATE CMIRiT_cam SET view = CMIRiT_cam.view+1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
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
      <div class="lat_services-wrap"><a href="/page/navigation/mainNavig.html" class="lat_services-title"><span>Городские камеры</span></a></div>
      <div class="navig-content">
        <div class="fontdoubleText">
          <p>Камеры</p>
          <p>На карте</p>
        </div>
        <div class="cameraList"><a href="#modal1" class="open_modal cameraBlock">
            <p>Ягорбский мост-Общий вид</p>
            <div class="camImag cam1"></div>
            <div id="modal1" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player1"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis1_800x600.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player1');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal2" class="open_modal cameraBlock">
            <p>Ягорбский мост-В сторону Центра</p>
            <div class="camImag cam2"></div>
            <div id="modal2" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player2"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis6_704x576.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player2');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal3" class="open_modal cameraBlock">
            <p>Ягорбский мост-В сторону Заречья</p>
            <div class="camImag cam3"></div>
            <div id="modal3" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player3"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis12_704x576.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player3');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal4" class="open_modal cameraBlock">
            <p>Ленина-Набережная</p>
            <div class="camImag cam6"></div>
            <div id="modal4" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player4"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=ever2_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player4');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal5" class="open_modal cameraBlock">
            <p>Набережная</p>
            <div class="camImag cam7"></div>
            <div id="modal5" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player5"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=yaga1_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player5');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal6" class="open_modal cameraBlock">
            <p>Победы - Гоголя</p>
            <div class="camImag cam8"></div>
            <div id="modal6" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player6"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis2_800x600.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player6');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal7" class="open_modal cameraBlock">
            <p>Победы - Первомайская</p>
            <div class="camImag cam9"></div>
            <div id="modal7" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player7"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=smart4_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player7');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal8" class="open_modal cameraBlock">
            <p>Площадь Химиков</p>
            <div class="camImag cam10"></div>
            <div id="modal8" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player8"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=smart5_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player8');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal9" class="open_modal cameraBlock">
            <p>Площадь Химиков 2</p>
            <div class="camImag cam11"></div>
            <div id="modal9" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player9"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=smart6_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player9');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal10" class="open_modal cameraBlock">
            <p>Октябрьский мост - Середина</p>
            <div class="camImag cam12"></div>
            <div id="modal10" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player10"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis3_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player10');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal11" class="open_modal cameraBlock">
            <p>Октябрьский мост в ЗШК</p>
            <div class="camImag cam13"></div>
            <div id="modal11" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player11"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis4_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player11');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal12" class="open_modal cameraBlock">
            <p>Октябрьский мост в центр</p>
            <div class="camImag cam14"></div>
            <div id="modal12" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player12"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis8_704x576.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player12');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal13" class="open_modal cameraBlock">
            <p>Октябрьский мост в ЗШК2</p>
            <div class="camImag cam15"></div>
            <div id="modal13" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player13"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis9_704x576.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player13');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal14" class="open_modal cameraBlock">
            <p>Октябрьский мост в центр</p>
            <div class="camImag cam16"></div>
            <div id="modal14" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player14"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis7_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player14');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal15" class="open_modal cameraBlock">
            <p>Октябрьский мост - Начало</p>
            <div class="camImag cam17"></div>
            <div id="modal15" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player15"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis10_704x576.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player15');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal16" class="open_modal cameraBlock">
            <p>Ленина - Горького</p>
            <div class="camImag cam20"></div>
            <div id="modal16" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player16"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=smart3_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player16');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal17" class="open_modal cameraBlock">
            <p>пл. Металлургов</p>
            <div class="camImag cam21"></div>
            <div id="modal17" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player17"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=rvi1_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player17');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal18" class="open_modal cameraBlock">
            <p>пл. Металлургов 2</p>
            <div class="camImag cam22"></div>
            <div id="modal18" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player18"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=rvi2_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player18');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal19" class="open_modal cameraBlock">
            <p>пл. Металлургов 3</p>
            <div class="camImag cam23"></div>
            <div id="modal19" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player19"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=smart2_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player19');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal20" class="open_modal cameraBlock">
            <p>сквер Верещагина</p>
            <div class="camImag cam24"></div>
            <div id="modal20" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player20"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=smart1_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player20');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal21" class="open_modal cameraBlock">
            <p>Красноармейская площадь</p>
            <div class="camImag cam25"></div>
            <div id="modal21" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player21"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis5_1280x720.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player21');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal22" class="open_modal cameraBlock">
            <p>Красноармейская площадь - Пушка</p>
            <div class="camImag cam26"></div>
            <div id="modal22" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player22"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis13_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player22');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal23" class="open_modal cameraBlock">
            <p>Советский проспект</p>
            <div class="camImag cam27"></div>
            <div id="modal23" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player23"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=axis14_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player23');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal24" class="open_modal cameraBlock">
            <p>Площадь Революции</p>
            <div class="camImag cam28"></div>
            <div id="modal24" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player24"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=smart10_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player24');</script>
            </div>
            <div id="overlay"></div></a><a href="#modal25" class="open_modal cameraBlock">
            <p>Старый причал</p>
            <div class="camImag cam30"></div>
            <div id="modal25" class="modal_div"><span class="modal_close">X</span>
              <script type="text/javascript" src="js/swfobject.js"></script>
              <div id="player25"></div>
              <script type="text/javascript">var so = new SWFObject('js/player.swf','mpl','850','500','8'); so.addParam('allowfullscreen','true'); so.addParam('flashvars','bandwidth=3070&autostart=true&file=rvi4_1920x1080.stream&streamer=rtmp://live.cmirit.ru:1935/live/');this.so.write('player25');</script>
            </div>
            <div id="overlay"></div></a>
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
    <script src="/js/camera.js"></script>
  </body>
</html>