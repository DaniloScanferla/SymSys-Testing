<?php

namespace WMS\EstoqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WMSEstoqueBundle:Default:index.html.twig', array('name' => $name));
    }
}
