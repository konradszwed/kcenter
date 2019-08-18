<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
//use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/post", name="post.")
 */

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     * @param PostRepository $postRepository
     * @return Response
     */
    public function index(PostRepository $postRepository)
    {
        $posts = $postRepository->findAll();

        return $this->render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/create", name="create")
     */

    public function create(Request $request){
        //create a new post
        $post = new Post();
        $post -> setTitle('Title'.date("h:i:s"))->setDescription('Description'.date("h:i:s"));

        //entity manager
        $em = $this -> getDoctrine()->getManager();
        //saving into db
        $em->persist($post);
        $em->flush();

        return $this->redirect($this->generateUrl('post.post'));
    }

    /**
     * @Route("/show/{id}", name="show")
     * @param Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        //$post = $postRepository->find($id);

        return $this->render('post/show.html.twig', [
            'post' => $post
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     * @param Post $post
     * @return Response
     */
    public function delete(Post $post)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();


        return $this->redirect($this->generateUrl('post.post'));
    }
}
