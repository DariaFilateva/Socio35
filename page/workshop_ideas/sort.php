<?
$post = (!empty($_POST)) ? true : false;
if($post) {
/*$response = array(
    'status' => true, 
    'replay' => $_POST['replay']);
 echo json_encode($response); exit();*/ 
 
//if($_POST['status']=='on') $sql = "SELECT  * FROM `admin_kch_project_workshop`"; 
//if($_POST['type']=='on') $sql = "SELECT  * FROM `admin_kch_project_workshop`"; 
if($_POST['sel']=="Реализация"){ $sql = "SELECT * FROM `admin_kch_project_workshop` WHERE `status`=1";} 
if($_POST['sel']=="Завершен") $sql = "SELECT * FROM `admin_kch_project_workshop` WHERE `status`=2"; 
$project = R::getAll($sql); 
$response = array(
    'status' => true, 
    'sql' => $project);
 echo json_encode($response); exit();

 
}
else
{
  $sql = "SELECT  * FROM `admin_kch_project_workshop`";
  $project = R::getAll($sql);
  $response = array(
    'status' => true, 
    'sql' => $_POST['replay']);
 echo json_encode($response); exit();

}