<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HRIS DTR - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
        
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { font-family: 'Inter', sans-serif; min-height: 100vh; overflow-x: hidden; position: relative; color: #fff; }

            /* background photo (static) */
            .hero-bg { position: fixed; inset: 0; background-image: url('/image/background2.jpg'); background-size: cover; background-position: center; filter: saturate(1.05) brightness(1.02) hue-rotate(-10deg); z-index: -10; }

            .main-container { position: relative; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }

            /* Enhanced transparent container with improved glassmorphism */
            .glowing-border { 
                position: relative; 
                padding: 0; 
                background: transparent; 
                border-radius: 20px;
                backdrop-filter: blur(10px);
            }

            /* Refined corner accents with better positioning */
            .glowing-border .corner { 
                position: absolute; 
                width: 20px; 
                height: 20px; 
                z-index: 4; 
                border-radius: 8px; 
                pointer-events: none; 
                opacity: 0.9;
                transition: all 0.3s ease;
            }
            .glowing-border .corner.tl { 
                top: -8px; 
                left: -8px; 
                background: linear-gradient(135deg, rgba(0,212,170,0.15), transparent); 
                box-shadow: 0 8px 20px rgba(0,0,0,0.4);
            }
            .glowing-border .corner.tr { 
                top: -8px; 
                right: -8px; 
                background: linear-gradient(225deg, rgba(26,95,122,0.12), transparent); 
                box-shadow: 0 8px 20px rgba(0,0,0,0.4);
            }
            .glowing-border .corner.bl { 
                bottom: -8px; 
                left: -8px; 
                background: linear-gradient(45deg, rgba(255,107,53,0.12), transparent); 
                box-shadow: 0 8px 20px rgba(0,0,0,0.4);
            }
            .glowing-border .corner.br { 
                bottom: -8px; 
                right: -8px; 
                background: linear-gradient(315deg, rgba(0,212,170,0.12), transparent); 
                box-shadow: 0 8px 20px rgba(0,0,0,0.4);
            }

            /* Enhanced glassmorphism panel with beautiful glow */
            .glassmorphism-panel { 
                background: rgba(12,18,26,0.08); 
                border-radius: 16px; 
                position: relative; 
                overflow: hidden; 
                z-index: 0;
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255,255,255,0.1);
                box-shadow: 
                    0 8px 32px rgba(0,0,0,0.2),
                    0 0 40px rgba(21, 228, 186, 0.15),
                    0 0 80px rgba(0,212,170,0.08),
                    inset 0 1px 0 rgba(255,255,255,0.1);
                transition: all 0.3s ease;
            }
            
            /* Enhanced glow on hover */
            .glassmorphism-panel:hover {
                box-shadow: 
                    0 12px 40px rgba(0,0,0,0.3),
                    0 0 60px rgba(0,212,170,0.25),
                    0 0 100px rgba(0,212,170,0.12),
                    inset 0 1px 0 rgba(255,255,255,0.15);
                transform: translateY(-2px);
            }

            /* subtle top-edge highlight to give the panel a crisp top sheen */
            .glassmorphism-panel::before {
                content: '';
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                height: 8px;
                border-top-left-radius: 12px;
                border-top-right-radius: 12px;
                background: linear-gradient(90deg, rgba(0,212,170,0.18), rgba(43,91,138,0.12), rgba(255,255,255,0));
                filter: blur(6px);
                opacity: 0.95;
                pointer-events: none;
                transform: translateY(-2px);
                z-index: 3;
            }

            /* keep the delicate inner rim underneath the highlight */
            .glassmorphism-panel::after { content: ''; position: absolute; inset: 0; border-radius: 12px; pointer-events: none; border: 1px solid rgba(255,255,255,0.04); box-shadow: inset 0 0 20px rgba(255,255,255,0.01); z-index: 1; }

            /* Enhanced input fields with better focus states */
            .input-field { 
                background: rgba(0,0,0,0.4); 
                border: 1px solid rgba(255,255,255,0.1); 
                color: #fff; 
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }
            .input-field:focus { 
                background: rgba(0,0,0,0.5); 
                border-color: rgba(0,212,170,0.6); 
                box-shadow: 0 0 20px rgba(0,212,170,0.2);
                outline: none;
                transform: translateY(-1px);
            }
            .input-field::placeholder {
                color: rgba(255,255,255,0.6);
                transition: all 0.3s ease;
            }
            .input-field:focus::placeholder {
                color: rgba(255,255,255,0.4);
            }

            /* Enhanced login button with hover effects */
            .login-button { 
                background: linear-gradient(90deg, rgba(43,91,138,0.95) 0%, rgba(0,212,170,0.95) 100%); 
                border: none; 
                color: #fff;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }
            .login-button::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                transition: left 0.5s;
            }
            .login-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0,212,170,0.3);
            }
            .login-button:hover::before {
                left: 100%;
            }
            .login-button:active {
                transform: translateY(0);
            }

            /* Enhanced labels */
            label { 
                color: rgba(255,255,255,0.9); 
                font-weight: 500;
                transition: all 0.3s ease;
            }

            /* Error message styling */
            .error-message {
                background: rgba(239, 68, 68, 0.1);
                border: 1px solid rgba(239, 68, 68, 0.3);
                color: #fca5a5;
                padding: 12px 16px;
                border-radius: 8px;
                margin-bottom: 16px;
                backdrop-filter: blur(10px);
            }

            /* Loading state */
            .login-button.loading {
                opacity: 0.7;
                cursor: not-allowed;
            }

            /* Checkbox styling */
            .checkbox-custom {
                appearance: none;
                width: 18px;
                height: 18px;
                border: 2px solid rgba(255,255,255,0.3);
                border-radius: 4px;
                background: transparent;
                cursor: pointer;
                transition: all 0.3s ease;
                position: relative;
            }
            .checkbox-custom:hover {
                border-color: rgba(0,212,170,0.6);
            }
            .checkbox-custom:checked {
                background: linear-gradient(135deg, #1a5f7a, #00d4aa);
                border-color: #00d4aa;
            }
            .checkbox-custom:checked::after {
                content: '✓';
                position: absolute;
                color: white;
                font-size: 12px;
                font-weight: bold;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            @media (max-width: 768px) { .main-container { padding: 10px; } .glassmorphism-panel { margin: 0 10px; } }
        </style>
    </head>
<body>
    <div class="hero-bg" aria-hidden="true"></div>

    <div class="main-container">
        <div class="w-full max-w-md mx-auto">
            <div class="glowing-border">
                <span class="corner tl" aria-hidden="true"></span>
                <span class="corner tr" aria-hidden="true"></span>
                <span class="corner bl" aria-hidden="true"></span>
                <span class="corner br" aria-hidden="true"></span>
                <div class="glassmorphism-panel p-8">
                    <div class="text-center mb-6">
                        <h1 class="text-3xl font-bold text-white mb-1">HRIS DTR SYSTEM</h1>
                        <p class="text-white opacity-80 text-sm">DAILY TIME RECORD</p>
                    </div>

                    <form class="space-y-5" method="POST" action="{{ route('login.submit') }}" id="loginForm">
                        @csrf

                        @if ($errors->has('login'))
                            <div class="error-message">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $errors->first('login') }}
                                </div>
                            </div>
                        @endif

                        <div>
                            <label class="block text-sm font-medium mb-2">EMAIL</label>
                            <input type="email" 
                                   name="username" 
                                   class="input-field w-full px-4 py-3 rounded-lg" 
                                   placeholder="Enter your email" 
                                   value="{{ old('username') }}" 
                                   required
                                   autocomplete="email">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">PASSWORD</label>
                            <input type="password" 
                                   name="password" 
                                   class="input-field w-full px-4 py-3 rounded-lg" 
                                   placeholder="Enter your password" 
                                   required
                                   autocomplete="current-password">
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" 
                                       id="remember" 
                                       name="remember" 
                                       class="checkbox-custom mr-2"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="text-sm cursor-pointer">Remember me</label>
                            </div>
                            <a href="#" class="text-sm text-white opacity-80 hover:underline transition-opacity">Forgot Password?</a>
                        </div>

                        <button type="submit" 
                                class="login-button w-full py-3 px-4 rounded-lg font-bold text-lg"
                                id="loginBtn">
                            <span class="login-text">LOGIN</span>
                            <span class="loading-text hidden">LOGGING IN...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Enhanced entrance animation
        window.addEventListener('load', function() {
            const panel = document.querySelector('.glassmorphism-panel');
            if (!panel) return;
            
            panel.style.opacity = '0';
            panel.style.transform = 'translateY(30px) scale(0.95)';
            
            setTimeout(() => { 
                panel.style.transition = 'all 0.8s cubic-bezier(0.2, 0.9, 0.2, 1)'; 
                panel.style.opacity = '1'; 
                panel.style.transform = 'translateY(0) scale(1)'; 
            }, 100);
        });

        // Enhanced form handling with loading states
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('loginBtn');
            const loginText = submitBtn.querySelector('.login-text');
            const loadingText = submitBtn.querySelector('.loading-text');
            
            // Add loading state
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            loginText.classList.add('hidden');
            loadingText.classList.remove('hidden');
            
            // Reset after 3 seconds if no response (fallback)
            setTimeout(() => {
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
                loginText.classList.remove('hidden');
                loadingText.classList.add('hidden');
            }, 3000);
        });

        // Enhanced input focus effects
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Smooth corner accent animations on hover
        const corners = document.querySelectorAll('.corner');
        const panel = document.querySelector('.glassmorphism-panel');
        
        panel.addEventListener('mouseenter', function() {
            corners.forEach(corner => {
                corner.style.transform = 'scale(1.1)';
                corner.style.opacity = '1';
            });
        });
        
        panel.addEventListener('mouseleave', function() {
            corners.forEach(corner => {
                corner.style.transform = 'scale(1)';
                corner.style.opacity = '0.9';
            });
        });
    </script>
</body>
</html>