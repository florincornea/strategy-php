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

class Car implements TravelType
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

class Boat implements TravelType
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


$travelType = new Boat();

$distance = $_GET["distance"];

$travelType->calculateCost($distance);