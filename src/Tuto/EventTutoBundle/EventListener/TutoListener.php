<?php

// src/AppBundle/EventListener/ExceptionListener.php
namespace Tuto\EventTutoBundle\EventListener;
use Symfony\Component\EventDispatcher\GenericEvent;

class TutoListener
{
    private $env;

    public function __construct($env)
    {
        $this->env = $env;
    }

    public function onTutoEvent(GenericEvent $event)
    {
        if ($this->env === 'dev') {
            dump($event);
            dump("onTutoEvent triggered");
        }
    }
}