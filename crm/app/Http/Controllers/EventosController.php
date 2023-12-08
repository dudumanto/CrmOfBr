<?php

namespace App\Http\Controllers;


use App\Models\Eventos;


class EventosController extends Controller
{
    public function create()
    {
        return view("eventos");
    }
}
