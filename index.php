<?
header( 'Content-Type: text/html; charset=utf-8' );
include 'libs/db.php';

$sql = "SELECT  * FROM `admin_kch_slider`"; 
$slider = R::getAll($sql);

?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <base href="/"/>
    <title>Home</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" media="all" href="/css/main_global.css"/>
    <link rel="stylesheet" media="all" href="/css/popup.css"/>
  </head>
  <body>
    <?php
    //phpinfo();
     include 'libs/header.php';
    php?>
    <div class="scrolltotop"> </div>
    <section class="slider">
      <div class="slider-content">
        <div id="goToPrevSlide" class="prev"></div>
        <div id="goToNextSlide" class="next"></div>
        <ul id="lightSlider">
        <?php
            foreach($slider as $item)
            {
                echo '
                <li>
                    <img src="http://www.admin.socio35.ru/'.$item['url'].'">
                    <div class="slider-inf">
                        <div class="left"><span>'.$item['title'].'</span>
                            <p>'.$item['description'].'</p>
                        </div>
                    </div>
                </li>';
            }
        ?>
        <!-- <li>
            <img src="img/imgs1.jpg">
            <div class="slider-inf">
                <div class="left"><span>Череповец</span>
                    <p>Крупнейший по территории и численности населения город в Вологодской области России, административный центр Череповецкого района, в который не входит, обладая статусом города областного значения и образуя городской округ</p>
                </div>
            </div>
        </li>
        <li>
            <img src="img/s2.jpg">
            <div class="slider-inf">
                <div class="left">
                    <span>Набережная будущего!</span>
                    <p>Конкурс архитектурных проектов!</p>
                </div>
            </div>
        </li> -->
        </ul>
        
      </div>
    </section>
    <section class="platform_ideas">
      <div class="platform_ideas-content"><a href="/page/platform_ideas/platform_ideas.html" class="ideas-title"><span>Площадка идей</span></a>
        <div class="ideas-content"><a href="/page/platform_ideas/projects.php" class="content-items"><img src="img/icons/pr.png">
            <p>Проекты</p></a><a href="/page/platform_ideas/voting.php" class="content-items"><img src="img/icons/opr.png">
            <p>Опросы</p></a><a href="/page/platform_ideas/volunteering.html" class="content-items last"><img src="img/icons/dobr.png">
            <p style="margin-left: -45px;">Добровольчество</p></a></div>
      </div>
    </section>
    <section class="sections">
      <div class="sections-content">
        <div class="sections-title"> Всё самое нужное на одном портале</div>
        <div class="sections-slider"> 
          <div id="goToPrevSlide2" class="prev"></div>
          <div id="goToNextSlide2" class="next"></div>
          <ul id="lightSlider2">
            <li>
              <div class="slid-content">
                  <a href="/page/eventkch/eventkch.php" class="content-items"><img src="img/icons/kalevent.png">
                  <p>Календарь событий</p></a>
                  <a href="/page/workshop_ideas/project_ws.php" class="content-items"><img src="img/icons/kchpro.png">
                  <p>Проектная мастерская</p></a>
                  <a href="/page/workshop_ideas/bank_ideas.php" class="content-items"><img src="img/icons/bankid.png">
                  <p>Банк идей</p></a>
                  <a href="/page/navigation/mainNavig.html" class="content-items"><img src="img/icons/nav.png">
                  <p>Навигация</p></a>
                  <a href="/page/media_s/news.php" class="content-items"><img src="img/icons/new.png">
                  <p>Новости</p></a>
                  <a href="/page/leisure_and_tourist/home-service.php" class="content-items three"><img src="img/icons/tur.png">
                  <p>Туризм</p></a>
              </div>
            </li>
<!--             <li>
  <div class="slid-content">
      <a href="/page/page2.html" class="content-items"><img src="img/13.png">
      <p>Экология</p></a>
      <a href="/page/deti/deti.html" class="content-items"><img src="img/17.png">
      <p>Наши дети</p></a>
      <a href="/page/med/med.html" class="content-items"><img src="img/16.png">
      <p>Медицина</p></a>
      <a href="/page/gkh/sergkh.html" class="content-items"><img src="img/i14.png">
      <p>ЖКХ</p></a></div>
</li> -->
            <li>
              <div class="slid-content">
                  <a href="/page/deti/deti.html" class="content-items"><img src="img/icons/dos.png">
                  <p>Наши дети</p></a>
                  <a href="/page/gkh/sergkh.html" class="content-items"><img src="img/icons/I14.png">
                  <p>ЖКХ</p></a>
                  <a href="/page/med/med.html" class="content-items"><img src="img/icons/med.png">
                  <p>Медицина</p></a>
                  <a  class="content-items"><img src="img/icons/dos.png">
                  <p>Доступная среда</p></a>
                  <a href="/page/media_s/posters.php" class="content-items"><img src="img/icons/af.png">
                  <p>Афиши</p></a>
                  <a  class="content-items"><img src="img/icons/ur.png">
                  <p>Юридическая помощь</p></a></div>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <?php
    include 'libs/footer.php';
    php?>
    
    <script src="/js/all.js"></script>
    <script src="/js/main.js"></script>
   <!--  <script>$('#in_reg').click(function(){$('.header-buttons').css('display','none');$('.header-login').css('display','flex');});</script> -->
  </body>
</html>