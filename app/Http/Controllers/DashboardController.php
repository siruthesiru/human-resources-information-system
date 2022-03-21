<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Models\Employee as ModelsEmployee;
use App\Models\Notification as ModelsNotification;

use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\AssignOp\Concat;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = ModelsEmployee::all();
        return view('dashboard.index')->with('employees', $employees);
    }

    public static function getUpcomingBirthdays($employee){

        $user_birthDate = $employee->bDate;

        $user_birthMonth = Carbon::parse($user_birthDate)->month;
        $user_birthDay = Carbon::parse($user_birthDate)->day;
        $current_month = Carbon::now()->month;
        $current_day = Carbon::now()->day;

        if ($user_birthMonth == $current_month && $user_birthDay >= $current_day) {
            return $employee->lName.', '.$employee->fName.' on '.Carbon::parse($user_birthDate)->format('F').' '.$user_birthDay;
        }else{
        }
    }

    public static function showNotifications(){
        $notifications = ModelsNotification::all()->orderby('created_date');

        return $notifications;
    }

}
