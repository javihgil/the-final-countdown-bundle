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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class JhgTheFinalCountdownExtension
 *
 * @category SymfonyBundle
 * @package  Jhg\TheFinalCountdownBundle\DependencyInjection
 * @author   Javi H. Gil
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/javihgil/the-final-countdown-bundle
 */
class JhgTheFinalCountdownExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('jhg.thefinalcountdown.end_date', $config['end_date']);
        $container->setParameter('jhg.thefinalcountdown.message', $config['message']);
        $container->setParameter('jhg.thefinalcountdown.danger_limit', $config['danger_limit']);
        $container->setParameter('jhg.thefinalcountdown.warning_limit', $config['warning_limit']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }
}
