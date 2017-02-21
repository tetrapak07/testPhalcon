{{ content() }}

<ul class="pager">
   <li class="previous pull-left">
        {{ link_to("users/index", "Reset Search Results") }}
    </li>
    <li class="pull-right">
        {{ link_to("users/create", "Create Users", "role": "button") }}
        {{ link_to("users/index&search=1", "Search Users", "role": "button") }}
    </li>
</ul>

{% for user in page.items %}
{% if loop.first %}
<table class="table table-bordered table-striped" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Groups</th>
            <th>Confirmed?</th>
            <th>Actions</th>
        </tr>
    </thead>
{% endif %}
    <tbody>
        <tr>
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
            {% for group in user.groups%}
                {% if loop.last %}
                 {{group.name}}
                 {% else %}
                   {{group.name}},  
                {% endif %} 
            {% endfor  %}
            </td>
            <td>{{ user.active == 'Y' ? 'Yes' : 'No' }}</td>
            <td width="15%">{{ link_to("users/edit/" ~ user.id, '<i class="icon-pencil"></i> Edit', "class": "btn btn-primary") }}
            {{ link_to("users/delete/" ~ user.id, '<i class="icon-remove"></i> Delete', "class": "btn btn-danger") }}</td>
        </tr>
    </tbody>
{% if loop.last %}
    <tbody>
        <tr>
            <td colspan="8" align="right">
               <ul class="pager">
                    <li>{{ link_to("users/search", '<i class="icon-fast-backward"></i> First', "class": "btn") }} </li>
                   <li> {{ link_to("users/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Previous', "class": "btn ") }}</li>
                   <li> {{ link_to("users/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Next', "class": "btn") }}</li>
                   <li> {{ link_to("users/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Last', "class": "btn") }}</li>
                   <li> <span class="help-inline">{{ page.current }}/{{ page.total_pages }}</span></li>
                </ul>
            </td>
        </tr>
    <tbody>
</table>
{% endif %}
{% else %}
    No users are recorded
{% endfor %}

