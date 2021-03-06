<?php

$app->get('/login',$guest(), function() use($app){
	$openlig = $app->openliga;
	$app->render('auth/login.php',['mates' => $openlig]);
})->name('login');


$app->post('/login',$guest(), function() use($app) {
	$request = $app->request;

	$identifier = $request->post('identifier');
	$password = $request->post('password');

	$v = $app->validation;
	$v->validate([
		'identifier' =>[$identifier, 'required'],
		'password' =>[$password, 'required']
	]);
	if($v->passes()) {
		$user = $app->user
			->where('username', $identifier)
			->orWhere('email',$identifier)
			->where('active', true)
			->first();
		if($user && $app->hash->passwordCheck($password,$user->password)){
				$_SESSION[$app->config->get('auth.session')] = $user->id;
				$app->flash('global', 'You are now signed in!');
			$app->response->redirect($app->urlFor('home'));


		} else {
			$app->flash('global', 'Could not log you in');
			$app->response->redirect($app->urlFor('login'));

		}

	}
	$app->render('auth/login.php',[
		'errors' => $v->errors(),
		'request' => $request
	]);

})->name('login.post');