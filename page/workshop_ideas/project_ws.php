<?php
require "../../libs/db.php";
header( 'Content-Type: text/html; charset=utf-8' );
if(isset($_POST['btn_sort'])) 
{
   /* if($_POST['sel']=='Реализация') $status=1; else $status=2;
    
     $sql = 'SELECT  * FROM `admin_kch_project_workshop` WHERE `status`='.$status.''; */
    if($_POST['status']=='on')
    {
        if($_POST['sel']=='Реализация') $status=1; else $status=2;
        
        $sql = 'SELECT  * FROM `admin_kch_project_workshop` WHERE `status`='.$status.''; 
    }
    else
    {
        if($_POST['sel']=='Акция') $type=1; else $type=2;
        $sql = 'SELECT  * FROM `admin_kch_project_workshop` WHERE `type`='.$type.''; 
    }

$project = R::getAll($sql);

}
else
{
  $sql = "SELECT  * FROM `admin_kch_project_workshop`";
  $project = R::getAll($sql);
}


?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <title>Социо35</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" media="all" href="/css/main_global.css"/>
    <link rel="stylesheet" media="all" href="/css/popup.css"/>
    <link rel="stylesheet" media="all" href="/css/pages/workshop_ideas.css">
    <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
    <style>
        .button_sort
        {
            margin-top: 20px;
            display: inline-block;
            border: none;
            color: #fff;
            text-decoration: none;
            background-color: #da251d;
            padding: 10px 35px;
            font-family: Helvetica;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 600;
            border-radius: 2px;
            text-align: center;
            position: relative;
            outline: none;
            transition: background-color .1s ease;
            cursor: pointer; 
        }
    </style>
  </head>
  <body>

    <?php
    include '../../libs/header.php';
    php?>
    <section style="background-repeat: no-repeat;  background-size: cover;" class="bank_ideas"> 
      <div class="wrap-bank_ideas">
        <form method="post" action="https://www.socio35.ru/page/workshop_ideas/project_ws.php" class="sort">
          <div class="sort_check">
            <p class="textt">Сортировка:</p>
            <input type="checkbox" name="status" class="ch_ch ch1" checked >
            <p class="text">по статусу</p>
            <input type="checkbox" name="type" class="ch_ch ch2" >
            <p class="text">по типу</p>
          </div>
          <select class="sort_list" name="sel">
            <option id="option1">Реализация</option>
            <option id="option2">Завершен</option>
          </select>
          <button type="submit" name="btn_sort" class="button_sort" value="Отсортировать">Отсортировать</button>
        </form>
        <div class="wrap">
        <?
              foreach($project as $item)
              {
                    switch(UserRoles())
                    {
                        case 0 : $href='#no_aut';; break;
                        case 1 : $href='#modalpw'.$item['id'].'';  break;
                        case 2 : $href='#socio_yes_kch_no'; break;
                    }
                  if($item['status']==1) $item['status']="реализация";else $item['status']="завершен";
                  if($item['type']==1) $item['type']="Акция";else $item['type']="Мероприятие";
                  echo'
                 <div class="item open_modal" href="'.$href.'" style="cursor:pointer;">
                    <div class="cards">
                      <div class="head-cards">
                        <p class="text">'.$item['type'].'</p>
                      </div>
                      <div class="content-cards">
                        <p class="text">'.iconv_substr ($item['short_description'], 0 , 80 , "UTF-8").'</p>
                      </div>
                      <div class="f-cards">
                        <p class="text">Статус проекта: '.$item['status'].'</p>
                      </div>
                    </div>
                  </div>';
                  
                  echo '
                <div id="modalpw'.$item['id'].'" class="authentication_modal modal_div"><span class="modal_close">X</span>
                  <div class="modal-header"> <span>Полное описание проекта</span></div>
                  <form enctype="multipart/form-data" method="post" action="libs/registration.php" class="modal-content">
                    <div class="content-right" style="width:100%;">
                      
                      <lable>'.$item['full_description'].'</lable>
                    </div>
                  </form>
                </div>';
              }
          ?>
        </div>
      </div>
    </section>
     <?php
    include '../../libs/footer.php';
    php?>
    
    
    <script src="/js/all.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/popup.js"></script>
    <script src="/js/lib_calendar.js"></script>
    <script src="/js/calendar_eventkch.js"></script>
    <script>   

    $( ".ch2" ).change(function() {

        if($(".ch2").prop('checked'))
        {
          if($(".ch1").prop('checked'))  $(".ch1").prop("checked" , false);
           
           $("#option1").text("Акция")
           $("#option2").text("Мероприятие")
        

        }
      
    });
        $( ".ch1" ).change(function() {
        
        if($(".ch1").prop('checked'))
        {
          if($(".ch2").prop('checked'))  $(".ch2").prop("checked" , false);
          $("#option1").text("Реализация")
           $("#option2").text("Завершен")
           
        }

      
    });

    </script>
  </body>
</html>