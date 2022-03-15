<?php
namespace App\Controller;


use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthController extends AbstractController
{   
    /**
     * @var integer HTTP 200 (OK) by default
     */
    protected $statusCode = 200;

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $entityManager  = $this->getDoctrine()->getManager();
        $request        = $this->transformJsonBody($request);
        $username       = $request->get('name');
        $password       = $request->get('password');
        $email          = $request->get('email');

        if (empty($username) || empty($password) || empty($email))
        {
            
            return $this->outputValidationError("Validation failed");
        }

        $user = new User($username);
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $user->setUsername($username);

        $entityManager->persist($user);
        $entityManager->flush();
        
        return $this->outputSuccess(sprintf('User %s created', $user->getUsername()));
    }

    /**
     * @param UserInterface $user
     * @param JWTTokenManagerInterface $JWTManager
     * @return JsonResponse
    */
    public function getTokenUser(UserInterface $user, JWTTokenManagerInterface $JWTManager)
    {
        return new JsonResponse(['token' => $JWTManager->create($user)]);
    }

    private function outputValidationError($message)
    {
        $output = [
            'status' => 422,
            'success' => $message,
        ];
        
        return new JsonResponse($output, $this->statusCode);
    }

    private function outputSuccess($message)
    {
        $output = [
            'status' => $this->statusCode,
            'success' => $message,
        ];
        
        return new JsonResponse($output, $this->statusCode);
    }
}