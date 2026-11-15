<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EmployeeNumbergenerator {
    public function generate(Carbon|string $hireDate): string {
        $period = Carbon::parse($hireDate)->format('ym');

        $sequence = DB::transaction(function () use ($period) {
            DB::table('employee_counters')->insertOrIgnore([
                'period' => $period,
                'last_sequence' => 0
            ]);

            $counter = DB::table('employee_counters')->where('period', $period)->lockForUpdate()->first();

            $next = $counter->last_sequence + 1;

            DB::table('employee_counters')->where('period',$period)->update(['last_sequence' => $next]);

            return $next;
        });

        return sprintf('%s-%04d',$period,$sequence);
    }
}