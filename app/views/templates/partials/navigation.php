{% if auth %}
Hello, {{ auth.getFullNameOrUsername }}!
<img  src="{{ auth.getAvatarUrl ({size: 30}) }}" >

{% endif %}

<ul>
    <li><a href="{{ urlFor ('home')}}">Home</a></li>
		{% if auth %}
	<li><a href="{{ urlFor ('logout')}}">Log out</a></li>
	<li><a href="{{ urlFor ('football')}}">Football</a></li>
		{% else %}
    <li><a href="{{ urlFor ('register')}}">Register</a></li>
	<li><a href="{{ urlFor ('login')}}">Login</a></li>
		{% endif %}


</ul>

