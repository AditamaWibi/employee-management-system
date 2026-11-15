<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $departments = Department::withCount('employees')
        ->orderByDesc('employees_count')
        ->orderBy('name')
        ->get();

        $maxDepartmentCount = max(1, $departments->pluck('employees_count')->max() ?? 0);

        return view('dashboard', [
            'totalEmployees'     => Employee::count(),
            'totalDepartments'   => $departments->count(),
            'totalPositions'     => Position::count(),
            'newHiresThisMonth'  => Employee::whereBetween('hire_date', [
                now()->startOfMonth()->toDateString(),
                now()->endOfMonth()->toDateString(),
            ])->count(),
            'departments'        => $departments,
            'maxDepartmentCount' => $maxDepartmentCount,
            'recentHires'        => Employee::with(['department', 'position'])
                ->orderByDesc('hire_date')
                ->orderByDesc('id')
                ->limit(5)
                ->get(),
        ]);
    }
}
