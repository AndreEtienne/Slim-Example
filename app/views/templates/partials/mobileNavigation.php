<nav class="pushy pushy-left">
  <ul>
      <li class="pushy-item"><a href="{{ urlFor ('home')}}">Home</a></li>
      {% if auth %}
    <li class="pushy-item"><a href="{{ urlFor ('logout')}}">Log out</a></li>
    <li class="pushy-item"><a href="{{ urlFor ('football')}}">Football</a></li>
      {% else %}
      <li class="pushy-item"><a href="{{ urlFor ('register')}}">Register</a></li>
    <li class="pushy-item"><a href="{{ urlFor ('login')}}">Login</a></li>
      {% endif %}
  </ul>
</nav>

