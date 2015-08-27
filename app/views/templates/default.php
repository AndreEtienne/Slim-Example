
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Website | {% block title %}{% endblock %}</title>
    <link rel="stylesheet" href="../app/views/templates/Public/css/style.min.css" media="screen" />
</head>
    <body>
    {% include 'templates/partials/messages.php' %}
    {% include 'templates/partials/navigation.php' %}
    {% block content%} {% endblock %}
    </body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="../app/views/templates/Public/js/main.min.js"></script>
</html>