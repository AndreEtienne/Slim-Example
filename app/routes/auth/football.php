<?php
$app->get('/football' ,function() use($app){
    $openlig = $app->openliga;
    $days = $app->openligaDays;
    print_r($days) ;
    $app->render('auth/football.php',['mates' => $openlig,'days' => $days]);
})->name('football');