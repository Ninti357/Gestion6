<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIGeoController extends Controller
{
    public $geoUrl;
    public $estados;
    public $municipios;
    public $estadoMunicipios;

    public function __construct()
    {
        $this->geoUrl = config('app.geoUrl');
        $this->estados = Http::get($this->geoUrl.'/estados')->json();
        // $this->municipios = Http::get($this->geoUrl.'/municipios')->json();
    }
    public function estados()
    {
        return $this->estados;
    }

    public function estado($id)
    {
        foreach ($this->estados as $estado) {
            $arrayEstados[$estado['id']] = $estado['estado'];
        }
        return $this->estados[$id];
    }

    public function municipios()
    {
        return $this->municipios;
    }


    public function estadoMunicipios($id)
    {
       $municipios = $this->estados[$id]['municipios'];
    }
}
