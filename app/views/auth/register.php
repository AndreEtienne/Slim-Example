{% extends 'templates/default.php'%}
{% block title %}Register{% endblock %}
{% block content %}
<form action="{{ urlFor ('register.post')}} "  method="post" autocomplete="off">
<div class="row">
  <div class="form-group col-sm-6 col-sm-offset-3">
    <label for="email">Email</label>
    <input class="form-control" type="text" name="email" id="email" {%if request.post ('email')%}value="{{request.post('email')}}"{%endif%} >
    <span class="app-puls"><div>{% if errors.first('email') %}{{ errors.first('email')}}{% endif %}</div></span>
  </div>
  <div class="form-group  col-sm-6 col-sm-offset-3">
    <label for="username">Username</label>
    <input class="form-control" type="text" name="username" id="username" {%if request.post ('username')%}value="{{request.post('username')}}"{%endif%} >
    <span>{% if errors.first('username') %}{{ errors.first('username')}}{% endif %}</span>
  </div >
    <div class="form-group  col-sm-6 col-sm-offset-3">
    <label for="password">Password</label>
    <input class="form-control" type="password" name="password" id="password"  >
      {% if errors.first('password') %}{{ errors.first('password')}}{% endif %}
  </div>
  <div class="form-group  col-sm-6 col-sm-offset-3">
    <label for="password_confirm">Password Confirm</label>
    <input class="form-control" type="password" name="password_confirm" id="password_confirm"  >
    {% if errors.first('password_confirm') %}{{ errors.first('password_confirm')}}{% endif %}
  </div>
  <div class="col-xs-12 col-sm-offset-3">
   <button  type="submit" class="btn btn-app-default" value="Register">Register</button>

  </div>
  <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
</div>
</form>
{% endblock %}
