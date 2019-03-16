<header>
      <div class="header-content">
      <!--   <p>#социополис<span>35</span></p> -->
        <img style="margin: 10px 30px 10px 0px" src="/img/logotip.png">
<?php        if( isset($_SESSION['logged_user'])):   ?>
<?php 
//header( 'Content-Type: text/html; charset=utf-8' );
$short_name="";
$url_avatar="";
$domen_url="https://www.socio35.ru/";
if($_SESSION['logged_user']->photo==""){$short_name=$_SESSION['logged_user']->name;} else{$short_name=" ";$url_avatar='background:url('.$domen_url.$_SESSION['logged_user']->photo.');';}
echo '<div  class="header-login">
          <a style="width:80px;height:80px;text-decoration: none;  background-repeat: no-repeat; '.$url_avatar.' background-size: cover;" href="https://www.socio35.ru/page/lk/lk.php" class="avatar"><span>'.substr($short_name,0,-(strlen($short_name)-2)).'</span></a>
          <div class="user-inf">
            <p>'.$_SESSION['logged_user']->name.'</p>
            <p>'.$_SESSION['logged_user']->email.'</p>
          </div>
          <a style="text-decoration: none; align-self: start;" href="https://www.socio35.ru/exit.php"><img style="width:30px;height:30px;margin:30px 0px 30px 50px;" src="/img/icons/logout.png"></a>
        </div>';
        
        ?>
<?php endif;  ?>
        <!-- <div style="display: none" class="header-login">
          <a style="text-decoration: none;" href="https://www.socio35.ru/page/lk/lk.php" class="avatar"><span>И</span></a>
          <div class="user-inf">
            <p>Иванов Иван</p>
            <p>ivanov@mail.ru</p>
          </div>
        </div> -->
        <?php if(empty($_SESSION['logged_user'])) echo '<div  class="header-buttons"><a href="#modal1" class="open_modal authentication_button">Вход</a><a href="#modal2" class="open_modal authentication_button second-color_button">Регистрация</a></div>'; ?>
        <!-- <div  class="header-buttons"><a href="#modal1" class="open_modal authentication_button">Вход</a><a href="#modal2" class="open_modal authentication_button second-color_button">Регистрация</a></div> -->
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
     <div id="overlay"></div>
    <div id="modal2" class="authentication_modal modal_div"><span class="modal_close">X</span>
      <div class="modal-header"> <span>Регистрация</span></div>
      <form enctype="multipart/form-data" method="post" action="libs/registration.php" class="modal-content">
        <div class="content-left">
          <input type="text" placeholder="Фамилия" name="surname"/>
          <input type="text" placeholder="Имя" name="name"/>
          <input type="text" placeholder="Отчество" name="patronymic_name"/>
          <input type="tel" placeholder="Телефон" name="tel"/>
          <input type="email" placeholder="e-mail" name="email"/>
          <input type="password" placeholder="Пароль" name="password"/>
          <input type="password" placeholder="Повторите пароль" name="password_req"/>
        </div>
        <div class="content-right">
          <input type="date" placeholder="Дата рождения" name="date"/>
          <lable>Выберите фотографию профиля:</lable>
          <input type="file" name="photo" style="height: 28px;" class="none_border"/>
          <div class="line">
            <input type="checkbox" name="k_ch" class="check"/>
            <lable>Состою в команде Череповца</lable>
          </div>
          <lable>Если Вы не состоите в Команде Череповца, то вы можите вступить в неё пройдя по следующей<a href="https://xn--80aaahiha9aslihmm8gj.xn--p1ai/" target="_blank">ссылке</a></lable>
          <div class="line line2">
            <input type="checkbox" class="check"/>
            <lable>Согласен с <a href="https://www.socio35.ru/page/rules/rules.html">правилами</a> публикации и модерации сообщений</lable>
          </div>
          <input type="submit" name="btn_registration" class="button"/>
        </div>
      </form>
    </div>
    <div id="modal1" class="authentication_modal modal_div"><span class="modal_close">X</span>
      <div class="modal-header"><span>Авторизация</span></div>
      <form method="post" action="https://www.socio35.ru/libs/auth.php" class="modal-content"><!-- заменить див на form -->
        <div class="content-right content">
          <input type="email" placeholder="e-mail" name="email" />
          <input type="password" placeholder="Пароль" name="password" />
          <div class="line">
            <input type="checkbox" class="check"/>
            <lable>Запомнить</lable>
          </div>
          <button id="in_reg" name="do_login" type="submit" style="font-family: Helvetica;" class="button">Войти</button>
        </div>
      </form><!-- заменить див на form -->
    </div>