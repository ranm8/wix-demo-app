<?php

namespace Wix\DemoBundle\Controller;

use Wix\DemoBundle\Document\ApplicationUser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Wix\FrameworkBundle\Configuration\Permission;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Wix\FrameworkBundle\Exception\MissingParametersException;

/**
 * @Route("/user")
 */
class UserController extends ParentController
{
    /**
     * @Route("/", name="getUser", options={"expose"=true})
     * @Method({"GET"})
     * @Template
     */
    public function getUserAction()
    {
        return new JsonResponse(new \stdClass());

        return $this->jsonResponse(
            $this->getUserDocument()
        );
    }

    /**
     * @Route("/", name="postUser", options={"expose"=true})
     * @Method({"POST"})
     * @Permission({"OWNER"})
     */
    public function postUserAction()
    {
        $data = json_decode($this->getRequest()->getContent());

        if ($data === null) {
            throw new MissingParametersException('POST data was not given');
        }

        /** @var ApplicationUser $user */
        $user = $this->getUserDocument();

        $user->setFontFamily($data->fontFamily);
        $user->setFontSize($data->fontSize);
        $user->setTitleColor($data->titleColor);
        $user->setTextColor($data->textColor);
        $user->setUrlColor($data->urlColor);
        $user->setBirthDate($data->birthDate);
        $user->setSearchBackground($data->searchBackground);
        $user->setSearchBackgroundOpacity($data->searchBackgroundOpacity);
        $user->setSearchBackgroundOpacityValue($data->searchBackgroundOpacityValue);
        $user->setSearchBorder($data->searchBorder);
        $user->setSearchBorderOpacity($data->searchBorderOpacity);
        $user->setSearchBorderOpacityValue($data->searchBorderOpacityValue);
        $user->setBorderColor($data->borderColor);

//        $user = $this->updateUserDoc($user);
        $this->getDocumentManager()->persist($user);
        $this->getDocumentManager()->flush($user);

        return $this->jsonResponse($user);
    }

    /**
     * Serializes the object and returns JSON response
     *
     * @param $object
     * @return JsonResponse
     */
    protected function jsonResponse($object)
    {
        return new JsonResponse($this->getSerializer()->normalize($object, 'json'));
    }

    /**
     * Returns GetSetMethod JSON serializer object
     *
     * @return Serializer
     */
    protected function getSerializer()
    {
        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array(new JsonEncoder()));

        return $serializer;
    }

}
