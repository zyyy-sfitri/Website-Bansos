<?php

namespace App\Controllers;

use App\Models\provinsimodel;

class Home extends BaseController
{

  public function register()
{
    $provModel = new \App\Models\provinsimodel();
    $provinsi = $provModel->findAll();

    return view('logreg/register', [
        'provinsi' => $provinsi
    ]);
}
}
