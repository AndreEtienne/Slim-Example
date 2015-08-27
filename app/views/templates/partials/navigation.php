
<div class="row">
  <div class="menu-btn visible-xs col-xs-6">☰ Menu</div>
  {{ hallo }} 
  <div class="col-xs-6 hidden-xs">
    <ul class="list-inline">
        <li><a href="{{ urlFor ('home')}}">Home</a></li>
    		{% if auth %}
    	<li><a href="{{ urlFor ('logout')}}">Log out</a></li>
    	<li><a href="{{ urlFor ('football')}}">Football</a></li>
    		{% else %}
        <li><a href="{{ urlFor ('register')}}">Register</a></li>
    	<li><a href="{{ urlFor ('login')}}">Login</a></li>
    		{% endif %}
    </ul>
  </div>
  <div class="col-xs-6 text-right">
      {% if auth %}
      <span>Hello, {{ auth.getFullNameOrUsername }}!</span>
      {% endif %}
  </div>
</div>


