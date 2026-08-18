@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section id="home" class="min-h-screen flex items-center justify-center pt-24 pb-12 px-6 relative">
    <div class="max-w-5xl mx-auto w-full grid md:grid-cols-2 gap-12 items-center">
        <div class="flex flex-col space-y-6 order-2 md:order-1 relative z-10">
            <div class="inline-flex items-center space-x-2 glass-card px-4 py-2 rounded-full w-max border-neon-indigo/30">
                <span class="relative flex h-3 w-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
                <span class="text-xs font-medium text-slate-300 uppercase tracking-wider">Available for Projects & Collaboration</span>
            </div>
            
            <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                Hi, I'm <br/>
                <span class="gradient-text glow-text">{{ $profile['name'] }}</span>
            </h1>
            
            <p class="text-lg text-slate-400 leading-relaxed max-w-lg">
                {{ $profile['hero_subtitle'] }}
            </p>
            
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="#experience" class="px-6 py-3 rounded-xl bg-gradient-to-r from-neon-indigo to-neon-purple text-white font-medium hover:shadow-[0_0_20px_rgba(99,102,241,0.5)] transition-all duration-300 flex items-center gap-2 group">
                    View Experience
                    <i class="ph ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="#contact" class="px-6 py-3 rounded-xl glass-card text-slate-200 font-medium hover:bg-slate-800/80 transition-all duration-300 flex items-center gap-2 border border-slate-700/50 hover:border-slate-600">
                    Contact Me
                </a>
            </div>

            <!-- Tech Badges -->
            <div class="pt-8">
                <p class="text-sm text-slate-500 mb-3 font-mono">Tech Stack / Tools</p>
                <div class="flex flex-wrap gap-3">
                    @foreach($tech_badges as $badge)
                        <span class="px-3 py-1.5 rounded-lg glass-card text-xs font-medium text-slate-300 border-slate-700/50 flex items-center gap-2">
                            @if($badge == 'Laravel') <i class="ph-fill ph-fire text-red-500"></i>
                            @elseif($badge == 'PostgreSQL') <i class="ph-fill ph-database text-blue-400"></i>
                            @elseif($badge == 'Python') <i class="ph-fill ph-file-py text-yellow-400"></i>
                            @elseif($badge == 'Figma') <i class="ph-fill ph-figma-logo text-pink-500"></i>
                            @else <i class="ph-fill ph-code text-neon-indigo"></i>
                            @endif
                            {{ $badge }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="order-1 md:order-2 flex justify-center relative animate-float">
            <!-- Profile Image Frame -->
            <div class="relative w-72 h-72 md:w-96 md:h-96">
                <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-neon-blue via-neon-indigo to-neon-purple opacity-20 blur-2xl"></div>
                <div class="absolute inset-2 rounded-full glass-card border border-slate-700/50 overflow-hidden flex items-center justify-center p-2 bg-slate-900/80 z-10">
                    <!-- Placeholder for Image -->
                    <div class="w-full h-full rounded-full bg-slate-800 flex items-center justify-center overflow-hidden relative">
                        <i class="ph-duotone ph-user text-8xl text-slate-600 absolute opacity-50"></i>
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/20 to-purple-500/20 mix-blend-overlay"></div>
                    </div>
                </div>
                
                <!-- Floating Elements -->
                <div class="absolute -top-4 -right-4 glass-card p-4 rounded-2xl z-20 animate-bounce" style="animation-duration: 3s;">
                    <i class="ph-fill ph-brackets-curly text-2xl text-neon-blue"></i>
                </div>
                <div class="absolute -bottom-6 left-8 glass-card p-3 rounded-xl z-20 animate-bounce" style="animation-duration: 4s; animation-delay: 1s;">
                    <i class="ph-fill ph-chart-line-up text-xl text-neon-purple"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS BANNER -->
<section class="max-w-5xl mx-auto px-6 relative z-20 -mt-8 mb-24">
    <div class="glass-card rounded-2xl p-6 md:p-8 grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-0 divide-y md:divide-y-0 md:divide-x divide-slate-800/80">
        @foreach($profile['stats'] as $stat)
        <div class="flex flex-col items-center justify-center text-center p-4">
            <div class="text-3xl md:text-4xl font-bold text-white mb-1 tracking-tight">
                {{ $stat['value'] }} <span class="text-lg text-slate-500 font-normal">{{ $stat['sub'] ?? '' }}</span>
            </div>
            <div class="text-xs md:text-sm text-slate-400 font-medium tracking-wide uppercase">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>
</section>

<!-- ABOUT & EDUCATION (BENTO GRID) -->
<section id="about" class="max-w-5xl mx-auto px-6 py-20">
    <div class="flex items-center space-x-4 mb-10">
        <h2 class="text-3xl font-bold">About <span class="gradient-text">&</span> Education</h2>
        <div class="h-[1px] flex-1 bg-gradient-to-r from-slate-700 to-transparent"></div>
    </div>
    
    <div class="grid md:grid-cols-5 gap-6">
        <!-- About Box -->
        <div class="md:col-span-3 glass-card rounded-3xl p-8 hover:-translate-y-1 transition-transform duration-300 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-32 h-32 bg-neon-blue/10 blur-3xl group-hover:bg-neon-blue/20 transition-all"></div>
            <i class="ph-duotone ph-identification-card text-4xl text-neon-blue mb-6"></i>
            <h3 class="text-2xl font-bold mb-4">Who I Am</h3>
            <p class="text-slate-300 leading-relaxed text-sm md:text-base mb-6">
                {{ $education['bio'] }}
            </p>
            <p class="text-slate-400 leading-relaxed text-sm">
                I specialize in bridging the gap between <strong class="text-white font-medium">System Analysis</strong>, <strong class="text-white font-medium">Software Engineering</strong>, and <strong class="text-white font-medium">Structured Administration</strong>, ensuring that technical solutions are not only robust but also well-documented and efficiently managed.
            </p>
        </div>
        
        <!-- Education Box -->
        <div class="md:col-span-2 glass-card rounded-3xl p-8 hover:-translate-y-1 transition-transform duration-300 relative overflow-hidden group">
            <div class="absolute bottom-0 right-0 w-32 h-32 bg-neon-purple/10 blur-3xl group-hover:bg-neon-purple/20 transition-all"></div>
            <i class="ph-duotone ph-graduation-cap text-4xl text-neon-purple mb-6"></i>
            <h3 class="text-2xl font-bold mb-4">Education</h3>
            
            <div class="space-y-4">
                <div>
                    <h4 class="text-lg font-semibold text-white">{{ $education['degree'] }}</h4>
                    <p class="text-neon-indigo font-medium text-sm">{{ $education['institution'] }}</p>
                </div>
                
                <div class="flex items-center gap-2 text-sm text-slate-400">
                    <i class="ph ph-calendar-blank"></i>
                    {{ $education['period'] }}
                </div>
                
                <div class="flex items-center gap-2 text-sm text-slate-400">
                    <i class="ph ph-exam"></i>
                    GPA: <span class="text-white font-medium">{{ $education['gpa'] }}</span>
                </div>
                
                <div class="mt-4 p-3 rounded-xl bg-slate-800/50 border border-slate-700/50 flex items-start gap-3">
                    <i class="ph-fill ph-medal text-yellow-500 text-xl shrink-0 mt-0.5"></i>
                    <p class="text-xs text-slate-300 leading-snug">{{ $education['honors'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED PROJECTS -->
<section id="projects" class="max-w-6xl mx-auto px-6 py-20 relative">
    <div class="absolute top-0 right-0 w-64 h-64 bg-neon-blue/5 blur-[100px] rounded-full pointer-events-none"></div>
    
    <div class="flex items-center justify-between mb-12 relative z-10">
        <div class="flex items-center space-x-4 flex-1">
            <h2 class="text-3xl font-bold">Featured <span class="gradient-text">Projects</span></h2>
            <div class="h-[1px] flex-1 max-w-sm bg-gradient-to-r from-slate-700 to-transparent hidden md:block"></div>
        </div>
        <a href="{{ route('projects.index') }}" class="text-sm font-medium text-neon-blue hover:text-neon-indigo transition-colors flex items-center gap-1 group">
            View All Projects
            <i class="ph-bold ph-arrow-right group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>

    <div class="grid md:grid-cols-3 gap-8 relative z-10">
        @foreach($featured_projects as $project)
        <div class="glass-card rounded-3xl overflow-hidden group hover:-translate-y-2 transition-all duration-300 hover:shadow-[0_10px_30px_rgba(99,102,241,0.1)] border-slate-700/50 hover:border-neon-indigo/50 flex flex-col h-full">
            <!-- Project Image/Icon Placeholder -->
            <div class="h-48 w-full bg-slate-900/80 relative flex items-center justify-center overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-slate-800 to-slate-900 group-hover:scale-105 transition-transform duration-500"></div>
                <i class="ph-duotone {{ $project['image'] ?? 'ph-code' }} text-6xl text-slate-700 group-hover:text-neon-blue transition-colors relative z-10"></i>
                <div class="absolute top-4 right-4 glass-card px-3 py-1 rounded-full text-xs font-mono text-neon-purple border-neon-purple/30 z-10">
                    {{ $project['completed_at'] }}
                </div>
            </div>
            
            <div class="p-6 flex flex-col flex-1">
                <div class="text-xs font-medium text-neon-indigo mb-2 uppercase tracking-wider">{{ $project['category'] }}</div>
                <h3 class="text-xl font-bold text-white mb-3 group-hover:text-neon-blue transition-colors leading-tight">
                    <a href="{{ route('projects.show', $project['slug']) }}" class="focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        {{ $project['title'] }}
                    </a>
                </h3>
                <p class="text-slate-400 text-sm mb-6 flex-1 line-clamp-3">
                    {{ $project['summary'] }}
                </p>
                
                <div class="flex flex-wrap gap-2 mt-auto pt-4 border-t border-slate-800">
                    @foreach(array_slice($project['tech_stack'], 0, 3) as $tech)
                        <span class="px-2.5 py-1 rounded-md bg-slate-800/80 text-[10px] font-mono text-slate-300">{{ $tech }}</span>
                    @endforeach
                    @if(count($project['tech_stack']) > 3)
                        <span class="px-2.5 py-1 rounded-md bg-slate-800/80 text-[10px] font-mono text-slate-400">+{{ count($project['tech_stack']) - 3 }}</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- EXPERIENCE (TIMELINE) -->
<section id="experience" class="max-w-5xl mx-auto px-6 py-20">
    <div class="flex items-center space-x-4 mb-10">
        <div class="h-[1px] flex-1 bg-gradient-to-l from-slate-700 to-transparent"></div>
        <h2 class="text-3xl font-bold">Work <span class="gradient-text">&</span> Leadership</h2>
        <div class="h-[1px] flex-1 bg-gradient-to-r from-slate-700 to-transparent"></div>
    </div>
    
    <div class="grid md:grid-cols-2 gap-10">
        <!-- Work Experience -->
        <div>
            <h3 class="text-xl font-semibold mb-6 flex items-center gap-3">
                <i class="ph-duotone ph-briefcase text-neon-blue"></i>
                Professional Experience
            </h3>
            <div class="space-y-6 relative before:absolute before:inset-0 before:ml-2.5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-700 before:to-transparent">
                
                @foreach($experience as $exp)
                <div class="relative pl-8 md:pl-0">
                    <div class="md:flex items-center justify-between md:space-x-8">
                        <div class="glass-card p-6 rounded-2xl md:w-full hover:border-neon-blue/50 transition-colors group relative z-10">
                            <!-- Timeline Dot -->
                            <div class="absolute left-[-37px] top-1/2 -translate-y-1/2 md:-left-4 w-3 h-3 bg-neon-blue rounded-full shadow-[0_0_10px_rgba(59,130,246,0.8)] z-20 hidden md:block"></div>
                            
                            <span class="text-xs font-mono text-neon-blue mb-2 block">{{ $exp['period'] }}</span>
                            <h4 class="text-lg font-bold text-white mb-1">{{ $exp['role'] }}</h4>
                            <p class="text-sm font-medium text-slate-400 mb-3">{{ $exp['company'] }}</p>
                            <p class="text-sm text-slate-400 leading-relaxed">
                                {{ $exp['description'] }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        
        <!-- Organization Experience -->
        <div>
            <h3 class="text-xl font-semibold mb-6 flex items-center gap-3">
                <i class="ph-duotone ph-users-three text-neon-purple"></i>
                Organizations & Leadership
            </h3>
            <div class="space-y-4 relative">
                @foreach($organizations as $org)
                <div class="glass-card p-5 rounded-2xl hover:bg-slate-800/80 transition-all border-l-2 border-l-neon-purple/50 hover:border-l-neon-purple hover:translate-x-1">
                    <div class="flex justify-between items-start mb-1">
                        <h4 class="text-base font-bold text-white">{{ $org['role'] }}</h4>
                        <span class="text-xs font-mono text-slate-400 bg-slate-800 px-2 py-1 rounded">{{ $org['period'] }}</span>
                    </div>
                    <p class="text-sm text-slate-400">{{ $org['organization'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- SKILLS (BENTO CARDS) -->
<section id="skills" class="max-w-5xl mx-auto px-6 py-20 relative">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3/4 h-3/4 bg-neon-indigo/5 blur-[120px] rounded-full pointer-events-none"></div>
    
    <div class="flex items-center space-x-4 mb-10 relative z-10">
        <h2 class="text-3xl font-bold">Skills <span class="gradient-text">&</span> Toolkit</h2>
        <div class="h-[1px] flex-1 bg-gradient-to-r from-slate-700 to-transparent"></div>
    </div>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10">
        @php
            $icons = [
                'Software & Dev' => 'ph-terminal-window',
                'System Design & Modeling' => 'ph-graph',
                'Design & Media' => 'ph-palette',
                'Soft Skills' => 'ph-brain'
            ];
            $colors = [
                'Software & Dev' => 'text-neon-blue',
                'System Design & Modeling' => 'text-neon-indigo',
                'Design & Media' => 'text-pink-400',
                'Soft Skills' => 'text-green-400'
            ];
        @endphp

        @foreach($skills as $category => $items)
        <div class="glass-card rounded-3xl p-6 hover:-translate-y-1 transition-transform group">
            <div class="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <i class="ph-duotone {{ $icons[$category] }} text-2xl {{ $colors[$category] }}"></i>
            </div>
            <h3 class="text-lg font-bold mb-4">{{ $category }}</h3>
            <ul class="space-y-3">
                @foreach($items as $item)
                <li class="flex items-center gap-3 text-sm text-slate-300">
                    <i class="ph-fill ph-check-circle {{ $colors[$category] }} opacity-80 text-xs"></i>
                    {{ $item }}
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</section>

<!-- CONTACT SECTION -->
<section id="contact" class="max-w-3xl mx-auto px-6 py-20">
    <div class="glass-card rounded-3xl p-8 md:p-12 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-neon-indigo/10 to-transparent opacity-50"></div>
        
        <div class="relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Let's Work <span class="gradient-text">Together</span></h2>
            <p class="text-slate-400 mb-8 max-w-lg mx-auto">
                Currently open for new opportunities, collaborations, and interesting projects. Feel free to reach out!
            </p>
            
            <form action="#" method="POST" class="space-y-4 max-w-md mx-auto text-left">
                @csrf
                <div>
                    <label for="name" class="block text-xs font-medium text-slate-400 mb-1 ml-1">Name</label>
                    <input type="text" id="name" name="name" class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-neon-indigo focus:ring-1 focus:ring-neon-indigo transition-colors" placeholder="John Doe" required>
                </div>
                <div>
                    <label for="email" class="block text-xs font-medium text-slate-400 mb-1 ml-1">Email</label>
                    <input type="email" id="email" name="email" class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-neon-indigo focus:ring-1 focus:ring-neon-indigo transition-colors" placeholder="john@example.com" required>
                </div>
                <div>
                    <label for="message" class="block text-xs font-medium text-slate-400 mb-1 ml-1">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-neon-indigo focus:ring-1 focus:ring-neon-indigo transition-colors resize-none" placeholder="Your message here..." required></textarea>
                </div>
                <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-neon-indigo to-neon-blue text-white font-semibold shadow-[0_0_15px_rgba(99,102,241,0.3)] hover:shadow-[0_0_25px_rgba(99,102,241,0.5)] transition-all duration-300 transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                    Send Message
                    <i class="ph-bold ph-paper-plane-right"></i>
                </button>
            </form>
            
            <div class="mt-10 flex items-center justify-center gap-4 text-sm text-slate-400">
                <div class="h-px w-12 bg-slate-700"></div>
                <span>Or reach me directly</span>
                <div class="h-px w-12 bg-slate-700"></div>
            </div>
            
            <div class="mt-6 flex justify-center gap-6">
                <a href="mailto:{{ $profile['email'] }}" class="flex items-center gap-2 text-slate-300 hover:text-white transition-colors group">
                    <div class="w-10 h-10 rounded-full glass-card flex items-center justify-center group-hover:bg-slate-800 transition-colors">
                        <i class="ph-fill ph-envelope-simple text-xl text-neon-blue"></i>
                    </div>
                    <span class="text-sm font-medium hidden sm:block">{{ $profile['email'] }}</span>
                </a>
                <a href="https://wa.me/6281818888562" target="_blank" class="flex items-center gap-2 text-slate-300 hover:text-white transition-colors group">
                    <div class="w-10 h-10 rounded-full glass-card flex items-center justify-center group-hover:bg-slate-800 transition-colors">
                        <i class="ph-fill ph-whatsapp-logo text-xl text-green-400"></i>
                    </div>
                    <span class="text-sm font-medium hidden sm:block">{{ $profile['contact'] }}</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
