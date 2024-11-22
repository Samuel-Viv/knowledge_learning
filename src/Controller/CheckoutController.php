<?php

namespace App\Controller;

use App\Repository\CartRepository;
use App\Service\StripeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CheckoutController extends AbstractController
{

    
    #[Route('/create-checkout-session', name: 'app_checkout')]
    public function createCheckoutSession(Request $request, CartRepository $cartRepository, StripeService $stripeService): Response
    {
       $user = $this->getUser();
       $cartItems = $cartRepository->findBy(['user' =>$user]);

       $session = $stripeService->createCheckoutSession(
            $cartItems,
            $this->generateUrl('success_payment', [], UrlGeneratorInterface::ABSOLUTE_URL),
            $this->generateUrl('cancel_payment', [], UrlGeneratorInterface::ABSOLUTE_URL),
       );

       return $this->redirect($session->url);
    }

    #[Route('/success_payment',name:'success_payment')]
    public function successPayment()
    {
        return $this->render('checkout/success_payment.html.twig');
    }

    #[Route('/cancel_payment',name:'cancel_payment')]
    public function cancelPayment()
    {
        return $this->render('checkout/cancel_payment.html.twig');
    }
}
