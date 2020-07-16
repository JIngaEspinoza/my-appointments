<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkDay;

class ScheduleController extends Controller
{
  public function edit()
  {
    $days = [
      'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'
    ];
    return view('schedule', compact('days'));
  }

  public function store(Request $request)
  {
    $active = $request->input('active')?:[];
    $moorning_start = $request->input('moorning_start');
    $moorning_end = $request->input('moorning_end');
    $afternoon_start = $request->input('afternoon_start');
    $afternoon_end = $request->input('afternoon_end');

    for($i=0; $i<7; $i++) {
      WorkDay::updateOrCreate(
        [
          'day' => $i,
          'user_id' => auth()->user()->id,
        ],
        [
          'active' => in_array($i, $active) ,
          'moorning_start' => $moorning_start[$i],
          'moorning_end' => $moorning_end[$i],
          'afternoon_start' => $afternoon_start[$i],
          'afternoon_end' => $afternoon_end[$i],
        ]
      );
    }
    return back();
  }
}
