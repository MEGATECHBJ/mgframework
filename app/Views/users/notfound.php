<div class="container">
    <div class="row text-center py-5">
        <div class="col-md-6 offset-md-3 py-5">
            <img src="<?= $this->entity()->img_file('icons/bx-cog.svg') ?>" width="50" alt=""><br><br>
            <h1>Oups... </h1>
            <h3>La page que vous cherchez n'a pu être trouvée</h3>
            <h5>Veuillez vérifier le lien et réessayer<br>
                ou retourner à la page <a href="<?= (isset($back_url))?$back_url:$back_url; ?>">précédente</a> ou à l'<a href="<?= App\App::getInstance()->app_info('app_url') ?>">accueil</a> </h5>
        </div>
    </div>
</div>