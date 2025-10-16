<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRIS Dashboard</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .hris-teal {
            background-color: #1a5f7a;
        }
        
        .hris-light-teal {
            background-color: #57c3c2;
        }
        
        .hris-text-teal {
            color: #1a5f7a;
        }
        
        .hris-light-text-teal {
            color: #57c3c2;
        }
        
        .metric-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .action-card {
            transition: all 0.3s ease;
        }
        
        .action-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .nav-link {
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: #57c3c2;
        }
        
        .nav-link.active {
            color: #57c3c2;
            border-bottom: 2px solid #57c3c2;
        }
        
        .pattern-bg {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header Bar -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Left side - HRIS Logo -->
                <div class="flex items-center">
                    <div class="flex items-center space-x-2">
                        <!-- Briefcase Icon -->
                        <svg class="w-6 h-6 hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                        </svg>
                        <span class="text-xl font-bold hris-text-teal">HRIS</span>
                    </div>
                </div>
                
                <!-- Navigation Links -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#" class="nav-link text-gray-600 hover:text-hris-text-teal">Dashboard</a>
                    <a href="#" class="nav-link active text-hris-text-teal">Employees</a>
                    <a href="#" class="nav-link text-gray-600 hover:text-hris-text-teal">Attendance</a>
                    <a href="#" class="nav-link text-gray-600 hover:text-hris-text-teal">Reports</a>
                    <a href="#" class="nav-link text-gray-600 hover:text-hris-text-teal">Settings</a>
                </nav>
                
                <!-- Right side - User Profile -->
                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-2">
                        <!-- Profile Avatar -->
                        <div class="w-8 h-8 bg-hris-light-teal rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium">{{ Session::get('user.username', 'Admin') }}</span>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}" class="ml-4">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-red-600 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex min-h-screen">
        <!-- Left Section - Dashboard Content -->
        <div class="hris-teal pattern-bg flex-1 p-8 relative overflow-hidden">
            <!-- Welcome Message -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">Welcome, {{ Session::get('user.name', 'Admin User') }}!</h1>
                <p class="text-xl text-white opacity-90">Your gateway to effortless time management</p>
            </div>
            
            <!-- Key Metrics -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-white mb-6">Key Metrics</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Total Hours Tracked -->
                    <div class="metric-card rounded-xl p-6">
                        <div class="flex items-center space-x-4">
                            <div class="bg-white bg-opacity-20 rounded-full p-3">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12,6 12,12 16,14"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white text-sm opacity-90">Total Hours Tracked</p>
                                <p class="text-2xl font-bold text-white">1,247</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pending Approvals -->
                    <div class="metric-card rounded-xl p-6">
                        <div class="flex items-center space-x-4">
                            <div class="bg-white bg-opacity-20 rounded-full p-3">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white text-sm opacity-90">Pending Approvals</p>
                                <p class="text-2xl font-bold text-white">12</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Active Employees -->
                    <div class="metric-card rounded-xl p-6">
                        <div class="flex items-center space-x-4">
                            <div class="bg-white bg-opacity-20 rounded-full p-3">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white text-sm opacity-90">Active Employees</p>
                                <p class="text-2xl font-bold text-white">156</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Monthly Attendance Overview -->
            <div>
                <h2 class="text-2xl font-semibold text-white mb-6">Monthly Attendance Overview</h2>
                <div class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-sm rounded-xl p-6">
                    <canvas id="attendanceChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Right Section - Sidebar -->
        <div class="bg-gray-50 w-full lg:w-1/3 p-8">
            <!-- Quick Actions -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h3>
                <div class="space-y-4">
                    <!-- Run Payroll -->
                    <div class="action-card bg-white rounded-xl p-4 shadow-sm cursor-pointer">
                        <div class="flex items-center space-x-3">
                            <div class="bg-hris-light-teal bg-opacity-10 rounded-full p-2">
                                <svg class="w-5 h-5 hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Run Payroll</span>
                        </div>
                    </div>
                    
                    <!-- Add New Employee -->
                    <div class="action-card bg-white rounded-xl p-4 shadow-sm cursor-pointer">
                        <div class="flex items-center space-x-3">
                            <div class="bg-hris-light-teal bg-opacity-10 rounded-full p-2">
                                <svg class="w-5 h-5 hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">Add New Employee</span>
                        </div>
                    </div>
                    
                    <!-- View Reports -->
                    <div class="action-card bg-white rounded-xl p-4 shadow-sm cursor-pointer">
                        <div class="flex items-center space-x-3">
                            <div class="bg-hris-light-teal bg-opacity-10 rounded-full p-2">
                                <svg class="w-5 h-5 hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 font-medium">View Reports</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h3>
                <div class="space-y-4">
                    <!-- Add New Employee -->
                    <div class="bg-white rounded-xl p-4 shadow-sm">
                        <div class="flex items-center space-x-3">
                            <div class="bg-hris-light-teal bg-opacity-10 rounded-full p-2">
                                <svg class="w-4 h-4 hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12,6 12,12 16,14"></polyline>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm">Add New Employee</span>
                        </div>
                    </div>
                    
                    <!-- Manage Leave Requests -->
                    <div class="bg-white rounded-xl p-4 shadow-sm">
                        <div class="flex items-center space-x-3">
                            <div class="bg-hris-light-teal bg-opacity-10 rounded-full p-2">
                                <svg class="w-4 h-4 hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm">Manage Leave Requests</span>
                        </div>
                    </div>
                    
                    <!-- John D. Leave Request -->
                    <div class="bg-white rounded-xl p-4 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="bg-hris-light-teal bg-opacity-10 rounded-full p-2">
                                    <svg class="w-4 h-4 hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 text-sm">John D. submitted leave request</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Payroll Processed -->
                    <div class="bg-white rounded-xl p-4 shadow-sm">
                        <div class="flex items-center space-x-3">
                            <div class="bg-hris-light-teal bg-opacity-10 rounded-full p-2">
                                <svg class="w-4 h-4 hris-text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm">Payroll processed for January Department</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Attendance Chart
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        const attendanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                datasets: [{
                    label: 'Hours Tracked',
                    data: [120, 150, 180, 160, 200, 220, 190, 240],
                    borderColor: '#57c3c2',
                    backgroundColor: 'rgba(87, 195, 194, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#57c3c2',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.8)',
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.8)',
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
