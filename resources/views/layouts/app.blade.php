<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Randy Putranto | Portfolio</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (CDN for simplicity as requested, but in a real Laravel app we'd use Vite) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        navy: {
                            800: '#111827',
                            900: '#0B0F19',
                            950: '#06090f',
                        },
                        neon: {
                            blue: '#3b82f6',
                            indigo: '#6366f1',
                            purple: '#8b5cf6',
                        }
                    },
                    animation: {
                        'gradient-x': 'gradient-x 15s ease infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        'gradient-x': {
                            '0%, 100%': {
                                'background-size': '200% 200%',
                                'background-position': 'left center'
                            },
                            '50%': {
                                'background-size': '200% 200%',
                                'background-position': 'right center'
                            },
                        },
                        'float': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Phosphor Icons for modern look -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style>
        body {
            background-color: #0B0F19;
            color: #f3f4f6;
        }
        
        .glass-card {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(30, 41, 59, 0.8);
        }
        
        .glow-text {
            text-shadow: 0 0 20px rgba(99, 102, 241, 0.5);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0B0F19;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }
        
        .gradient-text {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(to right, #6366f1, #a855f7, #3b82f6);
        }
    </style>
</head>
<body class="antialiased selection:bg-neon-indigo selection:text-white" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
    
    <!-- Background Elements -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-neon-indigo/10 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-neon-purple/10 blur-[120px]"></div>
        <div class="absolute top-[40%] left-[60%] w-[30%] h-[30%] rounded-full bg-neon-blue/5 blur-[100px]"></div>
    </div>

    <!-- Navbar -->
    <nav :class="{ 'glass-card shadow-lg py-3': scrolled, 'py-6': !scrolled }" class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-6 flex justify-between items-center">
            <a href="#" class="font-mono text-xl font-bold tracking-tighter hover:text-neon-indigo transition-colors duration-300">
                <span class="text-neon-blue">&lt;</span>Randy.P<span class="text-neon-purple">/&gt;</span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center text-sm font-medium text-slate-300">
                <a href="{{ url('/') }}#home" class="hover:text-white hover:glow-text transition-all {{ request()->routeIs('home') ? 'text-white glow-text' : '' }}">Home</a>
                <a href="{{ route('projects.index') }}" class="hover:text-white hover:glow-text transition-all {{ request()->routeIs('projects.*') ? 'text-white glow-text' : '' }}">Projects</a>
                <a href="{{ url('/') }}#about" class="hover:text-white hover:glow-text transition-all">About</a>
                <a href="{{ url('/') }}#experience" class="hover:text-white hover:glow-text transition-all">Experience</a>
                <a href="{{ url('/') }}#skills" class="hover:text-white hover:glow-text transition-all">Skills</a>
                <a href="{{ url('/') }}#contact" class="hover:text-white hover:glow-text transition-all">Contact</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center" x-data="{ mobileMenuOpen: false }">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-300 hover:text-white focus:outline-none">
                    <i class="ph ph-list text-2xl" x-show="!mobileMenuOpen"></i>
                    <i class="ph ph-x text-2xl" x-show="mobileMenuOpen" style="display: none;"></i>
                </button>
                
                <!-- Mobile Dropdown -->
                <div x-show="mobileMenuOpen" x-transition class="absolute top-full left-0 w-full mt-2 glass-card rounded-2xl p-4 flex flex-col space-y-4 shadow-xl border-slate-700/50" @click.away="mobileMenuOpen = false" style="display: none;">
                    <a href="{{ url('/') }}#home" @click="mobileMenuOpen = false" class="text-slate-300 hover:text-white font-medium p-2 hover:bg-slate-800/50 rounded-lg {{ request()->routeIs('home') ? 'bg-slate-800/50 text-white' : '' }}">Home</a>
                    <a href="{{ route('projects.index') }}" @click="mobileMenuOpen = false" class="text-slate-300 hover:text-white font-medium p-2 hover:bg-slate-800/50 rounded-lg {{ request()->routeIs('projects.*') ? 'bg-slate-800/50 text-white' : '' }}">Projects</a>
                    <a href="{{ url('/') }}#about" @click="mobileMenuOpen = false" class="text-slate-300 hover:text-white font-medium p-2 hover:bg-slate-800/50 rounded-lg">About & Education</a>
                    <a href="{{ url('/') }}#experience" @click="mobileMenuOpen = false" class="text-slate-300 hover:text-white font-medium p-2 hover:bg-slate-800/50 rounded-lg">Experience</a>
                    <a href="{{ url('/') }}#skills" @click="mobileMenuOpen = false" class="text-slate-300 hover:text-white font-medium p-2 hover:bg-slate-800/50 rounded-lg">Skills</a>
                    <a href="{{ url('/') }}#contact" @click="mobileMenuOpen = false" class="text-slate-300 hover:text-white font-medium p-2 hover:bg-slate-800/50 rounded-lg">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="glass-card mt-24 py-10 border-t border-slate-800/80">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex flex-col items-center md:items-start gap-2">
                <a href="#" class="font-mono text-xl font-bold tracking-tighter">
                    <span class="text-neon-blue">&lt;</span>Randy.P<span class="text-neon-purple">/&gt;</span>
                </a>
                <p class="text-slate-400 text-sm text-center md:text-left max-w-sm">
                    {{ $profile['tagline'] ?? 'Bridging System Analysis, Software Engineering, and Structured Administration.' }}
                </p>
            </div>
            
            <div class="flex flex-col items-center md:items-end gap-4">
                <div class="flex space-x-5">
                    <a href="mailto:{{ $profile['email'] }}" class="text-slate-400 hover:text-neon-blue transition-colors text-2xl" aria-label="Email">
                        <i class="ph ph-envelope-simple"></i>
                    </a>
                    <a href="{{ $profile['linkedin_url'] }}" target="_blank" class="text-slate-400 hover:text-neon-indigo transition-colors text-2xl" aria-label="LinkedIn">
                        <i class="ph ph-linkedin-logo"></i>
                    </a>
                    <a href="https://wa.me/6281818888562" target="_blank" class="text-slate-400 hover:text-neon-purple transition-colors text-2xl" aria-label="WhatsApp">
                        <i class="ph ph-whatsapp-logo"></i>
                    </a>
                </div>
                <p class="text-slate-500 text-xs">
                    &copy; {{ date('Y') }} Randy Putranto. Made with <span class="text-red-500">♥</span> using Laravel & Tailwind.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
