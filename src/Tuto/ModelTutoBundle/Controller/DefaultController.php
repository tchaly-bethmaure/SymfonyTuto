<?php

namespace Tuto\ModelTutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tuto\ModelTutoBundle\Form\PositionType;
use Tuto\ModelTutoBundle\Model\Position;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
	    $position = new Position();
	    $form = $this->createForm(PositionType::class, $position);
	    $form->handleRequest($request);

        return $this->render('TutoModelTutoBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
            'position' => $position,
        ));
    }

    public function presetAction(Request $request)
    {
        $position = new Position();

        if ($request->getMethod() == 'GET') {
            $position->setLattitude('37° 14′ 06″ nord');
            $position->setLongitude('115° 48′ 40″ ouest');
        }

        $form = $this->createForm(PositionType::class, $position);
        $form->handleRequest($request);

        return $this->render('TutoModelTutoBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
            'position' => $position,
        ));
    }
}