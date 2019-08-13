<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        dump($request);

        return new Response( '<h2>index</h2>');

    }

    /**
     * @Route("/custom/{name?}", name="custom")
     * @param RequestAlias $request
     * @return Response
     */

    public function custom(Request $request){
        dump($request);
        return new Response('<h2>CUSTOM PAGE</h2>');
    }
}
