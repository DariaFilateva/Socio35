<?php
require "../../libs/db.php";

if ( !R::testConnection() )
{
    exit ('Нет соединения с базой данных');
}

$sql = "SELECT  id,short_description,point,full_description,count_member,url_file,name_event, max(date) FROM `admin_kch_event` ORDER BY id,full_description,short_description,point,count_member,url_file,name_event"; 
$next_event = R::getAll($sql);
$next_event=array_shift($next_event);
array_pop($next_event);//delet date
switch(UserRoles())
{
    case 0 : $id=" href=\"#no_aut"."\""; break;
    case 1 : $id=" href=\"#modaleventkch".$next_event['id']."\"";  break;
    case 2 : $id=" href=\"#socio_yes_kch_no"."\""; break;
}
//$id=" href=\"#modaleventkch".$next_event['id']."\"";
$slesh="http://www.admin.socio35.ru/";

if(isset($_GET[date])) $date=$_GET[date];
else $date=date("Y-m-d");

$all_event_sql = "SELECT  * FROM `admin_kch_event` WHERE date='".$date."';"; 
$all_event=R::getAll($all_event_sql);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8"/>
    <base href="/"/>
    <title>Социо35</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" media="all" href="/css/main_global.css"/>
    <link rel="stylesheet" media="all" href="/css/popup.css"/>
    <link rel="stylesheet" media="all" href="/css/pages/leisure_and_tourist.css">
    <link rel="stylesheet" media="all" href="/css/pages/eventkch.css">
    <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php
    include '../../libs/header.php';
    php?>
    <section style="background:#ffffff; background-repeat: no-repeat;  background-size: cover;" class="lat_services">
      <div class="fonch">
        <div class="wall">
          <div class="calen">
            <div type="text" class="calendar"></div>
          </div><a <?php echo $id; echo 'style="background: url('.$slesh.$next_event['url_file'].');background-size: 100%; background-repeat: no-repeat;"'; ?>  class="actual open_modal">
            <div class="wyl">
              <div class="actual-l"><?php echo $next_event['point']." "; ?> баллов</div>
              <div class="actual-r"><?php echo $next_event['count_member']." "; ?>  человек</div>
            </div>
            <div class="actual-text"> <span><?php echo $i = iconv_substr ($next_event['short_description'], 0 , 80 , "UTF-8")."..."; ?></span></div></a>
        </div>
        <div class="fle">
            <?php
              foreach($all_event as $item)
                {
                    switch(UserRoles())
                    {
                        case 0 : $href='#no_aut';; break;
                        case 1 : $href='#modaleventkch'.$item['id'].'';  break;
                        case 2 : $href='#socio_yes_kch_no'; break;
                    }
                    echo '<a href="'.$href.'" style="background: url('.$slesh.$item['url_file'].');background-size: 100%;background-repeat: no-repeat;" class="fle-actual open_modal"><div class="fle-wyl"><div class="fle-actual-l">'.$item['point'].' баллов</div><div class="fle-actual-r">'.$item['count_member'].' человек</div></div><div class="fle-actual-text"> <span>'.$i = iconv_substr ($item['short_description'], 0 , 80 , "UTF-8")."...".'</span></div></a>';
                }

             ?>
            </div>
      </div>
    </section>

<?php
echo '<div id="modaleventkch'.$next_event['id'].'" class="authentication_modal modal_div"><span class="modal_close">X</span>
      <div class="modal-header"> <span>'.$next_event['name_event'].'</span></div>
      <form method="post" style=" flex: 1; overflow: auto;" class="modal-content js-send-form">
        <div class="content-event">
          <p> '.$next_event['full_description'].'</p>
          <div class="line"></div>
          <div class="wrap">
            <div class="left">
            <input type="text" style="display: none;" value="'.$next_event['id'].'" name="id">
            <input type="text" style="display: none;" value="'.$next_event['name_event'].'" name="theme">
              <input type="text" placeholder="ФИО" name="name">
              <input type="tel" placeholder="Телефон" name="phone">
              <input type="email" placeholder="e-mail" name="contact">
              <textarea placeholder="Примечания" name="text" class="ta"></textarea>
            </div>
            <div class="right">
              <input onclick="reconn();" type="submit" value="Записаться" class="button">
            </div>
          </div>
        </div>
      </form>
    </div>';

?>

<?php  
foreach($all_event as $item)
{ 
echo '<div id="modaleventkch'.$item['id'].'" class="authentication_modal modal_div"><span class="modal_close">X</span>
      <div class="modal-header"> <span>'.$item['name_event'].'</span></div>
      <form method="post" style=" flex: 1; overflow: auto;" class="modal-content js-send-form">
        <div class="content-event">
          <p> '.$item['full_description'].'</p>
          <div class="line"></div>
          <div class="wrap">
            <div class="left">
            <input type="text" style="display: none;" value="'.$item['id'].'" name="id">
            <input type="text" style="display: none;" value="'.$item['name_event'].'" name="theme">
              <input type="text" placeholder="ФИО" name="name">
              <input type="tel" placeholder="Телефон" name="phone">
              <input type="email" placeholder="e-mail" name="contact">
              <textarea placeholder="Примечания" name="text" class="ta"></textarea>
            </div>
            <div class="right">
              <input onclick="reconn();" type="submit" value="Записаться" class="button">
            </div>
          </div>
        </div>
      </form>
    </div>';
}

?>
    <?php
    include '../../libs/footer.php';
    php?>
    
    
    <script src="/js/all.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/popup.js"></script>
    <script src="/js/lib_calendar.js"></script>
    <script src="/js/calendar_eventkch.js"></script>
    <script>
        $('.js-send-form').submit(function(){
	var that = $(this);

	$.ajax({
		url: 'https://www.socio35.ru/page/eventkch/mail.php',
		data: that.serialize(),
		type: 'POST',
		success : function(data){
			var data = JSON.parse(data)

			that[0].reset();
		},
		error: function(data){
			
		}
	})


	return false;
})
    function reconn()
    {
        
        location.replace("https://www.socio35.ru/page/eventkch/eventkch.php");
    }
    </script>
    
  </body>
</html>
<?php R::close(); ?>