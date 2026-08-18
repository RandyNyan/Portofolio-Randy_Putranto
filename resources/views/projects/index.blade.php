@extends('layouts.app')

@section('content')

<!-- BREADCRUMBS & HEADER -->
<section class="pt-32 pb-12 px-6 relative">
    <div class="max-w-6xl mx-auto relative z-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div>
                <nav class="flex text-sm text-slate-500 mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-2">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-neon-blue transition-colors flex items-center gap-1">
                                <i class="ph-duotone ph-house"></i> Home
                            </a>
                        </li>
                        <li>
                            <span class="mx-1">/</span>
                        </li>
                        <li aria-current="page" class="text-slate-300 font-medium">Projects</li>
                    </ol>
                </nav>
                <h1 class="text-4xl md:text-5xl font-bold tracking-tight">Project <span class="gradient-text">Archive</span></h1>
                <p class="text-slate-400 mt-4 max-w-2xl">Explore my complete portfolio of works ranging from Web Development to Spatial Analysis.</p>
            </div>
            
            <!-- Search Bar -->
            <form action="{{ route('projects.index') }}" method="GET" class="w-full md:w-auto relative">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search projects or tech..." class="w-full md:w-72 bg-slate-900/50 border border-slate-700/80 rounded-full py-2.5 pl-10 pr-4 text-sm text-white focus:outline-none focus:border-neon-indigo focus:ring-1 focus:ring-neon-indigo transition-all placeholder:text-slate-500">
                <i class="ph ph-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                @if(request('search'))
                    <a href="{{ route('projects.index', ['category' => request('category')]) }}" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-white">
                        <i class="ph ph-x"></i>
                    </a>
                @endif
            </form>
        </div>

        <!-- Filter Tabs -->
        <div class="flex flex-wrap gap-2 mb-10 pb-4 border-b border-slate-800/80 overflow-x-auto hide-scrollbar">
            <a href="{{ route('projects.index', ['search' => request('search')]) }}" class="whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-all {{ $currentCategory === 'All' ? 'bg-neon-indigo text-white shadow-[0_0_15px_rgba(99,102,241,0.3)]' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
                All Projects
            </a>
            @foreach($categories as $category)
            <a href="{{ route('projects.index', ['category' => $category, 'search' => request('search')]) }}" class="whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium transition-all {{ $currentCategory === $category ? 'bg-neon-indigo text-white shadow-[0_0_15px_rgba(99,102,241,0.3)]' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
                {{ $category }}
            </a>
            @endforeach
        </div>

        <!-- Projects Grid -->
        @if($projects->isEmpty())
        <div class="glass-card rounded-3xl p-16 text-center">
            <i class="ph-duotone ph-file-dashed text-6xl text-slate-600 mb-4"></i>
            <h3 class="text-xl font-bold text-white mb-2">No projects found</h3>
            <p class="text-slate-400">Try adjusting your search or filter criteria.</p>
            <a href="{{ route('projects.index') }}" class="inline-block mt-6 px-6 py-2 rounded-xl border border-slate-700 text-sm font-medium hover:bg-slate-800 transition-colors">Clear Filters</a>
        </div>
        @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
            <div class="glass-card rounded-3xl overflow-hidden group hover:-translate-y-1 transition-all duration-300 hover:shadow-[0_10px_30px_rgba(99,102,241,0.1)] border-slate-700/50 hover:border-neon-indigo/50 flex flex-col h-full relative">
                @if($project['featured'])
                <div class="absolute top-4 left-4 z-20 flex h-3 w-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-neon-indigo opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-neon-indigo"></span>
                </div>
                @endif
                
                <!-- Project Image/Icon -->
                <a href="{{ route('projects.show', $project['slug']) }}" class="h-48 w-full bg-slate-900/80 relative flex items-center justify-center overflow-hidden block">
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 to-slate-900 group-hover:scale-105 transition-transform duration-500"></div>
                    <i class="ph-duotone {{ $project['image'] ?? 'ph-code' }} text-6xl text-slate-700 group-hover:text-neon-blue transition-colors relative z-10"></i>
                </a>
                
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-2">
                        <div class="text-[10px] font-bold text-neon-indigo uppercase tracking-wider">{{ $project['category'] }}</div>
                        <span class="text-[10px] font-mono text-slate-500">{{ $project['completed_at'] }}</span>
                    </div>
                    
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-neon-blue transition-colors leading-tight line-clamp-2">
                        <a href="{{ route('projects.show', $project['slug']) }}" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            {{ $project['title'] }}
                        </a>
                    </h3>
                    
                    <p class="text-slate-400 text-sm mb-6 flex-1 line-clamp-3">
                        {{ $project['summary'] }}
                    </p>
                    
                    <div class="flex flex-wrap gap-2 mt-auto pt-4 border-t border-slate-800/80 relative z-20">
                        @foreach(array_slice($project['tech_stack'], 0, 3) as $tech)
                            <span class="px-2 py-1 rounded-md bg-slate-800/80 text-[10px] font-mono text-slate-300">{{ $tech }}</span>
                        @endforeach
                        @if(count($project['tech_stack']) > 3)
                            <span class="px-2 py-1 rounded-md bg-slate-800/80 text-[10px] font-mono text-slate-400">+{{ count($project['tech_stack']) - 3 }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@endsection
