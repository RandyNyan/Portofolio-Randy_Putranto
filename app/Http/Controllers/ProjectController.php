<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::all();

        if ($request->has('category') && $request->category !== 'All') {
            $query = $query->filter(function ($project) use ($request) {
                return $project['category'] === $request->category;
            });
        }

        if ($request->has('search') && $request->search !== '') {
            $searchTerm = strtolower($request->search);
            $query = $query->filter(function ($project) use ($searchTerm) {
                return str_contains(strtolower($project['title']), $searchTerm) || 
                       collect($project['tech_stack'])->map(fn($t) => strtolower($t))->contains(fn($t) => str_contains($t, $searchTerm));
            });
        }

        $projects = $query->values();
        $categories = Project::categories();
        $currentCategory = $request->query('category', 'All');

        return view('projects.index', compact('projects', 'categories', 'currentCategory'));
    }

    public function show($slug)
    {
        $project = Project::find($slug);

        if (!$project) {
            abort(404);
        }

        $otherProjects = Project::all()->where('slug', '!=', $slug)->take(3)->values();

        return view('projects.show', compact('project', 'otherProjects'));
    }
}
