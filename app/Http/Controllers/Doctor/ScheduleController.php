<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkDay;
use Carbon\Carbon;
class ScheduleController extends Controller
{
  private $days = [
    'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'
  ];
  public function edit()
  {

    $workDays = WorkDay::where('user_id', auth()->id())->get();
    $workDays->map(function($workDay){
      $workDay->moorning_start = (new Carbon($workDay->moorning_start))->format('g:i A');
      $workDay->moorning_end = (new Carbon($workDay->moorning_end))->format('g:i A');
      $workDay->afternoon_start = (new Carbon($workDay->afternoon_start))->format('g:i A');
      $workDay->afternoon_end = (new Carbon($workDay->afternoon_end))->format('g:i A');
      return $workDay;
    });
    // dd($workDays->toArray());
    $days = $this->days;
    return view('schedule', compact('workDays','days'));
  }

  public function store(Request $request)
  {
    $active = $request->input('active')?:[];
    $moorning_start = $request->input('moorning_start');
    $moorning_end = $request->input('moorning_end');
    $afternoon_start = $request->input('afternoon_start');
    $afternoon_end = $request->input('afternoon_end');

    $errors = [];

    for($i=0; $i<7; $i++) {
      if ($moorning_start[$i] > $moorning_end[$i]) {
        $errors [] = 'Las horas del turno mañana son inconsistentes para el día ' . $this->days[$i]. '.';
      }
      if ($afternoon_start[$i] > $afternoon_end[$i]) {
        $errors [] = 'Las horas del turno tarde son inconsistentes para el día ' . $this->days[$i]. '.';
      }
      WorkDay::updateOrCreate([
        'day' => $i,
        'user_id' => auth()->user()->id,
      ],[
        'active' => in_array($i, $active) ,
        'moorning_start' => $moorning_start[$i],
        'moorning_end' => $moorning_end[$i],
        'afternoon_start' => $afternoon_start[$i],
        'afternoon_end' => $afternoon_end[$i],
      ]);
    }
    if (count($errors)>0) {
      return back()->with(compact('errors'));
    }
    $notification = 'Los cambios se han guardado correctamente.';
    return back()->with(compact('notification'));
  }
}
