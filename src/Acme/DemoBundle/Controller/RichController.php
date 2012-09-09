<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RichController extends Controller
{
    public function indexAction()
    {
        return new Response("Hello, world");
    }
}
