<?php

interface TravelStrategy
{
    public function calculateCostbyKm($km);
}

class TravelByCarStrategy implements TravelStrategy
{
    public function calculateCostbyKm($km)
    {
        $costForOneKm = 2;
        $travelCost = $km * $costForOneKm . " $";

        return $travelCost;
    }
}

class TravelByBoatStrategy implements TravelStrategy
{
    public function calculateCostbyKm($km)
    {
        $costForOneKm = 8;
        $travelCost = $km * $costForOneKm . " $";

        return $travelCost;
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
        $travelCost = $this->strategy->calculateCostbyKm($km);
        echo "Travelling " . $km . " km by car will cost " . $travelCost;
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
        $travelCost = $this->strategy->calculateCostbyKm($km);
        echo "Travelling " . $km . " km by boat will cost " . $travelCost;
    }
}

function calculateCost($travelType, $distance) {
    $travelType = new $travelType();

    return $travelType->calculateCost($distance);;
}

$distance = $_GET["distance"];
calculateCost('CarTravel', $distance);
