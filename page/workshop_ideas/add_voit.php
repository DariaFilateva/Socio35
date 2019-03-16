<?
require "../../libs/db.php";
header( 'Content-Type: text/html; charset=utf-8' );

$post = (!empty($_POST)) ? true : false;
if($post) {
$postData = file_get_contents('php://input');
$data = json_decode($postData, true);
    if($data['golos']=="yes")
    {
        $sql = 'UPDATE `admin_kch_bank_ideas`  SET `voit_yes`=`voit_yes`+1  WHERE id='.$data['id_voit'].'';
        $sql2 = 'INSERT INTO `VoitingUsers` (`id_user_voit`, `id_voit`) VALUES ('.$data['id_user'].', '.$data['id_voit'].')';

    } 
    else
    {
        $sql = 'UPDATE `admin_kch_bank_ideas`  SET `voit_no`=`voit_no`+1  WHERE id='.$data['id_voit'].' ';
        $sql2 = 'INSERT INTO `VoitingUsers` (`id_user_voit`, `id_voit`) VALUES ('.$data['id_user'].', '.$data['id_voit'].')';
    }
    

    R::exec($sql);
    R::exec($sql2);

$response = array(
    'status' => true);
 echo json_encode($response); 

 
}
else
{

  $response = array('status' => false);
 echo json_encode($response); 

}