<?php

namespace App\Controller\Admins;

use App\Controller\AppController;

class SignoutController extends AppController
{

    public function __construct ()
    {
        parent::__construct();
    }

    public function view ()
    {
        $this->sign_out('a');
    }

}