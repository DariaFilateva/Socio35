<?php require "db.php";

$data=$_POST;

if( isset($data['do_login'])){
    $errors=array();
    $user=R::findOne('users','email= ?', array($data['email']));
    if($user){
// prov password
        if(md5($data['password']) == $user['password']){


            $_SESSION['logged_user']=$user;

            

            header('Location: /');
        }else{
            $errors[]='Incorrect password';
        }
    }else{
        $errors[]='Пользователь не найден! Проверьте введённый e-mail';
    }


    if(!empty($errors)){
       echo '<div style="color: red; text-align: center; background-color: azure;">'.array_shift($errors).'</div><hr>' ;

    }
}
php?>