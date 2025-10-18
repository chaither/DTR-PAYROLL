<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payroll - HRIS</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background: #f7fafc; }
        .card { background: white; border-radius: 8px; box-shadow: 0 6px 18px rgba(0,0,0,0.06); }
    </style>
</head>
<body class="min-h-screen p-8">
    <div class="max-w-6xl mx-auto">
            <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Run Payroll - {{ date('F Y') }}</h1>
            <div class="space-x-2">
                @if(session('status'))
                    <span class="text-green-600 font-medium mr-4">{{ session('status') }}</span>
                @endif
                <form method="POST" action="{{ route('payroll.process') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-hris-teal text-white rounded">Process Payroll</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="card p-6">
                <p class="text-sm text-gray-500">Gross Pay</p>
                <p class="text-xl font-bold">${{ $grossTotal }}</p>
            </div>
            <div class="card p-6">
                <p class="text-sm text-gray-500">Taxes & Deductions</p>
                <p class="text-xl font-bold">${{ $deductionsTotal }}</p>
            </div>
            <div class="card p-6">
                <p class="text-sm text-gray-500">Net</p>
                <p class="text-xl font-bold">${{ $netTotal }}</p>
            </div>
        </div>

        <div class="card overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-semibold mb-4">Employee Payroll List</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-sm text-gray-500 border-b">
                                <th class="py-3">Employee Name</th>
                                <th class="py-3">Position</th>
                                <th class="py-3">Gross Pay</th>
                                <th class="py-3">Deductions</th>
                                <th class="py-3">Net Pay</th>
                                <th class="py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employeeList as $emp)
                                <tr class="border-b">
                                    <td class="py-4">{{ $emp['name'] }}</td>
                                    <td class="py-4">{{ $emp['position'] }}</td>
                                    <td class="py-4">${{ number_format($emp['gross_pay'], 0) }}</td>
                                    <td class="py-4">${{ number_format($emp['deductions'], 0) }}</td>
                                    <td class="py-4">${{ number_format($emp['gross_pay'] - $emp['deductions'], 0) }}</td>
                                    <td class="py-4 text-green-600 font-medium">Paid</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
