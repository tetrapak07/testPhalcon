<ul class="pager">
   <li class="previous pull-left">
        {{ link_to("users/index", "&larr; Go Back") }}
    </li>
</ul>

<div class="box box-primary">
    
            <div class="box-header with-border">
              <h3 class="box-title">Search Users</h3>
            </div>

    <div class="box-body">
        
        <div class="col-md-6 col-sm-6 col-xs-6">
        
            <form method="post" action="{{ url("users/search") }}" autocomplete="off">

             

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    {{ form.render("email", ["class": "form-control", "id":"email"]) }}
                </div>
                
                <div class="form-group">
                    <label for="groups">Group Name</label>
                    {{ form.render("groups", ["class": "form-control", "id":"groups"]) }}
                </div>
                
                    {{ submit_button("Search", "class": "btn btn-primary") }}

            </form>
        </div>
        
        <div class="col-md-6 col-sm-6 col-xs-6">
            {{ content() }}
        </div> 
                    
    </div>
        
</div>      

