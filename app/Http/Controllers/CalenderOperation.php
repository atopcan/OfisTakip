<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\CarbonTimeZone;
use Illuminate\Http\Request;
use App\Calender;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CalenderOperation extends Controller
{
    public function save(Request $request){
        $tarih = explode('/',$request->tarih);
        $ay = (int) $tarih[0];
        $gun = (int) $tarih[1];
        $yil = (int) $tarih[2];
        $val = Calender::create([
        'personel_id'=> $request->personel_name,
        'months'=> $ay,
        'days'=> $gun,
        'note'=> $request->note,
        ]);
        if($val){
            return redirect()->back()->with('message', 'IT WORKS!');

        }
        return $val;
    }
  public function delete(Request $request){
      $val = Calender::where('id',$request->id)->delete();
      if($val){
          return 'Başarılı';
      }
    return $val;

  }




}
