
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website | {% block title %}{% endblock %}</title>
    <link rel="stylesheet" href="../app/views/templates/Public/css/style.min.css" media="screen" />

</head>
    <body>
    <div class="site-overlay"></div>
    <div class=" push ">
        <nav class=" main-nav">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                     <h1>{{ block('title') }}</h1>
                     </div>
                     <div class="col-xs-6 ">
                       {% if auth %}
                          <img class="img-responsive nav-profile-pic pull-right" src="{{ auth.getAvatarUrl ({size: 50}) }}" >
                          {% endif %}
                    </div>
                </div>
                {% include 'templates/partials/navigation.php' %}
            </div>
        </nav>
    </div>
    <div class="visible-xs">
      {% include 'templates/partials/mobileNavigation.php' %}
     </div>
    <div class="container" id="container">
    {% block content%} {% endblock %}
     {% include 'templates/partials/messages.php' %}
    </div>

    </body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="../app/views/templates/Public/js/main.min.js"></script>
</html>