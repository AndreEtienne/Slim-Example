{% extends 'email/templates/default.php'  %}

{%  block content %}
	<p>You have Registered!</p>

	<p>Activate your Account using this link:{{ baseUrl  }}{{urlFor('activate')}}?email={{ user.email }}&identifier={{identifier|url_encode}}</p>
{%  endblock  %}