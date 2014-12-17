<?php

/*
 * This file is part of the JhgTheFinalCountDown package.
 *
 * (c) Javi H. Gil
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jhg\TheFinalCountdownBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @category SymfonyBundle
 * @package  Jhg\TheFinalCountdownBundle\DependencyInjection
 * @author   Javi H. Gil
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/javihgil/the-final-countdown-bundle
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jhg_the_final_countdown');

        $rootNode
            ->children()
                ->integerNode('warning_limit')->defaultValue(10)->end()
                ->integerNode('danger_limit')->defaultValue(5)->end()
                ->scalarNode('end_date')->isRequired()->end()
                ->scalarNode('message')->defaultValue('{1} One day to prod!|]1,Inf] %%days%% days to prod')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
