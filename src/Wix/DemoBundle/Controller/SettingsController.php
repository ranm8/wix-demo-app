<?php

namespace Wix\DemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wix\FrameworkBundle\Controller\WixController;

/**
 * @Route("/settings")
 */
class SettingsController extends WixController
{
    /**
     * @Route("/", name="settings")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
