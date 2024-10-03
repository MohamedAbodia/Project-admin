<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $settings = Setting::first();
        return view('admin.projects.index', compact('projects', 'settings'));
    }

    public function create()
    {
        $settings = Setting::first();
        return view('admin.projects.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'date' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Project::create([
            'title' => $request->title,
            'image' => $imagePath,
            'content' => $request->content,
            'date' => $request->date,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $settings = Setting::first();
        return view('admin.projects.edit', compact('project', 'settings'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $project->image = $imagePath;
        }

        $project->title = $request->title;
        $project->content = $request->content;
        $project->date = $request->date;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}

