<?php

if (!function_exists('calculateDistance')) {
    function calculateDistance($pointALatitude, $pointALongitude, $pointBLatitude, $pointBLongitude): float|int
    {
        $earthRadius = 6371; // Radius of the Earth in kilometers

        // Convert latitude and longitude from degrees to radians
        $pointALatitudeRad = deg2rad($pointALatitude);
        $pointALongitudeRad = deg2rad($pointALongitude);
        $pointBLatitudeRad = deg2rad($pointBLatitude);
        $pointBLongitudeRad = deg2rad($pointBLongitude);

        // Calculate the differences between coordinates
        $latDiff = $pointBLatitudeRad - $pointALatitudeRad;
        $lonDiff = $pointBLongitudeRad - $pointALongitudeRad;

        // Haversine formula
        $a = sin($latDiff / 2) * sin($latDiff / 2) +
            cos($pointALatitudeRad) * cos($pointBLatitudeRad) *
            sin($lonDiff / 2) * sin($lonDiff / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // Calculate the distance
        return $earthRadius * $c; //KM
    }
}

function deriveProximity(int|float $distance): string
{
    $distanceInMeter = $distance * 1000; # convert km to meters 5km * 1000 = 5000 meter
    if ($distanceInMeter <= 10 ) { # 10 meter
        return "At the Expected Location";
    } elseif ($distanceInMeter <= 50 ) { # 50 meters
        return "Near the Expected Location";
    } else {
        return "Not at the Expected Location";
    }
}
