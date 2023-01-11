<?php

namespace App\Controller\Admins;

use App\App;
use App\Controller\AppController;
use Src\Form\BootstrapForm;

class PasswordsController extends AppController
{

    public function __construct ()
    {
        parent::__construct();

        $this->loadModel('Admin');
    }

    /**
     * Default display page for this controller. Is called if no other method is specified.
     *
     * @return void
     */
    public function view (): void
    {
        $page_titre = 'Changer de mot de passe';
        $form = new BootstrapForm($_POST);

        if (isset($_POST) && array_key_exists('edit', $_POST)) {
            if (App::getInstance()->not_empty(['old_password', 'new_password', 'new_password2'])) {
                extract($this->secureData($_POST));

                if (password_verify($old_password, $_SESSION['a']['password'])) {
                    if ($new_password === $new_password2) {
                        if (mb_strlen($new_password) >= 8) {
                            $password = password_hash($new_password, PASSWORD_DEFAULT);
                            $this->Admin->MyUpdate($_SESSION['authA'], [
                                'password' => $password
                            ]);

                            $this->alertDefine('Mot de passe changé avec succès', 'success');
                        } else {
                            $this->alertDefine('Le nouveau de passe doit comporter au moins 8 caractères', 'danger');
                        }
                    } else {
                        $this->alertDefine('Les deux nouveaux mots de passe ne correspondent pas', 'danger');
                    }
                } else {
                    $this->alertDefine('L\'ancien mot de passe n\'est pas correct', 'danger');
                }
            } else {
                $this->alertDefine('Veuillez remplir tous les champs', 'danger');
            }
        }
        $this->render('admins.passwords', compact('form', 'page_titre'));
    }

    /**
     * Contains CSS links of all pages dependent on this controller
     *
     * @return string
     */
    protected function css (): string
    {
        $css = '<link href="' . $this->entity()->get_file("css","style-admin.css") . '" rel="stylesheet">';
        $css .= '<link href="' . $this->entity()->get_file("vendor","dataTables/datatables.min.css") . '" rel="stylesheet">';
        return $css;
    }

    /**
     * Contains JS links of all pages dependent on this controller
     *
     * @return string
     */
    protected function js (): string
    {
        $js = '<script src="' . $this->entity()->get_file("vendor","dataTables/datatables.min.js") . '"></script>';
        $js .= '<script src="' . $this->entity()->get_file("js","my.datatables.js") . '"></script>';
        return $js;
    }

}