<?php

function placeholdersReplace($text){
    $config = include('config.php');

    $lastPos = 0;

    foreach ($config->placeholders as $key => $val){
        $placeholder = '{'.$key.'}';
        while (($lastPos = strpos($text,$placeholder , $lastPos)) !== false) {
            if(substr($text,$lastPos-1,1) != '/'){
                $text = substr_replace($text,$val,$lastPos,strlen($placeholder));
            }else{
                $text[$lastPos-1] = '';
            }
            $lastPos = $lastPos + strlen($placeholder);
        }
    }

    return $text;
}