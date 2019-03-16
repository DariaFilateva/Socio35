<footer class="footer">
      <div class="footer-content">
        <div class="soc"><a href="https://vk.com/sociopolis35" aria-hidden="true" class="fa fa-vk fa-2x vk"></a><a href="#" aria-hidden="true" class="fa fa-facebook fa-2x facebook"></a><a href="http://www.thepictaram.club/instagram/chsu_media" aria-hidden="true" class="fa fa-instagram fa-2x instagram"></a><a href="#" aria-hidden="true" class="fa fa-twitter fa-2x twitter"></a></div>
        <div class="footer-menu">
          <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="#no_aut" class="open_modal">О проекте</a></li>
            <li><a href="#socio_yes_kch_no" class="open_modal">Контакты</a></li>
          </ul>
        </div>
      </div>
</footer>
    <div id="error1" class="authentication_modal modal_div"><span class="modal_close">X</span>
      <div class="modal-header"> <span>Ошибка</span></div>
      <form enctype="multipart/form-data" method="post" action="libs/registration.php" class="modal-content">
        <div class="content-right" style="width:100%;">
          <input type="date" placeholder="Дата рождения" name="date"/>
          <lable>Выберите фотографию профиля:</lable>
          <input type="file" name="photo" style="height: 28px;" class="none_border"/>
          <div class="line">
            <input type="checkbox" name="k_ch" class="check"/>
            <lable>Состою в команде Череповца</lable>
          </div>
          <lable>Если Вы не состоите в Команде Череповца, то вы можите вступить в неё пройдя по следующей<a href="#">ссылке</a></lable>
          <div class="line line2">
            <input type="checkbox" class="check"/>
            <lable>Согласен с <a href="https://www.socio35.ru/page/rules/rules.html">правилами</a> публикации и модерации сообщений</lable>
          </div>
          <input type="submit" name="btn_registration" class="button"/>
        </div>
      </form>
    </div>
    
    <div id="no_aut" class="authentication_modal modal_div"><span class="modal_close">X</span>
      <div class="modal-header"> <span>Ошибка</span></div>
      <form enctype="multipart/form-data" method="post" action="libs/registration.php" class="modal-content">
        <div class="content-right" style="width:100%;">
          
          <lable>Действие невозможно! Данное действие возможно только для челенов Команды Череповца. Просьба авторизоваться на сайте и убедиться, что Вы есть в Команде Череповца. Это можно сделать в личном кабинете.</a></lable>
        </div>
      </form>
    </div>
    
     <div id="socio_yes_kch_no" class="authentication_modal modal_div"><span class="modal_close">X</span>
      <div class="modal-header"> <span>Ошибка</span></div>
      <form enctype="multipart/form-data" method="post" action="libs/registration.php" class="modal-content">
        <div class="content-right" style="width:100%;">
          <lable>Действие невозможно! Данное действие возможно только для челенов Команды Череповца. Просьба изменить членство в команде через личный кабинет. Если Вы есть в Команде Череповца, но по какой-либо причине не смогли подтвердить своё членство при регистрации или через личный кабинет, Вы можете написать о проблеме на адрес:??????.</a></lable>
        </div>
      </form>
    </div>