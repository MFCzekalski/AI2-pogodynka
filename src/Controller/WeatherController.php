<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MeasurementRepository;
use App\Repository\LocationRepository;

class WeatherController extends AbstractController
{
    #[Route('/weather/{Name}', name: 'app_weather')]
    public function city(string $Name,LocationRepository $location, MeasurementRepository $repository): Response
    {
        $location = $location->findLocationIdByName($Name);
        $measurements =  $repository->findByLocation($location[0]);

        return $this->render('weather/city.html.twig', [
            'location' => $location[0],
            'measurements' => $measurements,
        ]);

    }
}
