<?php

namespace Wix\DemoBundle\Controller;

use Wix\FrameworkBundle\Controller\WixController;

/**
 * Abstract class used for all wix controllers to provide common functionality
 */
abstract class ParentController extends WixController
{
    /**
     * @inheritDoc
     */
    protected function getDocumentType()
    {
        return 'WixDemoBundle:ApplicationUser';
    }

    /**
     * @inheritDoc
     */
    protected function getDocumentClass()
    {
        return 'Wix\DemoBundle\Document\ApplicationUser';
    }
}
