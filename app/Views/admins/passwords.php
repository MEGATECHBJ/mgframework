<h4 class="is-block-title">Changer de mot de passe</h4>
<hr>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form action="" method="post">
            <?= $form->input('old_password', null, 'Ancien mot de passe', [
                'required' => 'required',
                'type' => 'password'
            ]) ?>
            <?= $form->input('new_password', null, 'Nouveau mot de passe', [
                'required' => 'required',
                'type' => 'password'
            ]) ?>
            <?= $form->input('new_password2', null, 'Nouveau mot de passe', [
                'required' => 'required',
                'type' => 'password'
            ]) ?>
            <?= $form->button('edit', 'Modifier', [
                'type' => 'submit'
            ]) ?>
        </form>
    </div>
</div>

