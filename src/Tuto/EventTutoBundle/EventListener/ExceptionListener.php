<?php

// src/AppBundle/EventListener/ExceptionListener.php
namespace Tuto\EventTutoBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener
{
    private $env;

    public function __construct($env)
    {
        $this->env = $env;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ($this->env === 'dev') {
            dump($event->isMasterRequest());
            dump("onKernelException triggered");
        }
    }
}