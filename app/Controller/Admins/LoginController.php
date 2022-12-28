<?php

namespace App\Controller\Admins;

use App\Controller\AppController;
use Src\Form\BootstrapForm;

class LoginController extends AppController
{

    public function __construct ()
    {
        parent::__construct();
    }

    /**
     * Default display page for this controller. Is called if no other method is specified.
     */
    public function view (): void
    {
        $erreurs = [];
        $form = new BootstrapForm($_POST);
        $page_titre = 'Espace de connexion Administrateur';

        if (!empty($_POST)) {
            extract($this->secureData($_POST));
            if ($this->Auth()->loginUser($username, $password, 'a')) {
                $this->redirection('/a/dashboard');
            } else {
                $erreurs[] = 'Identifiant ou mot de passe incorrect.';
            }
        }
        $this->render('admins.login', compact('form', 'page_titre', 'erreurs'));
    }

    /**
     * Contains CSS links of all pages dependent on this controller
     *
     * @return string
     */
    protected function css (): string
    {
        $css = '<link href="' . $this->entity()->css_file("style-admin.css") . '" rel="stylesheet">';
        return $css;
    }

    /**
     * Contains JS links of all pages dependent on this controller
     *
     * @return string
     */
    protected function js (): string
    {
        $js = '';
        return $js;
    }
}