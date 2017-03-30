<?php

namespace Tuto\ConfigTutoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tuto_config_tuto');

        $rootNode
            ->children()
                ->scalarNode('login')
                    ->info('Login de it2 sur teampass')
                    ->isRequired()
                    ->defaultValue('~')
                ->end()
                ->scalarNode('password')
                    ->info('Login de it2 sur teampass')
                    ->isRequired()
                    ->defaultValue('~')
                ->end()
                ->integerNode('port')
                    ->info('Port de it2 (voir wiki : www.wiki.toto/it2)')
                    ->defaultValue(80)
                    ->min(1)->max(65535)
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
