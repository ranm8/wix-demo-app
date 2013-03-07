<?php

namespace Wix\DemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/app/{wildcard}", name="_wildcard", requirements={"wildcard" = ".+"})
 */
class MainController extends ParentController
{
    /**
     * @Route("/", name="index")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
