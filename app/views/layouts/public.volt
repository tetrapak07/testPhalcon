{% extends "templates/base.volt" %}
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
              'Home': 'index',
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
         {%- if not(logged_in is empty) %}
            <li>{{ link_to('users', 'Users Panel') }}</li>
            <li>{{ link_to('session/logout', 'Logout') }}</li>
            {% else %}
            
            <li   {% if dispatcher.getActionName() == 'login' %} class="active" {% endif %}>
                {{ link_to('session/login', 'Login') }}
            </li>
            <li  {% if dispatcher.getActionName() == 'signup' %} class="active" {% endif %}>
                {{ link_to('session/signup', 'Register') }}
            </li>
            {% endif %}
      </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  {{ content() }}
</div>
  
{{ partial("partials/footer") }}

{% endblock %}
