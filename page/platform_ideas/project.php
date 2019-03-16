<?php
require "db.php";
require "paginator.php";
?>

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
    <section style="background:url(../../img/platform_ideas/bg-projects.png); background-repeat: no-repeat; background-size: cover;" class="project">
      <div class="project-wrap"><a href="/page/platform_ideas/projects.php" class="project-title"><span
      <?php

        $db = new Database();
        $db->connect();

        $pr_id = (int)$_GET['id'];

        $db->select('admin_kch_bank_ideas','*','id='.$pr_id);//запрос
        $res = $db->getResult();

        if (strlen($res['name_ideas']) > 45)
        {
          echo ' style="font-size:20pt"';
        }

        echo '>'.$res['name_ideas'].'</span></a>
        <div class="project-content">
          <div class="project-description">
            <div>';
                $project_img=$res['url_file'];
                echo '<pre>'.$res['full_description'].'</pre><a href="'.$project_img.'" class="image-popup-no-margins"><img src="'.$project_img.'"></a></div></div>';
        
              
            echo '<div class="project-separator-top"></div>
          <div class="project-comments-wrap">';


          if (empty($_GET['page']) || ($_GET['page'] <= 0)) {
              $page = 1;
             }  else  {
            $page = (int) $_GET['page']; 
            }

          $db->select('Comment','count(comment_id) as num','id='.$pr_id);
          $countt = $db->getResult();
          $count=(int)$countt['num'];

          if($count == 0)
            {
              echo '<span id="null">К сожалению, ничего нет.<br>Оставьте первый комментарий!<span></div>';
            }
          else
          {
            $pr_on_page=10;
            $pages=ceil($count/$pr_on_page);

            $first = ($page * $pr_on_page) - $pr_on_page;

            $db->select('Comment','*','id='.$pr_id, 'comment_date ASC LIMIT '.$first.', '.$pr_on_page);
            $comments = $db->getResult();

            if((count($comments, COUNT_RECURSIVE) - count($comments)) > 0)
              {
                foreach($comments as $com ) 
                { 
                   echo '<div class="project-comments">
                     <div><img src="../../img/platform_ideas/bg-projects.png">';

                    $guest_id = $com['guest_id'];
                    //echo $guest_id;
                    $db->select('Guest','*','guest_id='.$guest_id);
                    $guest = $db->getResult();

                      echo '<p>'.$guest['name'].'<br><span style="font-size:12pt">'.date("d.m.y, H:i", strtotime($com['comment_date'])).'</span></p>';

                      
                    echo '</div><pre>'.$com['content'].'</pre></div>';
                }
              }
              else
              {
                   echo '<div class="project-comments">
                     <div><img src="../../img/platform_ideas/bg-projects.png">';

                    $guest_id = $comments['guest_id'];
                    $db->select('Guest','*','guest_id='.$guest_id);
                    $guest = $db->getResult();

                      echo '<p>'.$guest['name'].'<br><span style="font-size:12pt">'.date("d.m.y, H:i", strtotime($comments['comment_date'])).'<span></p>';

                      
                    echo '</div><pre>'.$comments['content'].'</pre></div>';
                    //echo "</div></div>";
              } 
              echo '</div><div id="paginator">';
              pagination($count,$pr_on_page,2,$page,$css_style,"page/platform_ideas/project.php?id=".$pr_id,'&');
              echo '</div>';
          }           

          ?>
            
          <div class="project-comments-wrap">
            <div class="project-add-comment"><span>Добавить новый комментарий</span>
              <form method="post" action="page/platform_ideas/add_comment.php?id=<?php echo $pr_id?>">
                <div class="com_user">
                  <input type="text" name="name" required placeholder="Введите Ваше имя">
                  <input type="email" name="email" required placeholder="Введите Ваш e-mail">
                </div>
                <div class="com_context">
                  <textarea name="content" required placeholder="Введите текст комментария"></textarea>
                </div>
                <button name="add_com" type="submit" value="Добавить комментарий" class="lat_services-button">Добавить комментарий</button>
              </form>
            </div>
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
    <script src="/js/platform_ideas_project.js"></script>
    <script src="/js/popup.js"></script>
  </body>
</html>