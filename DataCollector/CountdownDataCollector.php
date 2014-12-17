<?php

/*
 * This file is part of the JhgTheFinalCountDown package.
 *
 * (c) Javi H. Gil
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jhg\TheFinalCountdownBundle\DataCollector;

use Jhg\TheFinalCountdownBundle\Helper\CountdownHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CountdownDataCollector
 *
 * @category SymfonyBundle
 * @package  Jhg\TheFinalCountdownBundle\DataCollector
 * @author   Javi H. Gil
 * @license  http://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/javihgil/the-final-countdown-bundle
 */
class CountdownDataCollector extends DataCollector
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param \Exception $exception
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $endDate = $this->container->getParameter('jhg.thefinalcountdown.end_date');
        $remainingDays = CountdownHelper::getRemainingDaysTo(new \DateTime($endDate));

        $toolbarText = $this->container->get('translator')->transchoice(
            $this->container->getParameter('jhg.thefinalcountdown.message'),
            $remainingDays,
            ['%days%'=>$remainingDays]
        );

        if ($remainingDays<=$this->container->getParameter('jhg.thefinalcountdown.danger_limit')) {
            $color = 'red';
        } elseif ($remainingDays<=$this->container->getParameter('jhg.thefinalcountdown.warning_limit')) {
            $color = 'yellow';
        } else {
            $color = 'gray';
        }

        $this->data = array(
            'toolbarText' => $toolbarText,
            'toolbarStatusColor' => $color,
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'countdown';
    }

    /**
     * @return string
     */
    public function getToolbarText()
    {
        return $this->data['toolbarText'];
    }

    /**
     * @return string
     */
    public function getToolbarStatusColor()
    {
        return $this->data['toolbarStatusColor'];
    }
}
