<?php

// src/AppBundle/Menu/MenuBuilder.php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Translation\DataCollectorTranslator;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', [
            'label' => 'app.home',
            'route' => 'app_index'
        ]);

        $menu->addChild('person', [
            'label' => 'app.tuto.doctrine',
            'route' => 'tuto_doctrine_person_index'
        ]);

        $menu->addChild('event', [
            'label' => 'app.tuto.event',
            'route' => 'tuto_event_dispatch'
        ]);

        return $menu;
    }
}