<?php

namespace Globals;

use Src\Controller\Controller;
use Src\i18n\i18n;

class GlobalController extends Controller
{

    protected function lang(){
        return new i18n();
    }

}