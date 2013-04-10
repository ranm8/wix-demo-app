<?php

namespace Wix\DemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController extends ParentController
{
    public function indexAction()
    {
        if (!$this->hasPath() || !$this->getInstance()) {
            throw new NotFoundHttpException('Oops! The page you were looking for does not exist.');
        }

        return $this->render('WixDemoBundle::index.html.twig');
    }

    /**
     * @return array
     */
    protected function getClientPaths()
    {
        return array('/view', '/settings');
    }

    /**
     * @return bool
     */
    protected function hasPath()
    {
        foreach($this->getClientPaths() as $path) {
            if (strpos($this->getRequest()->getPathInfo(), $path) === 0) {
                return true;
            }
        }

        return false;
    }
}
