<?php

namespace App\Http\Controllers;

use App\Waffle;

class BakeController
{
    public function index()
    {
        return view('bake.index', [
            'waffle' => new Waffle(['html' => '', 'css' => '', 'js' => '']),
        ]);
    }
}
