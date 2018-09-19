<?php

include_once('protected/placeholderWorker.php');
include_once('protected/main.php');

header('Content-Type: application/json');

$aResult = [];
if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

if( !isset($_POST['text']) ) { $aResult['error'] = 'No function arguments!'; }

if( !isset($aResult['error']) ) {

    switch($_POST['functionname']) {
        case 'add':
            if( is_array($_POST['text']) || (count($_POST['text']) > 1) ) {
                $aResult['error'] = 'Error in arguments!';
            }
            else {
                $base = new Base();
                $artId = $base->saveArticle($_POST['text']);
                if($artId !== false){
                    $aResult['result'] = ['id' => $artId,'text' => placeholdersReplace($_POST['text'])];
                }else{
                    $aResult['error'] = 'Can\'t save article!';
                }
            }
            break;

        default:
            $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
            break;
    }

}
echo json_encode($aResult);
