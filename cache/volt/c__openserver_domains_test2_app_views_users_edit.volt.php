<ul class="pager">
    <li class="previous pull-left">
        <?= $this->tag->linkTo(['users', '&larr; Go Back']) ?>
    </li>
   
</ul> 
    <ul class="nav nav-tabs">
        <li class="active"><a href="#edit" data-toggle="tab">Edit User</a></li>
        <li><a href="#logins" data-toggle="tab">Successful Logins</a></li>
        <li><a href="#changes" data-toggle="tab">Password Changes</a></li>
        <li><a href="#resetPass" data-toggle="tab">Reset Passwords</a></li>
    </ul>
  
<div class="tab-content">
  <div id="edit" class="tab-pane fade in active">
    <h3>Edit User</h3>
            
            <div class="col-md-6 col-sm-6 col-xs-6">
               <form method="post" autocomplete="off">
                <?= $form->render('id', ['autocomplete' => 'off']) ?>  
                 <div class="form-group"> 
                    <label for="name">Name</label>
                    <?= $form->render('name', ['class' => 'form-control', 'id' => 'name']) ?>
                </div>

                 <div class="form-group"> 
                    <label for="email">E-Mail</label>
                    <?= $form->render('email', ['class' => 'form-control', 'id' => 'email']) ?>
                </div>
               
                
                <div class="form-group"> 
                    <label for="groupsSel">Groups</label>
                
                    <select id="groupsSel" name="groups[]" class="form-control" multiple="multiple">
                      
                     <?php foreach ($groupsAll as $group) { ?>
                        <option value="<?= $group->id ?>" <?php if (in_array($group->id, $ids)) { ?> selected  <?php } ?>><?= $group->name ?></option>
                     <?php } ?>
                    </select>
                </div>

                 <div class="form-group"> 
                    <label for="active">Confirmed?</label>
                    <?= $form->render('active', ['class' => 'form-control', 'id' => 'active']) ?>
                </div>
                 <?= $this->tag->submitButton(['Save', 'class' => 'btn btn-big btn-success']) ?>
             </form>

            </div>
             
             <div class="col-md-6 col-sm-6 col-xs-6">
                 <?= $this->getContent() ?>
             </div>   
          
  </div>
             
  <div id="logins" class="tab-pane fade">
    <h3>Successful Logins</h3>
    <p>
                <table class="table table-bordered table-striped" align="center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>IP Address</th>
                            <th>User Agent</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $v30575118261iterated = false; ?><?php foreach ($user->successLogins as $login) { ?><?php $v30575118261iterated = true; ?>
                        <tr>
                            <td><?= $login->id ?></td>
                            <td><?= $login->ipAddress ?></td>
                            <td><?= $login->userAgent ?></td>
                        </tr>
                    <?php } if (!$v30575118261iterated) { ?>
                        <tr><td colspan="3" align="center">User does not have successfull logins</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
    </p>
  </div>
                    
  <div id="changes" class="tab-pane fade">
    <h3>Password Changes</h3>
    <p>
                <table class="table table-bordered table-striped" align="center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>IP Address</th>
                            <th>User Agent</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $v30575118261iterated = false; ?><?php foreach ($user->passwordChanges as $change) { ?><?php $v30575118261iterated = true; ?>
                        <tr>
                            <td><?= $change->id ?></td>
                            <td><?= $change->ipAddress ?></td>
                            <td><?= $change->userAgent ?></td>
                            <td><?= date('Y-m-d H:i:s', $change->createdAt) ?></td>
                        </tr>
                    <?php } if (!$v30575118261iterated) { ?>
                        <tr><td colspan="4" align="center">User has not changed his/her password</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
    </p>
  </div>
                
  <div id="resetPass" class="tab-pane fade">
    <h3>Reset Passwords</h3>
    <p>
                <table class="table table-bordered table-striped" align="center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Reset?</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $v30575118261iterated = false; ?><?php foreach ($user->resetPasswords as $reset) { ?><?php $v30575118261iterated = true; ?>
                        <tr>
                            <th><?= $reset->id ?></th>
                            <th><?= date('Y-m-d H:i:s', $reset->createdAt) ?>
                            <th><?= ($reset->reset == 'Y' ? 'Yes' : 'No') ?>
                        </tr>
                    <?php } if (!$v30575118261iterated) { ?>
                        <tr><td colspan="3" align="center">User has not requested reset his/her password</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </p>
  </div>              

</div>  
                
                   