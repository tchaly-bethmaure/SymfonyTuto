<?php

namespace Tuto\EventTutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\GenericEvent;
use Tuto\EventTutoBundle\Events;

class DefaultController extends Controller
{
    public function indexAction()
    {
		$event = new GenericEvent();
		$this->get('event_dispatcher')->dispatch(Events::TUTO_EVENT, $event);

        return $this->render('TutoEventTutoBundle:Default:index.html.twig', [
        	'event' => $event
        ]);
    }
}
