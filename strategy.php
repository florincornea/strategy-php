<?php

interface TravelStrategy
{
    public function calculateCostbyKm($km);
    public function calculateGasbyKm($km);
}

class TravelByCarStrategy implements TravelStrategy
{
    public function calculateCostbyKm($km)
    {
        $costForOneKm = 2;
        $travelCost = $km * $costForOneKm . " $";

        return $travelCost;
    }

    public function calculateGasbyKm($km)
    {
        $gasForOneKm = 7.2/100;
        $travelCost = $km * $gasForOneKm . " l of Gas";

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

    public function calculateGasbyKm($km)
    {
        $gasForOneKm = 127/120;
        $travelCost = $km * $gasForOneKm . " l of Disel";

        return $travelCost;
    }
}


interface TravelType
{
    public function calculateCost($km);
    public function calculateGas($km);
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

    public function calculateGas($km)
    {
        $gas = $this->strategy->calculateGasbyKm($km);
        echo "Travelling " . $km . " km, the car will consume " . $gas;
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

    public function calculateGas($km)
    {
        $gas = $this->strategy->calculateGasbyKm($km);
        echo "Travelling " . $km . " km, the boat will consume " . $gas;
    }
}

function calculateCost($travelType, $distance) {
    $travelType = new $travelType();

    return $travelType->calculateCost($distance);;
}

function estimateGasNeeds($travelType, $distance) {
    $travelType = new $travelType();

    return $travelType->calculateGas($distance);
}

$distance = $_GET["distance"];
calculateCost('CarTravel', $distance);
echo '<br>';
estimateGasNeeds('CarTravel', $distance);
