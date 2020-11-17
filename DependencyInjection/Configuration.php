<?php

namespace DMS\Bundle\TwigExtensionBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('dms_twig_extension');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC for symfony/config < 4.2
            $rootNode = $treeBuilder->root('dms_twig_extension');
        }

        $rootNode->children()
            ->arrayNode('fabpot')
                ->addDefaultsIfNotSet()
                ->children()
                    ->booleanNode('array')->defaultTrue()->end()
                    ->booleanNode('date')->defaultTrue()->end()
                    ->booleanNode('i18n')->defaultFalse()->end()
                    ->booleanNode('intl')->defaultTrue()->end()
                    ->booleanNode('text')->defaultTrue()->end()
                ->end()
            ->end();

        $rootNode->children()
            ->arrayNode('dms')
                ->addDefaultsIfNotSet()
                ->children()
                    ->booleanNode('textual_date')->defaultTrue()->end()
                    ->booleanNode('pad_string')->defaultTrue()->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
