<?php

namespace Tuto\ConfigTutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TutoConfigTutoBundle:Default:index.html.twig', array(
	    	'login' => $this->container->getParameter('it2.login'),
	    	'password' => $this->container->getParameter('it2.password'),
	    	'port' => $this->container->getParameter('it2.port'),
        ));
    }
}
