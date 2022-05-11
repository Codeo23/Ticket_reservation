<?php 

namespace App\Controller;

use App\Entity\Reservation;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class PaymentHandler extends AbstractController{

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
        Stripe::setApiKey('pk_test_51KxrbVHlCnziPo87VGCFS1ycG3T7XHEnedEsUAE5EAL1B5IF2iO7xAHnfu8jRs4myywUcDfGzmlRPzkmqc8nq3NZ00sC8oVKAf');
        
    }
}