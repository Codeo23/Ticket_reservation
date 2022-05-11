<?php 

namespace App\Controller;

use App\Entity\Reservation;
use Stripe\Checkout\Session;
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
        Stripe::setApiKey('sk_test_51KxrbVHlCnziPo87nWN2cWdMCwyIFpqabSkhvVPetBkjArYhCjTpsRQvdPIrrcrloroVa6WeueKuUkTtXpsgiBOx00HvJojNmG');

        $session = Session::create([
            'line_items' => [[
                'price_data' => [
                  'currency' => 'usd',
                  'product_data' => [
                    'name' => 'T-shirt',
                  ],
                  'unit_amount' => 2000,
                ],
                'quantity' => 1,
              ]],
              'mode' => 'payment',
              'success_url' => 'http://localhost:4242/success.html',
              'cancel_url' => 'http://localhost:4242/cancel.html',
        ]);

        return $this->redirect($session->url, status: 303);
    }
}