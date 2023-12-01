<?php

namespace App\Http\Integrations;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class EventResource
{
    static public function list()
    {
        $response = Http::get('http://event/show');
        return $response;
    }
}
