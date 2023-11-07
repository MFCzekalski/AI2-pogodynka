<?php

namespace App\Entity;

use App\Repository\MeasurementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasurementRepository::class)]
class Measurement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'measurements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $Location_ID = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateTime = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: '0')]
    private ?string $Celsius = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 2)]
    private ?string $Humidity = null;

    #[ORM\Column]
    private ?int $WindSpeed = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $WindDirection = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationID(): ?Location
    {
        return $this->Location_ID;
    }

    public function setLocationID(?Location $Location_ID): static
    {
        $this->Location_ID = $Location_ID;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->DateTime;
    }

    public function setDateTime(\DateTimeInterface $DateTime): static
    {
        $this->DateTime = $DateTime;

        return $this;
    }

    public function getCelsius(): ?string
    {
        return $this->Celsius;
    }

    public function setCelsius(string $Celsius): static
    {
        $this->Celsius = $Celsius;

        return $this;
    }

    public function getHumidity(): ?string
    {
        return $this->Humidity;
    }

    public function setHumidity(string $Humidity): static
    {
        $this->Humidity = $Humidity;

        return $this;
    }

    public function getWindSpeed(): ?int
    {
        return $this->WindSpeed;
    }

    public function setWindSpeed(int $WindSpeed): static
    {
        $this->WindSpeed = $WindSpeed;

        return $this;
    }

    public function getWindDirection(): ?string
    {
        return $this->WindDirection;
    }

    public function setWindDirection(string $WindDirection): static
    {
        $this->WindDirection = $WindDirection;

        return $this;
    }
}
