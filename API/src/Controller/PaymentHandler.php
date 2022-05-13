<?php 

namespace App\Controller;

use App\Entity\Reservation;
use App\Message\SendTicket;
use App\Repository\ReservationRepository;
use App\Service\PaymentService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Messenger\MessageBusInterface;
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
        ], status: Response::HTTP_OK);
    }

    #[Route(path: '/success/{id}', name: 'success_url', methods: ['GET'])]
    public function successPayment(RequestStack $req, ReservationRepository $rep, 
    EntityManagerInterface $em, MessageBusInterface $bus){

        $routeParameters = $req->getMainRequest()->attributes->get('_route_params');
        $data = $rep->find($routeParameters['id']);

        $data->setPayed(true);
        $em->flush();

        $email = $data->getClient()->getEmail();
        $date = $data->getEvent()->getDateEvent();

        $bus->dispatch(new SendTicket(email: $email, date: $date));
        
        return $this->redirectToRoute('success');
    }

    #[Route(path: '/success', name: 'success')]
    public function successHandler(){

        return $this->render('Payment/success.html.twig');
    }

    #[Route(path: '/cancel', name: 'cancel_url')]
    public function cancelHandler(){

        return $this->render('Payment/cancel.html.twig');
    }
}