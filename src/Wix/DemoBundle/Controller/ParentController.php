<?php

namespace Wix\DemoBundle\Controller;

use Wix\FrameworkBundle\Controller\WixController;

class ParentController extends WixController
{
    /**
     * @inheritDoc
     */
    protected function getDocumentType()
    {
        return 'WixDemoBundle:ApplicationUser';
    }
}
