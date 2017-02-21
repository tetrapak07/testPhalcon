{{ content() }}
<div class="page-header">
    <h1>Peoples</h1>
</div>

{% block users %}

{% for people in users %}
    ID: {{ people.id}}<br>
    <b>First Name:</b> {{ people.name}}<br>
    <b>E-mail:</b> {{ people.email}}
    <hr>
{% endfor  %}

{% endblock %}
