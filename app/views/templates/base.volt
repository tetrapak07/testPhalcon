<!DOCTYPE html>
<html>
	<head>
		<title>{% block title %} {% endblock %}Welcome to Test </title>
		<link href="//netdna.bootstrapcdn.com/bootswatch/3.3.7/united/bootstrap.min.css" rel="stylesheet">
		{{ stylesheet_link('css/style.css') }}
                {% block css %} {% endblock %}
	</head>
	<body>
               
                {% block content %} 
		
                {% endblock %}
               

		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
                {% block js %} {% endblock %}
	</body>
</html>