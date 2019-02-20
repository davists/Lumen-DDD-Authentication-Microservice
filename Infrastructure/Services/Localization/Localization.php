<?php
/**
 * Created by PhpStorm.
 * User: davi
 * Date: 7/13/17
 * Time: 1:02 AM
 */

namespace Infrastructure\Services\Localization;


class Localization
{
    private $mapsAPI = 'http://maps.googleapis.com/maps/api/geocode/json';

    //coordenadas prefeitura de porto alegre
    private $referentialLatitude = -30.0238288;
    private $referenctialLongitude =  -51.2279579;

    public function distanceToReference($latitude,$longitude)
    {
        $distance = $this->distance($latitude,$longitude,$this->referentialLatitude,$this->referenctialLongitude,'K');
        $distance = round($distance,5);
        return $distance;
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

    public function getGeoPointByZipCode($zipCode)
    {
        $latitude = 'NOT_FOUND';
        $longitude = 'NOT_FOUND';

        $geo = file_get_contents($this->mapsAPI."?address=$zipCode&sensor=false");
        $geo = json_decode($geo, true);

        if ($geo['status'] == 'OK') {
            // Get Lat & Long
            $latitude = $geo['results'][0]['geometry']['location']['lat'];
            $longitude = $geo['results'][0]['geometry']['location']['lng'];
        }

        return ['latitude'=>$latitude,'longitude'=>$longitude];
    }
}