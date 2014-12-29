<?php

namespace Usolv\TrackingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsolvTrackingBundle:Default:index.html.twig');
    }
}
