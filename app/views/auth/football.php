{% extends 'templates/default.php'%}
{% block title %}Football{% endblock %}
{% block content %}
{{mates[0].groupName }}
{%for item in mates %}
{% if item.groupOrderID == 1%}
<div style="margin-bottom: 15px">
    {{item.nameTeam1}}
    <img src="{{item.iconUrlTeam1}}">
    {{item.matchResults.matchResult.pointsTeam1}}
    {%for itemgoal in item.matchResults.matchResult %}
    {% if itemgoal.resultName == 'Endergebnis'%}
    {{itemgoal.pointsTeam1}}:{{itemgoal.pointsTeam2}}
    {% endif %}
    {% endfor %}
    <img src="{{item.iconUrlTeam2}}">
    {{item.nameTeam2}}
</div>
{% endif %}
{% endfor %}
{{mates[1].groupName }}
{%for item in mates %}
{% if item.groupOrderID == 2%}
<div style="margin-bottom: 15px">
    {{item.nameTeam1}}
    <img src="{{item.iconUrlTeam1}}">
    {{item.matchResults.matchResult.pointsTeam1}}
    {%for itemgoal in item.matchResults.matchResult %}
    {% if itemgoal.resultName == 'Endergebnis'%}
    {{itemgoal.pointsTeam1}}:{{itemgoal.pointsTeam2}}
    {% endif %}
    {% endfor %}
    <img src="{{item.iconUrlTeam2}}">
    {{item.nameTeam2}}
</div>
<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
{% endif %}
{% endfor %}
{%for item in mates %}
{% if item.groupOrderID == 3%}
<div style="margin-bottom: 15px">
    {{item.nameTeam1}}
    <img src="{{item.iconUrlTeam1}}">
    {{item.matchResults.matchResult.pointsTeam1}}
    {%for itemgoal in item.matchResults.matchResult %}
    {% if itemgoal.resultName == 'Endergebnis'%}
    {{itemgoal.pointsTeam1}}:{{itemgoal.pointsTeam2}}
    {% endif %}
    {% endfor %}
    <img src="{{item.iconUrlTeam2}}">
    {{item.nameTeam2}}
</div>
<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
{% endif %}
{% endfor %}

{% endblock %}
