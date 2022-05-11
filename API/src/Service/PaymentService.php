<?php

namespace App\Service;

use ApiPlatform\Core\Api\UrlGeneratorInterface;
use App\Entity\Reservation;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Component\Routing\RouterInterface;

class PaymentService {

    public function __construct(private RouterInterface $router)
    {
    }

    public function payment(Reservation $reservation){
        
        Stripe::setApiKey('sk_test_51KxrbVHlCnziPo87nWN2cWdMCwyIFpqabSkhvVPetBkjArYhCjTpsRQvdPIrrcrloroVa6WeueKuUkTtXpsgiBOx00HvJojNmG');

        $session = Session::create([
            'customer_email' => $reservation->getClient()->getEmail(),
            'line_items' => [[
                'price_data' => [
                  'currency' => 'eur',
                  'product_data' => [
                    'name' => $reservation->getEvent()->getTitle(),
                  ],
                  'unit_amount' => $reservation->getEvent()->getCost(),
                ],
                'quantity' => 1,
              ]],
              'mode' => 'payment',
              'success_url' => $this->router->generate(name: 'success_url', referenceType: UrlGeneratorInterface::ABS_URL),
              'cancel_url' => $this->router->generate(name: 'cancel_url', referenceType: UrlGeneratorInterface::ABS_URL)
        ]);

        return $session;
    }
}