<?= $this->getContent() ?>

<!--<div align="center">

	<?= $this->tag->form(['class' => 'form-search']) ?>

		<div align="left">
			<h2>Sign Up</h2>
		</div>

		<table class="signup">
			<tr>
				<td align="right"><?= $form->label('name') ?></td>
				<td>
					<?= $form->render('name') ?>
					<?= $form->messages('name') ?>
				</td>
			</tr>
			<tr>
				<td align="right"><?= $form->label('email') ?></td>
				<td>
					<?= $form->render('email') ?>
					<?= $form->messages('email') ?>
				</td>
			</tr>
			<tr>
				<td align="right"><?= $form->label('password') ?></td>
				<td>
					<?= $form->render('password') ?>
					<?= $form->messages('password') ?>
				</td>
			</tr>
			<tr>
				<td align="right"><?= $form->label('confirmPassword') ?></td>
				<td>
					<?= $form->render('confirmPassword') ?>
					<?= $form->messages('confirmPassword') ?>
				</td>
			</tr>
			<tr>
				<td align="right"></td>
				<td>
					<?= $form->render('terms') ?> <?= $form->label('terms') ?>
					<?= $form->messages('terms') ?>
				</td>
			</tr>
			<tr>
				<td align="right"></td>
				<td><?= $form->render('Sign Up') ?></td>
			</tr>
		</table>

		<?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
		<?= $form->messages('csrf') ?>

		<hr>

	</form>

</div> -->
                
<h2>Sign Up</h2>
                
<?= $this->tag->form([]) ?>

<div class="col-md-6 col-sm-6 col-xs-6">
                
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
                    <label for="terms">Terms</label>
                    <?= $form->render('terms', ['id' => 'terms']) ?>
                </div>
                
               <?= $form->render('Sign Up') ?> 
               <?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
</div> 

<div class="col-md-6 col-sm-6 col-xs-6">
    <?= $form->messages('name') ?>
    <?= $form->messages('email') ?>
    <?= $form->messages('password') ?>
    <?= $form->messages('confirmPassword') ?>
    <?= $form->messages('terms') ?>
    <?= $form->messages('csrf') ?>
</div>

</form>