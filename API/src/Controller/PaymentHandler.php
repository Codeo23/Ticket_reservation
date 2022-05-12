<?php 

namespace App\Controller;

use App\Entity\Reservation;
use App\Service\PaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class PaymentHandler extends AbstractController{

    public function __construct(private PaymentService $paymentService)
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
        
        return new JsonResponse([
            'message' => "This is the payment's link",
            'link' => $url
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