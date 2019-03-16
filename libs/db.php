<?php
require "rb.php";
header( 'Content-Type: text/html; charset=utf-8' );
R::setup( 'mysql:host=localhost;dbname=o9052991_socio35','o9052991_socio35', 'socio35' );
if(empty($_SESSION['logged_user'])) session_start();
function UserRoles()
{
    if(isset($_SESSION['logged_user']))
    {
        if($_SESSION['logged_user']->k_ch==1)
        {
            $Roles=1;
        }
        else
        {
            $Roles=2;
        }
    }
    else
    {
        $Roles=0;
    }
    
    return $Roles;
}
?>
