<?php

// src/AppBundle/EventSubscriber/ExceptionSubscriber.php
namespace Tuto\EventTutoBundle\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionSubscriber implements EventSubscriberInterface
{
    private $env;

    public function __construct($env)
    {
        $this->env = $env;
    }
    
    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return array(
           KernelEvents::EXCEPTION => array(
               array('processException', 10),
               array('logException', 0),
               array('notifyException', -10),
           )
        );
    }

    public function processException(GetResponseForExceptionEvent $event)
    {
        if ($this->env === 'dev') {
            dump($event->isMasterRequest());
            dump("processException triggered");
        }
    }

    public function logException(GetResponseForExceptionEvent $event)
    {
        if ($this->env === 'dev') {
            dump($event->isMasterRequest());
            dump("logException triggered");
        }
    }

    public function notifyException(GetResponseForExceptionEvent $event)
    {
        if ($this->env === 'dev') {
            dump($event->isMasterRequest());
            dump("notifyException triggered");
        }
    }
}