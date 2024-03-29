<?php

namespace App\Controller\Publics;

use Src\Captcha\captcha;
use App\App;
use Src\Email\Email;
use Src\Form\BootstrapForm;
use Src\Router\Router;

class ContactsController extends \App\Controller\AppController {

    public function __construct() {
        parent::__construct();
        //$this->loadModel('Product');
    }

    protected function css(){
        $css = '';

        return $css;
    }

    protected function js(){
        $js = '';

        return $js;
    }

    public function view(){

        if(isset($_POST) && array_key_exists('envoyer', $_POST)){

            if(App::getInstance()->not_empty(['name', 'email', 'phone', 'objet', 'message'])){

                $captcha = new captcha();

                if ($captcha->verif_captcha() == true) {

                    extract($this->secureData($_POST));
                    $content = $message;
                    $content .= '<br><br>---------------------------------<br>';
                    $content .= 'Envoyer par : ' . $name;
                    $content .= '<br>Email : ' . $email;
                    $content .= '<br>Phone : ' . $phone;
                    $content .= '<br><br><br>---------------------------------<br>';
                    $content .= '<p>Ce email a été envoyé depuis le fomulaire de contact du site http://usl-benin.com</p>';

                    $sendEmail = new Email();
                    $sendEmail->sendEmail($content, null, $objet, $name, $email);

                    $this->alertDefine('Email envoyé avec succès', 'success');

                    unset($_POST);
                }
                else {
                    $this->alertDefine('Vous n\'avez pas valider le captcha', 'danger');
                }

            }
            else {
                $this->alertDefine('Veuillez remplir tous les champs', 'danger');
            }

        }

        if(isset($_POST)){
            $form = new BootstrapForm($_POST);
        }
        else {
            $form = new BootstrapForm();
        }
        $page_titre ="";
        $description = "";
        $og_picture = "";

        $route = new Router($_GET['url']);

        $this->render('publics.contacts', compact(
            'page_titre', 'form', 'description', 'og_picture', 'route'));
    }

}