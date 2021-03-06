<ul class="pager">
    <li class="previous pull-left">
        {{ link_to("users", "&larr; Go Back") }}
    </li>
</ul>

<div class="box box-primary">
    
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>

              <div class="box-body">
                    
                      <div class="col-md-6 col-sm-6 col-xs-6">
                          
                        <form method="post" autocomplete="off" action="{{ url("users/changePassword") }}">
                          
                            <div class="form-group"> 
                                <label for="password">Password</label>
                                {{ form.render("password", ["class": "form-control", "id":"password"]) }}
                             </div>

                            <div class="form-group"> 
                                <label for="confirmPassword">Confirm Password</label>
                                {{ form.render("confirmPassword", ["class": "form-control", "id":"confirmPassword"]) }}
                            </div>

                             {{ submit_button("Change Password", "class": "btn btn-primary") }}
                          
                        </form>   
                        
                      </div>  
                          
                      <div class="col-md-6 col-sm-6 col-xs-6">
                            {{ content() }}
                      </div>    

             </div>              
</div>             