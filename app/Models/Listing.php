<?php

namespace App\Models;

class Listing {

    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'listing 1',
                'description' => 'Justo est dolor sed lorem est voluptua dolor sit sanctus, voluptua dolores ut sit eirmod ea, tempor nonumy accusam no.'
            ],
            [
                'id' => 2,
                'title' => 'listing 2',
                'description' => 'Justo est dolor sed lorem est voluptua dolor sit sanctus, voluptua dolores ut sit eirmod ea, tempor nonumy accusam no.'
            ]
            ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach($listings as $listing){
            if($listing['id'] == $id){
                return $listing;
            }
        }
    }

}