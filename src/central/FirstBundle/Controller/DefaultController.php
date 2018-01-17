<?php

namespace central\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('centralFirstBundle:Default:index.html.twig');
    }
    public function index2Action($var,$var2){
        return $this->render('centralFirstBundle:Default:index2.html.twig', array('myVar'=>$var, 'myVar2'=>$var2));
    }


}
