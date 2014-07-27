<?php
ob_start();

if(is_dir('install') && !isset($_GET['end'])){
    header("LOCATION: install/");
}else{
    if(isset($_GET['end'])){
        switch($_GET['end']){
            case '1':{
                if(is_dir('install')) rmdir('install');
                header("LOCATION: home.php");
            break;
            }
            case '2':{
                if(is_dir('install')) rename ('install', 'installed');
                header("LOCATION: home.php");
            break;
            }
            default:{
                header("LOCATION: home.php");
            break;
            }
        }
    }else{
        header("LOCATION: home.php");
    }
}

?>
