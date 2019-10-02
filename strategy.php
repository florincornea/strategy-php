<?php

interface TravelStrategy
{
    public function returnCostbyKm();
}

class TravelByCarStrategy implements TravelStrategy
{
    public function returnCostbyKm()
    {
        return 2;
    }
}

class TravelByBoatStrategy implements TravelStrategy
{
    public function returnCostbyKm()
    {
        return 8;
    }
}


interface TravelType
{
    public function calculateCost($km);
}

class CarTravel implements TravelType
{
    private $strategy;
    
    public function __construct()
    {
        $this->strategy = new TravelByCarStrategy();
    }
    
    public function calculateCost($km)
    {
        $travelCost = $km * $this->strategy->returnCostbyKm() . "$";
        echo "Travelling " . $km . "km by car will cost " . $travelCost;
    }
}

class BoatTravel implements TravelType
{
    private $strategy;

    public function __construct()
    {
        $this->strategy = new TravelByBoatStrategy();
    }

    public function calculateCost($km)
    {
        $travelCost = $km * $this->strategy->returnCostbyKm() . "$";
        echo "Travelling " . $km . "km by boat will cost " . $travelCost;
    }
}


$travelType = new BoatTravel();

$distance = $_GET["distance"];

$travelType->calculateCost($distance);