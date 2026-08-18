@extends('layouts.app')

@section('content')

<!-- PROJECT HEADER -->
<section class="pt-32 pb-12 px-6 relative border-b border-slate-800/80">
    <div class="absolute inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-0 right-0 w-[50%] h-[100%] bg-neon-indigo/5 blur-[120px]"></div>
    </div>

    <div class="max-w-5xl mx-auto relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-slate-500 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li>
                    <a href="{{ route('home') }}" class="hover:text-neon-blue transition-colors flex items-center gap-1">
                        <i class="ph-duotone ph-house"></i> Home
                    </a>
                </li>
                <li><span class="mx-1">/</span></li>
                <li>
                    <a href="{{ route('projects.index') }}" class="hover:text-neon-blue transition-colors">
                        Projects
                    </a>
                </li>
                <li><span class="mx-1">/</span></li>
                <li aria-current="page" class="text-slate-300 font-medium truncate max-w-[200px] md:max-w-none">{{ $project['title'] }}</li>
            </ol>
        </nav>

        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Project Title & Description -->
            <div class="lg:col-span-2">
                <div class="flex flex-wrap items-center gap-3 mb-4">
                    <span class="px-3 py-1 rounded-full bg-neon-indigo/10 border border-neon-indigo/30 text-neon-indigo text-xs font-bold uppercase tracking-wider">
                        {{ $project['category'] }}
                    </span>
                    @if($project['featured'])
                    <span class="px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-500 text-xs font-bold uppercase tracking-wider flex items-center gap-1">
                        <i class="ph-fill ph-star"></i> Featured
                    </span>
                    @endif
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold tracking-tight mb-6 leading-tight">{{ $project['title'] }}</h1>
                
                <p class="text-xl text-slate-300 leading-relaxed mb-8">
                    {{ $project['summary'] }}
                </p>
                
                <!-- Main Image/Mockup Placeholder -->
                <div class="w-full aspect-video rounded-2xl glass-card overflow-hidden relative flex items-center justify-center bg-slate-900 shadow-2xl border-slate-700/80 mb-12">
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 to-slate-900"></div>
                    <i class="ph-duotone {{ $project['image'] ?? 'ph-image' }} text-9xl text-slate-700 relative z-10 opacity-50"></i>
                    <!-- Stylized reflection/glow -->
                    <div class="absolute -bottom-10 left-1/2 -translate-x-1/2 w-3/4 h-20 bg-neon-blue/20 blur-[50px] rounded-full"></div>
                </div>

                <!-- Deep Dive Content -->
                <div class="prose prose-invert prose-slate max-w-none prose-headings:font-bold prose-a:text-neon-blue hover:prose-a:text-neon-indigo prose-img:rounded-xl">
                    <h2 class="text-2xl font-bold mb-4 text-white">Project Overview</h2>
                    <p class="text-slate-400 leading-relaxed mb-8">
                        {{ $project['description'] }}
                    </p>
                    
                    <h3 class="text-xl font-bold mb-4 text-white">Architecture & Key Features</h3>
                    <ul class="space-y-2 text-slate-400 mb-8 list-none pl-0">
                        <li class="flex items-start gap-3">
                            <i class="ph-fill ph-check-circle text-neon-blue mt-1 text-lg"></i>
                            <span>Modular and scalable architecture designed for future expansion.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ph-fill ph-check-circle text-neon-blue mt-1 text-lg"></i>
                            <span>Secure authentication and role-based access control.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ph-fill ph-check-circle text-neon-blue mt-1 text-lg"></i>
                            <span>Optimized database schemas for fast query performance.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar Metadata -->
            <div class="lg:col-span-1">
                <div class="glass-card rounded-3xl p-8 sticky top-32">
                    <h3 class="text-lg font-bold mb-6 text-white border-b border-slate-800 pb-4">Project Details</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <p class="text-xs font-mono text-slate-500 uppercase tracking-wider mb-1">Role</p>
                            <p class="font-medium text-slate-200">{{ $project['role'] }}</p>
                        </div>
                        
                        <div>
                            <p class="text-xs font-mono text-slate-500 uppercase tracking-wider mb-1">Timeline</p>
                            <p class="font-medium text-slate-200">{{ $project['completed_at'] }}</p>
                        </div>
                        
                        <div>
                            <p class="text-xs font-mono text-slate-500 uppercase tracking-wider mb-3">Tech Stack</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach($project['tech_stack'] as $tech)
                                    <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 text-xs font-mono text-slate-300 border border-slate-700/50">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-slate-800 space-y-3">
                        @if($project['demo_link'])
                        <a href="{{ $project['demo_link'] }}" target="_blank" class="w-full py-3 rounded-xl bg-gradient-to-r from-neon-indigo to-neon-purple text-white font-semibold text-sm flex justify-center items-center gap-2 hover:shadow-[0_0_15px_rgba(99,102,241,0.5)] transition-all transform hover:-translate-y-0.5">
                            <i class="ph-bold ph-arrow-square-out text-lg"></i>
                            Live Preview
                        </a>
                        @endif
                        
                        @if($project['github_link'])
                        <a href="{{ $project['github_link'] }}" target="_blank" class="w-full py-3 rounded-xl glass-card text-white font-semibold text-sm flex justify-center items-center gap-2 hover:bg-slate-800/80 transition-all border border-slate-700/80 hover:border-slate-600">
                            <i class="ph-bold ph-github-logo text-lg"></i>
                            View Source
                        </a>
                        @endif
                        
                        @if(!$project['demo_link'] && !$project['github_link'])
                        <div class="w-full py-3 rounded-xl bg-slate-800/50 text-slate-500 font-semibold text-sm flex justify-center items-center gap-2 border border-slate-700/30 cursor-not-allowed">
                            <i class="ph-bold ph-lock-key text-lg"></i>
                            Confidential / Internal
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OTHER RECENT PROJECTS -->
@if($otherProjects->count() > 0)
<section class="py-20 px-6 relative">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold mb-10">Other <span class="gradient-text">Recent Works</span></h2>
        
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($otherProjects as $other)
            <a href="{{ route('projects.show', $other['slug']) }}" class="glass-card rounded-2xl p-4 group hover:-translate-y-1 transition-all border-slate-700/50 hover:border-neon-indigo/50 flex flex-col h-full">
                <div class="h-32 w-full rounded-xl bg-slate-900/80 relative flex items-center justify-center overflow-hidden mb-4">
                    <i class="ph-duotone {{ $other['image'] ?? 'ph-code' }} text-4xl text-slate-700 group-hover:text-neon-blue transition-colors relative z-10"></i>
                </div>
                <div class="text-[10px] font-bold text-neon-indigo uppercase tracking-wider mb-1">{{ $other['category'] }}</div>
                <h4 class="text-white font-bold text-sm group-hover:text-neon-blue transition-colors line-clamp-2 mb-2">{{ $other['title'] }}</h4>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
