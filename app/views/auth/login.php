{% extends 'templates/default.php'%}
{% block title %}Login{% endblock %}
{% block content %}


<form action="{{urlFor('login.post')}}" method="post" autocomplete="off">
	<div class="row">
  <div class="form-group col-sm-6 col-sm-offset-3">
		<label for="identifier">Username/email</label>
		<input class="form-control"  type="text" name="identifier" id="identifier">
		{% if errors.first('identifier')%}{{ errors.first('identifier') }}{%endif%}
	</div>
	<div class="form-group col-sm-6 col-sm-offset-3">
		<label for="password">Password</label>
		<input class="form-control"  type="password" name="password" id="password">
		{% if errors.first('password')%}{{ errors.first('password') }}{%endif%}
	</div>
	<div class="col-xs-12 col-sm-offset-3">
		<button  class="btn btn-app-default" type="submit" value="Login">Login</button>
	</div>
	<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
	</div>
</form>
{% endblock %}
