<?php
 namespace App\Controller;

 use App\Entity\Post;
 use App\Repository\PostRepository;
 use Doctrine\ORM\EntityManagerInterface;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\JsonResponse;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\Routing\Annotation\Route;

 /**
  * Class PostController
  * @package App\Controller
  * @Route("/api", name="post_api")
  */
 class PostController extends AbstractController
 {
    /**
     * @param PostRepository $postRepository
     * @return JsonResponse
     * @Route("/posts", name="posts", methods={"GET"})
     */
    public function getPosts()
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
        $data = $repository->findBy(
            array(),
            array('id' => 'DESC'),
            10,
            0
        );

        return new JsonResponse($data);
    }

 }