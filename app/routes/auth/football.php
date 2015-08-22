<?php
$app->get('/football' ,function() use($app){
    $openlig = $app->openliga;
    $app->render('auth/football.php',['mates' => $openlig]);
})->name('football');