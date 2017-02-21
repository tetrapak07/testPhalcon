<?= $this->getContent() ?>

<ul class="pager">
   <li class="previous pull-left">
        <?= $this->tag->linkTo(['users/index', 'Reset Search Results']) ?>
    </li>
    <li class="pull-right">
        <?= $this->tag->linkTo(['users/create', 'Create Users', 'role' => 'button']) ?>
        <?= $this->tag->linkTo(['users/index&search=1', 'Search Users', 'role' => 'button']) ?>
    </li>
</ul>

<?php $v22117417621iterated = false; ?><?php $v22117417621iterator = $page->items; $v22117417621incr = 0; $v22117417621loop = new stdClass(); $v22117417621loop->self = &$v22117417621loop; $v22117417621loop->length = count($v22117417621iterator); $v22117417621loop->index = 1; $v22117417621loop->index0 = 1; $v22117417621loop->revindex = $v22117417621loop->length; $v22117417621loop->revindex0 = $v22117417621loop->length - 1; ?><?php foreach ($v22117417621iterator as $user) { ?><?php $v22117417621loop->first = ($v22117417621incr == 0); $v22117417621loop->index = $v22117417621incr + 1; $v22117417621loop->index0 = $v22117417621incr; $v22117417621loop->revindex = $v22117417621loop->length - $v22117417621incr; $v22117417621loop->revindex0 = $v22117417621loop->length - ($v22117417621incr + 1); $v22117417621loop->last = ($v22117417621incr == ($v22117417621loop->length - 1)); ?><?php $v22117417621iterated = true; ?>
<?php if ($v22117417621loop->first) { ?>
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
            <?php $v22117417622iterator = $user->groups; $v22117417622incr = 0; $v22117417622loop = new stdClass(); $v22117417622loop->self = &$v22117417622loop; $v22117417622loop->length = count($v22117417622iterator); $v22117417622loop->index = 1; $v22117417622loop->index0 = 1; $v22117417622loop->revindex = $v22117417622loop->length; $v22117417622loop->revindex0 = $v22117417622loop->length - 1; ?><?php foreach ($v22117417622iterator as $group) { ?><?php $v22117417622loop->first = ($v22117417622incr == 0); $v22117417622loop->index = $v22117417622incr + 1; $v22117417622loop->index0 = $v22117417622incr; $v22117417622loop->revindex = $v22117417622loop->length - $v22117417622incr; $v22117417622loop->revindex0 = $v22117417622loop->length - ($v22117417622incr + 1); $v22117417622loop->last = ($v22117417622incr == ($v22117417622loop->length - 1)); ?>
                <?php if ($v22117417622loop->last) { ?>
                 <?= $group->name ?>
                 <?php } else { ?>
                   <?= $group->name ?>,  
                <?php } ?> 
            <?php $v22117417622incr++; } ?>
            </td>
            <td><?= ($user->active == 'Y' ? 'Yes' : 'No') ?></td>
            <td width="15%"><?= $this->tag->linkTo(['users/edit/' . $user->id, '<i class="icon-pencil"></i> Edit', 'class' => 'btn btn-primary']) ?>
            <?= $this->tag->linkTo(['users/delete/' . $user->id, '<i class="icon-remove"></i> Delete', 'class' => 'btn btn-danger']) ?></td>
        </tr>
    </tbody>
<?php if ($v22117417621loop->last) { ?>
    <tbody>
        <tr>
            <td colspan="8" align="right">
               <ul class="pager">
                    <li><?= $this->tag->linkTo(['users/search', '<i class="icon-fast-backward"></i> First', 'class' => 'btn']) ?> </li>
                   <li> <?= $this->tag->linkTo(['users/search?page=' . $page->before, '<i class="icon-step-backward"></i> Previous', 'class' => 'btn ']) ?></li>
                   <li> <?= $this->tag->linkTo(['users/search?page=' . $page->next, '<i class="icon-step-forward"></i> Next', 'class' => 'btn']) ?></li>
                   <li> <?= $this->tag->linkTo(['users/search?page=' . $page->last, '<i class="icon-fast-forward"></i> Last', 'class' => 'btn']) ?></li>
                   <li> <span class="help-inline"><?= $page->current ?>/<?= $page->total_pages ?></span></li>
                </ul>
            </td>
        </tr>
    <tbody>
</table>
<?php } ?>
<?php $v22117417621incr++; } if (!$v22117417621iterated) { ?>
    No users are recorded
<?php } ?>

