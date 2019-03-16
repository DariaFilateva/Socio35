<?php
require "db.php";
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
    <section style="background:url(../../img/platform_ideas/bg-voting.png); background-repeat: no-repeat; background-size: cover;" class="project">
      <div class="project-wrap"><a href="/page/platform_ideas/voting.php" class="project-title"><span>Опросы и голосования</span></a>
        <div class="project-content">
          <div class="vote_top">
            <div class="vote-content">
              <div class="description">
                <div><span>
                <?php

                  $db = new Database();
                  $db->connect();

                  $date = date("Y-m-d H:i:s");
                  $date_end = date("Y-m-d H:i:s", strtotime("-5 days"));
                  // echo $date_end;

                  $db->delete('IP_voting', 'date_ip<'.$date_end);

                  $db->select('Voting','*','icondition_id=3 AND \''.$date.'\' BETWEEN date_start AND date_end');
                  $top_vote = $db->getResult();
                  echo $top_vote['question'];

                  $top_vote_id = $top_vote['voting_id'];

                  $db->select('Variant','*','voting_id='.$top_vote_id);
                  $top_var = $db->getResult();

                  $ip_s = $_SERVER['REMOTE_ADDR']; 
                  $ip = sprintf('%u', ip2long($ip_s));

                  $db->select('IP_voting', '*','voting_id='.$top_vote_id.' AND ip='.$ip);
                  $res = $db->getResult();
                  // print_r($res);

                  if ($res)
                  {
                    echo '</span></div></div><div id="top_res">';
                    foreach($top_var as $var)
                          {
                            $t_v_id = $var['variant_id'];
                            echo '<p>
                              
                              <label style="color:#da251d">'.$var['answer'].' – '.$var['variant_result'].'</label>
                            </p>';
                          }
                          echo '</div>';
                  }
                  else
                  {



                  echo '</span></div></div>
                  <form method="post" class="vote-form-top" style="align-self: center" action="page/platform_ideas/vote.php?id='.$top_vote_id.'">';

                          foreach($top_var as $var)
                          {
                            $t_v_id = $var['variant_id'];
                            echo '<p>
                              <input type="radio" name="name'.$top_vote_id.'" value="'.$t_v_id.'" id="tv'.$t_v_id.'" required>
                              <label for="tv'.$t_v_id.'">'.$var['answer'].'</label>
                            </p>';
                          }
                        // }
                ?>
                <p>
                  <button name="vote" type="submit" value="Проголосовать" class="lat_services-button">Проголосовать</button>
                </p>
              </form> <?php } ?>
            </div>
          </div>
          <div class="block-slider">
            <div class="sections-title"> Актуальные сейчас</div>
            

              

              <?php              

              $db->select('Voting','count(voting_id) as num','icondition_id=2 AND \''.$date.'\' BETWEEN date_start AND date_end');
              $countt = $db->getResult();
              $count=(int)$countt['num'];

              if($count == 0)
                {
                  echo '<span id="null">К сожалению, ничего нет</span><div><br><br>';
                }

                else
                {
                  $vote_li = 2;
                  $count_li = ceil($count/$vote_li);
                  $num = 0;

                  echo '<div class="sections-slider"> 
              <div id="goToPrevSlide3" class="prev"></div>
              <div id="goToNextSlide3" class="next"></div><ul id="lightSlider3">';
                  

                  $db->select('Voting','*','icondition_id=2 AND\''.$date.'\' BETWEEN date_start AND date_end');
                  $all_voting = $db->getResult();

                  
                  //echo "</ul>";

                  for($i=0; $i<$count_li; $i++)
                  {

                    echo '<li>
                    <div class="slid-content">';
                      

                      $j = 0;
                      while( ($j<2) AND ($num<$count))
                      {
                        $voting = $all_voting[$num];
                        $vote_id = $voting['voting_id'];
                        $num++;
                        $j++;
                      
                      $db->select('IP_voting', '*','voting_id='.$vote_id.' AND ip='.$ip);
                      $res = $db->getResult();

                      if ($res)
                      {echo '<a class="content-items"><p style="color:#da251d">'.$voting['question'].'</p>';
                        $db->select('Variant','*','voting_id='.$vote_id);
                          $variants = $db->getResult();

                          echo '<div  class="vote-result">';

                        foreach($variants as $var)
                              {
                                $v_id = $var['variant_id'];

                                echo '<p>
                                  
                                  <label>'.$var['answer'].' – '.$var['variant_result'].'</label>
                                </p>';
                              }
                              echo '</div>';
                      }
                      else
                      {
                        echo '<a class="content-items"><p>'.$voting['question'].'</p>';
                        echo '<form method="post" class="vote-form" action="page/platform_ideas/vote.php?id='.$vote_id.'">';
                          $db->select('Variant','*','voting_id='.$vote_id);
                          $variants = $db->getResult();

                          foreach($variants as $var)
                          {
                            $v_id = $var['variant_id'];
                            echo '<p>
                              <input type="radio" name="name'.$vote_id.'" value="'.$v_id.'" id="v'.$v_id.'" required>
                              <label for="v'.$v_id.'">'.$var['answer'].'</label>
                            </p>';
                          }?>
                            <p>
                            <button name="vote" type="submit" value="Проголосовать" class="lat_services-button">Проголосовать</button>
                            </p>
                           </form><?php } ?>
                        </a>
                      <?php } }?>
                      
                      </div></li><li><div id="vote_end">
                <p>Спасибо за участие!</p>
                <span>Если вы не нашли что-то, что вас беспокоит,</span><br>
                <span>отправьте вопрос нам, и тогда он появится на сайте.</span></div>
                 <?php       
                }
                ?>
                
                
                </li>
              </ul>
            </div>
          </div>
          <div class="project-comments-wrap"><span>Если вы хотите поднять какой-либо вопрос на всеобщее обозрение, кликните на кнопку ниже для заполнения соответствующей формы.</span></div><a onclick="showA();" class="lat_services-button">Предложить вопрос</a>
          <div id="b"></div>
          <div id="a">
            <div id="windows"><a onclick="hideA();" style="float: right;" class="pages">X</a>
              <form method="post" class="forma_vote" action="page/platform_ideas/add_voting.php">
                <h2>ПРЕДЛОЖИТЬ ВОПРОС</h2>
                <fieldset>
                  <p>Спросите у остальных, что они думают об этом</p>
                  <textarea id="desc" name="quest" placeholder="Введите здесь Ваш вопрос. Постарайтесь сделать это кратко." required></textarea>
                  <div id="fields">
                  <div><input id="variant1" name="variant1" type="text" placeholder="Вариант ответа" required></div>
                  <input id="variant2" name="variant2" type="text" placeholder="Вариант ответа" required>
                  </div>
                  <input type="button" id="add_var" value="Добавить вариант ответа" onclick="return add_new_field();">
                  <button name="add_vot" id="add_vot" value="Отправить голосование" class="lat_services-button">Отправить</button>
                </fieldset>
              </form>
            </div>
          </div>
          <div class="block-slider">
            <div class="sections-title"> Прошедшие голосования</div>
            <div class="sections-slider"> 
              <div id="goToPrevSlide4" class="prev"></div>
              <div id="goToNextSlide4" class="next"></div>
              <ul id="lightSlider4">

            <?php              

              $db->select('Voting','count(voting_id) as num','icondition_id=2 AND \''.$date.'\' > date_end');
              $countt = $db->getResult();
              $count=(int)$countt['num'];

              if($count == 0)

                {
                  echo '<span id="null">К сожалению,<br>ничего нет</span>';
                }

                else
                {
                  $vote_li = 2;
                  $count_li = ceil($count/$vote_li);
                  $num = 0;

                  

                  $db->select('Voting','*','icondition_id=2 AND\''.$date.'\' > date_end');
                  $all_voting = $db->getResult();


                  for($i=0; $i<$count_li; $i++)
                  {?>

                    <li>
                    <div class="slid-content">
                      
                      <?php
                      $j = 0;
                      while( ($j<2) AND ($num<$count))
                      {
                        $voting = $all_voting[$num];
                        $vote_id = $voting['voting_id'];
                        $num++;
                        $j++;
                      echo '<a class="content-items"><p style="color:#da251d">'.$voting['question'].'</p>';



                        echo '<form class="vote-result">';
                          $db->select('Variant','*','voting_id='.$vote_id);
                          $variants = $db->getResult();

                          foreach($variants as $var)
                          {
                            // $v_id = $var[variant_id];
                            echo '<p>
                              <span>'.$var['answer'].' – '.$var['variant_result'].'</span>
                            </p>';
                          }?>
                           </form>
                        </a>
                      <?php } ?>
                      
                      </div></li>
                 <?php }      
                }
                ?>

              </ul>
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
    <script src="/js/slider.js"></script>
    <script src="/js/platform_ideas_vote.js"></script>
    <script src="/js/add_variant.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  </body>
</html>