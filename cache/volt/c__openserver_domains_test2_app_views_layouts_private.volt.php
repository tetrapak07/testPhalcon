<!DOCTYPE html>
<html>
	<head>
		<title>Users - Welcome to Test </title>
		<link href="//netdna.bootstrapcdn.com/bootswatch/3.3.7/united/bootstrap.min.css" rel="stylesheet">
		<?= $this->tag->stylesheetLink('css/style.css') ?>
                 
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">

	</head>
	<body>
               
                
<nav class="navbar navbar-inverse bg-primary">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <?= $this->tag->linkTo([null, 'class' => 'navbar-brand', 'Test']) ?>
        
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav"><?php $menus = ['Home' => null, 'Users' => 'users', 'CMS' => 'cms', 'API' => 'api']; ?><?php foreach ($menus as $key => $value) { ?>
              <?php if ($value == $this->dispatcher->getControllerName()) { ?>
              <li class="active"><?= $this->tag->linkTo([$value, $key]) ?></li>
              <?php } else { ?>
              <li><?= $this->tag->linkTo([$value, $key]) ?></li>
              <?php } ?><?php } ?></ul>
      
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $this->auth->getName() ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><?= $this->tag->linkTo(['users/changePassword', 'Change Password']) ?></li>
               <li><?= $this->tag->linkTo(['session/logout', 'Logout']) ?></li>
            </ul>
          </li>
      </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <?= $this->getContent() ?>
</div>

<?= $this->partial('partials/footer') ?>


               

		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
                 
 <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("#groups").select2();
});
</script>  

	</body>
</html>