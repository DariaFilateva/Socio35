<?php
require "db.php";
require "paginator.php";?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <base href="/"/>
    <title>Социо35</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" media="all" href="/css/main_global.css"/>
    <link rel="stylesheet" media="all" href="/css/pages/platform_ideas.css">
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
    <section style="background:url(../../img/platform_ideas/bg-projects.png); background-repeat: no-repeat; background-size: cover;" class="lat_services">
      <div class="lat_services-wrap"><a href="/page/platform_ideas/projects.php?page=1" class="lat_services-title"><span>Проекты</span></a>
        <div class="lat_services-content">
          <div class="lat_services-description"> Здесь Вы можете обсудить с другими пользователями городские и региональные проекты, а также предложить какие-то свои идеи. Если же Вы хотите узнать, что о ней думают другие люди, Вы можете спросить их об этом в <a href="/page/platform_ideas/voting.php">голосовании</a>.</div>


          <a onclick="showA();" class="lat_services-button">Предложить идею</a>
          <div id="b"></div>
          <div id="a">
            <div id="windows"><a onclick="hideA();" style="float: right;" class="pages">X</a>
              <form method="post" class="forma" action="page/platform_ideas/add_project.php" enctype=multipart/form-data>
                <h2>ПРЕДЛОЖИТЬ ИДЕЮ</h2>
                <fieldset>
                  <p>Предложите свой проект, и другие пользователи смогут обсудить его в комментарияx</p>
                  <input id="head" name="head" type="text" placeholder="Название проекта" required maxlength="100">
                  <textarea id="desc" name="desc" placeholder="Описание проекта" required maxlength="5000"></textarea>

                  <input type="file" name="uploadfile" id="add_img" value="Добавить изображение" accept="image/jpeg,image/png" data-buttonText="Добавить изображение">         

                  <button name="add_pr" type="submit" value="Отправить" class="lat_services-button">Отправить</button>
                </fieldset>
              </form>
            </div>
          </div>


          <div class="lat_services-list">
            <div class="square-list">
          <?php

            $db = new Database();
            $db->connect();

            /*
            $pr_on_page - количество записей для вывода
            $first - с какой записи выводить
            $count - всего записей
            $page - текущая страница
            $pages - количество страниц для пагинации
            */


            

            $db->select('admin_kch_bank_ideas','count(id) as num','condition_id=1');

            $countt = $db->getResult();
            $count=(int)$countt['num'];
            if($count== 0)
            {
              echo '<a class="square-list" ><span>'.'К сожалению,<br>ничего нет</div></div>';
            }

            else
            {
              if (empty($_GET['page']) || ($_GET['page'] <= 0)) {
              $page = 1;
               }  else  {
              $page = (int) $_GET['page']; 
              }

              $pr_on_page=8;
              $first = ($page * $pr_on_page) - $pr_on_page;
              // Количество страниц для пагинации
              $pages = ceil($count / $pr_on_page);
              // формируем пагинацию                           

              $db->select('admin_kch_bank_ideas','*','condition_id=1', 'id DESC LIMIT '.$first.', '.$pr_on_page);
              $projects = $db->getResult();

              if((count($projects, COUNT_RECURSIVE) - count($projects)) > 0)
              {
                foreach($projects as $pr ) 
                { 
                   echo '<a href="/page/platform_ideas/project.php?id='.$pr['id'].'">';
                   if($pr['url_file'] == '')
                   {
                    echo '<img src="img/platform_ideas/project_standart.png">';
                   }
                   else
                   {
                    echo '<img src="'.$pr['url_file'].'">';
                   }
                   echo '<span';
                   if (strlen($pr['name_ideas']) > 45)
                   {
                    echo ' style="font-size:14pt"';
                   }
                   echo '>'.$pr['name_ideas'].'</span></a>';
                }

                echo '</div></div>';
              }
              else
              {
                   echo '<a href="/page/platform_ideas/project.php?id='.$projects['id'].'">';
                   if($projects['url_file'] == '')
                   {
                    echo '<img src="img/platform_ideas/project_standart.png">';
                   }
                   else
                   {
                    echo '<img src="'.$projects['url_file'].'">';
                   }
                   
                   '<span>'.$projects['name_ideas'];

                echo '</span></a></div></div>';
                
              }  
              echo '<div id="paginator">';             
                pagination($count,$pr_on_page,2,$page,$css_style,"page/platform_ideas/projects.php",'?');
              echo '</div>';
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
    <script src="/js/platform_ideas_project.js"></script>
  </body>
</html>