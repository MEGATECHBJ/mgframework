<section class="py-5 my-5 text-center">
    <div class="col-md-6 offset-md-3 text-center">
        <img src="<?= $this->entity()->get_file("vendor",'icons/bx-cog.svg') ?>" width="50" alt=""><br><br><br>
        <h1>Oups... </h1>
        <h3>La page que vous cherchez n'a pu être trouvée</h3>
        <h5>Veuillez vérifier le lien et réessayer<br>
            ou retourner à l'<a href="<?= App\App::getInstance()->app_info('app_url') ?>">accueil</a> </h5>
    </div>
</section>