<?= $this->getContent() ?>
<div class="page-header">
    <h1>Peoples</h1>
</div>



<?php foreach ($users as $people) { ?>
    ID: <?= $people->id ?><br>
    <b>First Name:</b> <?= $people->name ?><br>
    <b>E-mail:</b> <?= $people->email ?>
    <hr>
<?php } ?>


