<?php 

namespace App\Controller;

use ApiPlatform\Core\Api\UrlGeneratorInterface;
use App\Entity\Reservation;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class PaymentHandler extends AbstractController{

    public function __construct(private MailerInterface $mailer)
    {
    }

    #[Route(
        name: 'reservation_payment',
        path: 'api/reservation/{id}/payment',
        methods: 'POST',
        defaults: [
            '_api_resource_class' => Reservation::class,
            '_api_item_operation_name' => 'payment',
        ],
    )]
    public function __invoke(Reservation $data): Response
    {
        Stripe::setApiKey('sk_test_51KxrbVHlCnziPo87nWN2cWdMCwyIFpqabSkhvVPetBkjArYhCjTpsRQvdPIrrcrloroVa6WeueKuUkTtXpsgiBOx00HvJojNmG');

        $session = Session::create([
            'customer_email' => $data->getClient()->getEmail(),
            'line_items' => [[
                'price_data' => [
                  'currency' => 'eur',
                  'product_data' => [
                    'name' => $data->getEvent()->getTitle(),
                  ],
                  'unit_amount' => $data->getEvent()->getCost(),
                ],
                'quantity' => 1,
              ]],
              'mode' => 'payment',
              'success_url' => $this->generateUrl(route: 'success_url', referenceType: UrlGeneratorInterface::ABS_URL),
              'cancel_url' => $this->generateUrl(route: 'cancel_url', referenceType: UrlGeneratorInterface::ABS_URL)
        ]);
        
        $info = (new Email())
            ->from('noreply@gmail.com')
            ->to($data->getClient()->getEmail())
            ->subject('Link for the payment')
            ->html('<a href='.$session->url.'>Click here</a>')
        ;
        $this->mailer->send($info);
        
        return new JsonResponse([
            'message' => 'check your email inbox'
        ], status: 200);
    }

    #[Route(path: '/success', name: 'success_url')]
    public function successHandler(){

        return $this->render('Payment/success.html.twig');
    }

    #[Route(path: '/cancel', name: 'cancel_url')]
    public function cancelHandler(){

        return $this->render('Payment/cancel.html.twig');
    }
}