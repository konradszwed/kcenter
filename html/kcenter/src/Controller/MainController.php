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
        $content=$request->get('name');
        $DOCUMENT_ROOT=$request->get('DOCUMENT_ROOT');
        return $this->render('home/index.html.twig', [
            'content' => $content,
            'DOCUMENT_ROOT' => $DOCUMENT_ROOT
        ]);
        //return new Response( '<h2>index</h2>');

    }

    /**
     * @Route("/custom/{name?}", name="custom")
     * @param RequestAlias $request
     * @return Response
     */

    public function custom(Request $request){
        dump($request);
        $content=$request->get('name');
        $DOCUMENT_ROOT=$request->get('DOCUMENT_ROOT');
        return $this->render('home/custom.html.twig', [
            'content' => $content,
            'DOCUMENT_ROOT' => $DOCUMENT_ROOT
        ]);
        //return new Response('<h2>'.$content.'</h2>');
    }

}
