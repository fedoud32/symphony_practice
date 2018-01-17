<?php

namespace central\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class personneController extends Controller
{
    public function fediAction()
    {
        return $this->render('@centralFirst/Default/new.html.twig');
    }
}
