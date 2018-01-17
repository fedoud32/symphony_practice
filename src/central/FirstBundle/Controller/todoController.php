<?php

namespace central\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class todoController extends Controller
{

    public function listAction(Request $request)
    {

        $session = $request->getSession();

        if (!$session->has('mesTodos')) {

            $todos = array('jour1' => 'cours', 'jour2' => 'tp', 'jour3' => 'ne rien faire');
            $session->set('mesTodos', $todos);
            $session->getFlashBag()->add('info', 'Session crée avec success');
        }


        return $this->render('centralFirstBundle:Default:list.html.twig');
    }

    public function ajoutAction($key, $value, Request $request)
    {

        $session = $request->getSession();
        if (!$session->has('mesTodos')) {
            $session->getFlashBag()->add('error', 'session  inexistante');
            return $this->forward("central\\FirstBundle\\Controller\\todoController\\listAction");
        } else {
            if (isset($todos[$key])) {
                $session->getFlashBag()->add('error', 'utlisateur existant');
                return $this->render('centralFirstBundle:Default:list.html.twig');
            } else {
                $todos=$session->get('meTodos');
                $todos[$key] = $value;
                $session->set('mesTodos', $todos);
                $session->getFlashBag()->add('success', 'valeur ajouté avec success');

            }

            return $this->render('centralFirstBundle:Default:list.html.twig');
        }
        }
        public function updateAction(Request $request, $key, $value)
        {
            $session = $request->getSession();
            if (!$session->has('mesTodos')) {
                $session->getFlashBag()->add('error', 'session  inexistante');
                return $this->forward("central\\FirstBundle\\Controller\\todoController\\listAction");
            } else {
                if (!isset($todos[$key])) {
                    $session->getFlashBag()->add('error', 'todos inexistant');
                    return $this->render('centralFirstBundle:Default:list.html.twig');
                } else {
                    $todos=$session->get('meTodos');
                    $todos[$key] = $value;
                    $session->set('mesTodos', $todos);
                    $session->getFlashBag()->add('success', 'valeur modifié avec success');
                }

            }
        }
    public function deleteAction(Request $request, $key)
    {
        $session = $request->getSession();
        if (!$session->has('mesTodos')) {
            $session->getFlashBag()->add('error', 'session  inexistante');
            return $this->forward("central\\FirstBundle\\Controller\\todoController\\listAction");
        } else {
            if (!isset($todos[$key])) {
                $session->getFlashBag()->add('error', 'todos inexistant');
                return $this->render('centralFirstBundle:Default:list.html.twig');
            } else {
                $todos=$session->get('meTodos');
                unset($todos[$key]);
                $session->set('mesTodos', $todos);
                $session->getFlashBag()->add('success', 'valeur supprimer avec success');

            }

        }
    }


}
