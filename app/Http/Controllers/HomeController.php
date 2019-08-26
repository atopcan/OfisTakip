<?php

namespace App\Http\Controllers;

use App\Month;
use App\Personel;
use Illuminate\Http\Request;
use App\Calender;


class HomeController extends Controller
{
public function calender($ay = null){
    $calender = Calender::get();
    $personel = Personel::get();
    $months = Month::get();
    if($ay == null){
        $ay = (int) date('m');
    }

    return view('calender')->with(compact('ay','calender','personel','months'));
}
public function calenderPersonelAdd(){
    $personel = Personel::get();
    return view('calenderPersonelAdd')->with(compact('personel'));
}
}
