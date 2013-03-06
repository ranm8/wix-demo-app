<?php

namespace Wix\DemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Wix\FrameworkBundle\Controller\WixController;
use Symfony\Component\HttpFoundation\Response;
use Wix\FrameworkBundle\Document\User;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Wix\FrameworkBundle\Exception\MissingParametersException;
use Wix\FrameworkBundle\Document\UserInterface;
use Wix\FrameworkBundle\Configuration\Permission;

/**
 * @Route("/user")
 */
class UserController extends WixController
{
    /**
     * @Route("/", name="getUser", options={"expose"=true})
     * @Method({"GET"})
     * @Template
     */
    public function getUserAction()
    {
        // remove later
        return new JsonResponse(new \stdClass());

        /** @var User $user */
        $user = $this->getUserDocument();

        return $this->jsonResponse($user);
    }

    /**
     * @Route("/", name="postUser", options={"expose"=true})
     * @Method({"POST"})
     */
    public function updateUserAction() {
        // remove later
        return new JsonResponse(new \stdClass()); // I also removed the @permission annotation, don't forget to put it back

        $data = json_decode($this->getRequest()->getContent());

        if ($data === null) {
            throw new MissingParametersException('POST data was not given');
        }

        /** @var UserInterface $user */
        $user = $this->getUserDocument();
        $user = $this->updateUserDoc($user);

        return $this->jsonResponse($user);
    }

    /**
     * Serializes the object and returns JSON response
     * @param $object
     * @return Response
     */
    protected function jsonResponse($object)
    {
        $response = new Response($this->getSerializer()->serialize($object, 'json'));
        $response->headers->set('Content-type', 'application/json');

        return $response;
    }

    /**
     * @inheritDoc
     */
    protected function getDocumentType()
    {
        return 'WixFrameworkBundle:User';
    }

    /**
     * Returns GetSetMethod JSON serializer object
     * @return Serializer
     */
    protected function getSerializer()
    {
        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array(new JsonEncoder()));

        return $serializer;
    }

}
