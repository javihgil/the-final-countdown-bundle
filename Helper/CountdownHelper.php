<?php

/*
 * This file is part of the JhgTheFinalCountDown package.
 *
 * (c) Javi H. Gil
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jhg\TheFinalCountdownBundle\Helper;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CountdownHelper
 *
 * @category SymfonyBundle
 * @package  Jhg\TheFinalCountdownBundle\Helper
 * @author   Javi H. Gil
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/javihgil/the-final-countdown-bundle
 */
class CountdownHelper
{
    /**
     * @param \DateTime $date
     * @return int
     */
    public static function getRemainingDaysTo(\DateTime $date)
    {
        return $date->diff(new \DateTime())->days;
    }
}
