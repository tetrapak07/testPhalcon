<ul class="pager">
    <li class="previous pull-left">
        <?= $this->tag->linkTo(['users', '&larr; Go Back']) ?>
    </li>
</ul>

<div class="box box-primary">
    
            <div class="box-header with-border">
              <h3 class="box-title">Create User</h3>
            </div>

              <div class="box-body">
                    
                      <div class="col-md-6 col-sm-6 col-xs-6">
                          
                        <form role="form" method="post" autocomplete="off">
                          
                        <div class="form-group"> 
                             <label for="name">Name</label>
                             <?= $form->render('name', ['class' => 'form-control', 'id' => 'name']) ?>
                         </div>

                         <div class="form-group"> 
                             <label for="email">E-Mail</label>
                             <?= $form->render('email', ['class' => 'form-control', 'id' => 'email']) ?>
                         </div>
                         
                         <div class="form-group"> 
                            <label for="password">Password</label>
                            <?= $form->render('password', ['class' => 'form-control', 'id' => 'password']) ?>
                         </div>

                        <div class="form-group"> 
                            <label for="confirmPassword">Confirm Password</label>
                            <?= $form->render('confirmPassword', ['class' => 'form-control', 'id' => 'confirmPassword']) ?>
                        </div>

                        <div class="form-group"> 
                            <label for="groups">Groups</label>
                            
                            <select id="groups" name="groups[]" class="form-control" multiple="multiple">

                             <?php foreach ($groupsAll as $group) { ?>
                                <option value="<?= $group->id ?>"><?= $group->name ?></option>
                             <?php } ?>
                            </select>
                        </div>

                         <div class="form-group"> 
                            <label for="active">Confirmed?</label>
                            <?= $form->render('active', ['class' => 'form-control', 'id' => 'active']) ?>
                        </div>
                         
                          <?= $this->tag->submitButton(['Save', 'class' => 'btn btn-success']) ?>
                          
                           </form>   
                        
                      </div>  
                          
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <?= $this->getContent() ?>
                        </div>    

             </div> 
                      
</div>                        

