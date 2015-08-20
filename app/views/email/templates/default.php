{% if auth %}
<p>hello {{ auth.getFullNameUsername() }},</p>
{% else %}
	<p>Hello there,</p>
{% endif %}

{% block content %}{%  endblock  %}