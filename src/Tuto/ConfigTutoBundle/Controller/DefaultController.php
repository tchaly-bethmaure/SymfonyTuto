<?php

namespace Tuto\ConfigTutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	dump($this->container->getParameter('tuto_config_tuto.auto_connect'));
        return $this->render('TutoConfigTutoBundle:Default:index.html.twig', array(
        ));
    }
}
