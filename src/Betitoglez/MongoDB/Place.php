<?php

namespace Betitoglez\MongoDB;


use Betitoglez\MongoDB\Features\Geolocation;

class Place extends Geolocation
{

    protected $table = 'Places';

    public function searchByText ($search_value)
    {
        return $this->where('name', 'regexp', "/.*".$search_value."/i")
                ->orWhere('description','regexp',"/.*".$search_value."/i");
    }

    public function searchNear ($latitude,$longitude,$radius=100)
    {
        return $this->where('location', 'near', [
            '$geometry' => [
                'type' => 'Point',
                'coordinates' => [
                   $longitude,
                   $latitude,
                ],
            ],
            '$maxDistance' => $radius,
        ]);
    }
}