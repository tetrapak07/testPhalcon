{% extends "templates/base.volt" %}

{% block title %}Users - {% endblock %}

{% block css %} 
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
{% endblock %}

{% block content %}
<nav class="navbar navbar-inverse bg-primary">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        {{ link_to(null, 'class': 'navbar-brand', 'Test')}}
        
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav">
        
          {%- set menus = [
              'Home': null,
              'Users': 'users',
              'CMS': 'cms',
              'API': 'api'
            ] -%}

            {%- for key, value in menus %}
              {% if value == dispatcher.getControllerName() %}
              <li class="active">{{ link_to(value, key) }}</li>
              {% else %}
              <li>{{ link_to(value, key) }}</li>
              {% endif %}
            {%- endfor -%}
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ auth.getName() }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>{{ link_to('users/changePassword', 'Change Password') }}</li>
               <li>{{ link_to('session/logout', 'Logout') }}</li>
            </ul>
          </li>
      </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  {{ content() }}
</div>

{{ partial("partials/footer") }}

{% endblock %}

{% block js %} 
 <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  if (document.getElementById("groupsSel")) { 
  $("#groupsSel").select2();
  }
});
</script>  
{% endblock %}
   
