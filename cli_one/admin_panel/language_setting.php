<?php
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

switch ($lang){
    case "en":
        //echo "PAGE EN";
        include("language/en_lang.php");
        break;
    default:
        //echo "PAGE EN - Setting Default";
        include("language/en_lang.php");//include EN in all other cases of different lang detection
        break;
}