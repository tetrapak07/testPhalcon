<ul class="pager">
    <li class="pull-right">
        {{ link_to("users/create", "Create Users", "role": "button") }}
        
    </li>
</ul>
        
{{ content() }}        

<div class="row">        
 <form method="get" class="form-inline" action="{{ url("users?search=1") }}" autocomplete="off">

                <div class="form-group">
                    <label for="email">E-Mail: &nbsp;</label>
                    {{ form.render("email", ["class": "form-control", 
                       "id":"email", "placeholder":"test@mail.com",
                       "value" : emailGet
                    ]) }}
                </div>
                &nbsp;&nbsp;
                <div class="form-group">
                    <label for="groups"> Group Name:&nbsp; </label>
                    {{ form.render("groups", ["class": "form-control", 
                       "id":"groups", "placeholder":"Administrators",
                        "value" : groupsGet
                    ]) }}
                </div>
                
                    {{ submit_button("Search", "class": "btn btn-primary") }}
                    &nbsp;
                    {{ link_to("users/index", "Reset") }}

            </form>
</div>

<div class="row" style="margin-top: 20px">
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
            <td>{{ user.id}}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
            {% if emailSearch %}
                
                {% for group in user.groups%}

                    {% if loop.last %}
                        {{group.name}}
                    {% else %}
                       {{group.name}},  
                    {% endif %} 

                {% endfor  %}
            
            {% else %} 
                
                {{user.groups}}
                
            {% endif %} 
            
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
                    <li>{{ link_to("users?search=1&email=" ~ emailGet ~"&groups=" ~ groupsGet, '<i class="icon-fast-backward"></i> First', "class": "btn") }} </li>
                   <li> {{ link_to("users?search=1&email=" ~ emailGet ~"&groups=" ~ groupsGet ~ "&page=" ~ page.before, '<i class="icon-step-backward"></i> Previous', "class": "btn ") }}</li>
                   <li> {{ link_to("users?search=1&email=" ~ emailGet ~"&groups=" ~ groupsGet ~ "&page=" ~ page.next, '<i class="icon-step-forward"></i> Next', "class": "btn") }}</li>
                   <li> {{ link_to("users?search=1&email=" ~ emailGet ~"&groups=" ~ groupsGet ~ "&page=" ~ page.last, '<i class="icon-fast-forward"></i> Last', "class": "btn") }}</li>
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
</div>

