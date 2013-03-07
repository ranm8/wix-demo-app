<?php

namespace Wix\DemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wix\FrameworkBundle\Controller\WixController;

/**
 * @Route("/app/{wildcard}", name="_wildcard", requirements={"wildcard" = ".+"})
 */
class MainController extends WixController
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

    protected function getDocumentType()
    {

    }
}
