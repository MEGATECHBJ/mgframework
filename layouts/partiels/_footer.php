<div class="row no-gutters"></div>
<!-- Bouton retour en haut -->
<a href="#0" class="is-scroll opacity">
    <img src="<?= $this->entity()->get_file("vendor",'icons/bx-up-arrow-alt.svg') ?>" width="10" alt="">
</a>

<!-- Cookies -->
<?php if(!isset($_COOKIE['acceptCookies']) || $_COOKIE['acceptCookies'] != 1 ): ?>
<div class="cookies">
    <div class="row no-gutters">
        <div class="col-md-10">
            <p>En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de [Cookies ou autres traceurs] pour vous proposer [Par exemple, des publicités ciblées adaptés à vos centres d’intérêts] et [Par exemple, réaliser des statistiques de visites].</p>
        </div>
        <div class="col-md-2">
            <a href="#" class="btn btn-light btn-sm" id="cookiesbtn">Accepter</a>
        </div>
    </div>
</div>
<?php endif; ?>

<footer class="pt-5">
    <div class="container">
        <div class="row no-margin">
            <div class="col-md-3">
                <h5 class="block-title"><strong><?= $this->entity()->app_info('app_name'); ?></strong></h5>
                <span class="is-soulignement is-soulignement-red"></span>
                <p class="is-indication"></p>
                <div class="social-area">
                    <?php if($this->entity()->social_url('youtube') != ''): ?>
                        <a href="<?= $this->entity()->social_url('youtube'); ?>" target="_blank">
                            <img src="<?= $this->entity()->get_file("vendor",'icons/bxl-youtube.svg') ?>" class="footer-icons" alt="">
                        </a>&nbsp;&nbsp;
                    <?php endif; ?>
                    <?php if($this->entity()->social_url('facebook') != ''): ?>
                        <a href="<?= $this->entity()->social_url('facebook'); ?>" target="_blank">
                            <img src="<?= $this->entity()->get_file("vendor",'icons/bxl-facebook.svg') ?>" class="footer-icons" alt="">
                        </a>&nbsp;&nbsp;
                    <?php endif; ?>
                    <?php if($this->entity()->social_url('twitter') != ''): ?>
                        <a href="<?= $this->entity()->social_url('twitter'); ?>" target="_blank">
                            <img src="<?= $this->entity()->get_file("vendor",'icons/bxl-twitter.svg') ?>" class="footer-icons" alt="">
                        </a>&nbsp;
                    <?php endif; ?>
                    <?php if($this->entity()->social_url('instagram') != ''): ?>
                        <a href="<?= $this->entity()->social_url('instagram'); ?>" target="_blank">
                            <img src="<?= $this->entity()->get_file("vendor",'icons/bxl-instagram.svg') ?>" class="footer-icons" alt="">
                        </a>
                    <?php endif; ?>&nbsp;
                    <?php if($this->entity()->social_url('flickr') != ''): ?>
                        <a href="<?= $this->entity()->social_url('flickr'); ?>" target="_blank">
                            <img src="<?= $this->entity()->get_file("vendor",'icons/bxl-flickr.svg') ?>" class="footer-icons" alt="">
                        </a>
                    <?php endif; ?>&nbsp;
                    <?php if($this->entity()->social_url('telegram') != ''): ?>
                        <a href="<?= $this->entity()->social_url('telegram'); ?>" target="_blank">
                            <img src="<?= $this->entity()->get_file("vendor",'icons/bxl-telegram.svg') ?>" class="footer-icons" alt="">
                        </a>
                    <?php endif; ?>&nbsp;
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="block-title"><strong>Liens additionnels</strong></h5>
                <span class="is-soulignement is-soulignement-red"></span>
                <ul class="list-unstyled">
                    <li></li>
                </ul>
            </div>
            <div class="col-md-3 footer-contact">
                <h5 class="block-title"><strong>Adresse</strong></h5>
                <span class="is-soulignement is-soulignement-red"></span>
                <div class="row no-margin mb-1">
                    <div class="col-md-2">
                        <img src="<?= $this->entity()->get_file("vendor",'icons/bx-home-alt-2.svg') ?>" width="20" class="footer-icons" alt="">
                    </div>
                    <div class="col-md-10 is-indication">
                        <?= $this->entity()->app_info('company_address'); ?>
                    </div>
                </div>
                <div class="row no-margin mb-1">
                    <div class="col-md-2">
                        <img src="<?= $this->entity()->get_file("vendor",'icons/bx-envelope.svg') ?>" width="20" class="footer-icons" alt="">
                    </div>
                    <div class="col-md-10 is-indication">
                        <?= $this->entity()->app_info('company_email'); ?>
                        <?= $this->entity()->app_info('app_url'); ?>
                    </div>
                </div>
                <div class="row no-margin mb-1">
                    <div class="col-md-2">
                        <img src="<?= $this->entity()->get_file("vendor",'icons/bx-phone.svg') ?>" width="20" class="footer-icons" alt="">
                    </div>
                    <div class="col-md-10 is-indication">
                        <?= $this->entity()->app_info('company_first_phone') ?> <br>
                        <?= $this->entity()->app_info('company_second_phone') ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-8 small">
                    <?= date('Y') ?> &copy; <?= strtoupper($this->entity()->app_info('company_name')); ?>. <?= $lang->get('copyright'); ?>
                    <span class="">
                        <a href="https://megatech-web.com" target="new" title="Réalisé par MEGATECH SARL">
                            <img src="https://www.megatech-web.com/assets/img/logo.png" height="1"
                                 title="Réaliser par MEGATECH SARL" alt="Réaliser par MEGATECH SARL">
                        </a>
                    </span>
                </div>
                <div class="col-md-4 small text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="<?= $this->entity()->url(); ?>"><?= $lang->get('accueil'); ?></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="<?= $this->entity()->url(); ?>/plans"><?= $lang->get('plan'); ?></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="<?= $this->entity()->url(); ?>/mentions"><?= $lang->get('mention'); ?></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="<?= $this->entity()->url(); ?>/contacts"><?= $lang->get('contact'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>