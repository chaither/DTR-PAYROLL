<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PayrollRun;
use App\Models\PayrollItem;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function index()
    {
        // For demo purposes we compute simple payroll numbers based on users count
        $employees = User::all();

        $employeeList = $employees->map(function($u) {
            // simple mock values
            return [
                'name' => $u->name,
                'position' => 'Employee',
                'gross_pay' => 5000 + (strlen($u->email) % 5) * 500,
                'deductions' => 500,
            ];
        })->toArray();

        $grossTotal = array_sum(array_column($employeeList, 'gross_pay'));
        $deductionsTotal = array_sum(array_column($employeeList, 'deductions'));
        $netTotal = $grossTotal - $deductionsTotal;

        return view('payroll', [
            'employeeList' => $employeeList,
            'grossTotal' => number_format($grossTotal, 0),
            'deductionsTotal' => number_format($deductionsTotal, 0),
            'netTotal' => number_format($netTotal, 0),
        ]);
    }

    public function process()
    {
        $employees = User::all();

        DB::beginTransaction();
        try {
            $items = [];
            $grossTotal = 0;
            $deductionsTotal = 0;

            $run = PayrollRun::create([
                'period' => now()->startOfMonth()->toDateString(),
                'gross_total' => 0,
                'deductions_total' => 0,
                'net_total' => 0,
            ]);

            foreach ($employees as $u) {
                $gross = 5000 + (strlen($u->email) % 5) * 500;
                $ded = 500;
                $net = $gross - $ded;

                PayrollItem::create([
                    'payroll_run_id' => $run->id,
                    'user_id' => $u->id,
                    'gross_pay' => $gross,
                    'deductions' => $ded,
                    'net_pay' => $net,
                    'status' => 'paid',
                ]);

                $grossTotal += $gross;
                $deductionsTotal += $ded;
            }

            $run->update([
                'gross_total' => $grossTotal,
                'deductions_total' => $deductionsTotal,
                'net_total' => $grossTotal - $deductionsTotal,
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to process payroll: ' . $e->getMessage()]);
        }

        return redirect()->route('payroll.index')->with('status', 'Payroll processed successfully.');
    }
}
