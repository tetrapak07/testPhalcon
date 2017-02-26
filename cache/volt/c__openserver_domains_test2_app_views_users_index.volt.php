<ul class="pager">
    <li class="pull-right">
        <?= $this->tag->linkTo(['users/create', 'Create Users', 'role' => 'button']) ?>
        
    </li>
</ul>
        
<?= $this->getContent() ?>        

<div class="row">        
 <form method="get" class="form-inline" action="<?= $this->url->get('users?search=1') ?>" autocomplete="off">

                <div class="form-group">
                    <label for="email">E-Mail: &nbsp;</label>
                    <?= $form->render('email', ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'test@mail.com', 'value' => $emailGet]) ?>
                </div>
                &nbsp;&nbsp;
                <div class="form-group">
                    <label for="groups"> Group Name:&nbsp; </label>
                    <?= $form->render('groups', ['class' => 'form-control', 'id' => 'groups', 'placeholder' => 'Administrators', 'value' => $groupsGet]) ?>
                </div>
                
                    <?= $this->tag->submitButton(['Search', 'class' => 'btn btn-primary']) ?>
                    &nbsp;
                    <?= $this->tag->linkTo(['users/index', 'Reset']) ?>

            </form>
</div>

<div class="row" style="margin-top: 20px">
<?php $v9133634601iterated = false; ?><?php $v9133634601iterator = $page->items; $v9133634601incr = 0; $v9133634601loop = new stdClass(); $v9133634601loop->self = &$v9133634601loop; $v9133634601loop->length = count($v9133634601iterator); $v9133634601loop->index = 1; $v9133634601loop->index0 = 1; $v9133634601loop->revindex = $v9133634601loop->length; $v9133634601loop->revindex0 = $v9133634601loop->length - 1; ?><?php foreach ($v9133634601iterator as $user) { ?><?php $v9133634601loop->first = ($v9133634601incr == 0); $v9133634601loop->index = $v9133634601incr + 1; $v9133634601loop->index0 = $v9133634601incr; $v9133634601loop->revindex = $v9133634601loop->length - $v9133634601incr; $v9133634601loop->revindex0 = $v9133634601loop->length - ($v9133634601incr + 1); $v9133634601loop->last = ($v9133634601incr == ($v9133634601loop->length - 1)); ?><?php $v9133634601iterated = true; ?>
<?php if ($v9133634601loop->first) { ?>
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
<?php } ?>
    <tbody>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->name ?></td>
            <td><?= $user->email ?></td>
            <td>
            <?php if ($emailSearch) { ?>
                
                <?php $v9133634602iterator = $user->groups; $v9133634602incr = 0; $v9133634602loop = new stdClass(); $v9133634602loop->self = &$v9133634602loop; $v9133634602loop->length = count($v9133634602iterator); $v9133634602loop->index = 1; $v9133634602loop->index0 = 1; $v9133634602loop->revindex = $v9133634602loop->length; $v9133634602loop->revindex0 = $v9133634602loop->length - 1; ?><?php foreach ($v9133634602iterator as $group) { ?><?php $v9133634602loop->first = ($v9133634602incr == 0); $v9133634602loop->index = $v9133634602incr + 1; $v9133634602loop->index0 = $v9133634602incr; $v9133634602loop->revindex = $v9133634602loop->length - $v9133634602incr; $v9133634602loop->revindex0 = $v9133634602loop->length - ($v9133634602incr + 1); $v9133634602loop->last = ($v9133634602incr == ($v9133634602loop->length - 1)); ?>

                    <?php if ($v9133634602loop->last) { ?>
                        <?= $group->name ?>
                    <?php } else { ?>
                       <?= $group->name ?>,  
                    <?php } ?> 

                <?php $v9133634602incr++; } ?>
            
            <?php } else { ?> 
                
                <?= $user->groups ?>
                
            <?php } ?> 
            
            </td>  
            <td><?= ($user->active == 'Y' ? 'Yes' : 'No') ?></td>
            <td width="15%"><?= $this->tag->linkTo(['users/edit/' . $user->id, '<i class="icon-pencil"></i> Edit', 'class' => 'btn btn-primary']) ?>
            <?= $this->tag->linkTo(['users/delete/' . $user->id, '<i class="icon-remove"></i> Delete', 'class' => 'btn btn-danger']) ?></td>
        </tr>
    </tbody>
<?php if ($v9133634601loop->last) { ?>
    <tbody>
        <tr>
            <td colspan="8" align="right">
               <ul class="pager">
                    <li><?= $this->tag->linkTo(['users?search=1&email=' . $emailGet . '&groups=' . $groupsGet, '<i class="icon-fast-backward"></i> First', 'class' => 'btn']) ?> </li>
                   <li> <?= $this->tag->linkTo(['users?search=1&email=' . $emailGet . '&groups=' . $groupsGet . '&page=' . $page->before, '<i class="icon-step-backward"></i> Previous', 'class' => 'btn ']) ?></li>
                   <li> <?= $this->tag->linkTo(['users?search=1&email=' . $emailGet . '&groups=' . $groupsGet . '&page=' . $page->next, '<i class="icon-step-forward"></i> Next', 'class' => 'btn']) ?></li>
                   <li> <?= $this->tag->linkTo(['users?search=1&email=' . $emailGet . '&groups=' . $groupsGet . '&page=' . $page->last, '<i class="icon-fast-forward"></i> Last', 'class' => 'btn']) ?></li>
                   <li> <span class="help-inline"><?= $page->current ?>/<?= $page->total_pages ?></span></li>
                </ul>
            </td>
        </tr>
    <tbody>
</table>
<?php } ?>
<?php $v9133634601incr++; } if (!$v9133634601iterated) { ?>
    No users are recorded
<?php } ?>
</div>

