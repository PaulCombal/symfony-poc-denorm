<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class DenormController extends AbstractController
{
    #[Route('/car', name: 'new_car')]
    public function index(Request $request, SerializerInterface $serializer): Response
    {
        $content = $request->getContent();
        /** @var Car $car */
        $car = $serializer->deserialize($content, Car::class, 'json');
        return $this->json(['message' => $car->getSteeringWheel()->getSerialNumber()]);
    }
}
