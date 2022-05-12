<?php 

namespace App\Controller;

use App\Entity\Reservation;
use App\Service\PaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class PaymentHandler extends AbstractController{

    public function __construct(private MailerInterface $mailer, private PaymentService $paymentService)
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
        $url = $this->paymentService->paymentUrl($data);
        
        $info = (new Email())
            ->from('noreply@gmail.com')
            ->to($data->getClient()->getEmail())
            ->subject('Link for the payment')
            ->html('<a href='.$url.'>Click here</a>')
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