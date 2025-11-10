<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderby('created_at', 'desc')->get();
        return view('projects.home', ['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'companyName' => 'required',
            'size' => 'nullable',
            'structure' => 'nullable',
            'constructionArea' => 'nullable',
            'location' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10485760',
        ]);

        if($validator->fails()){
            // redirect(route('form page'))
            // withError(var): will display the error
            // withInput(): even if it fails, the input will remain/will not refresh
            return redirect(route('projects.create'))->withErrors($validator)->withInput();
        }

        $project = new Project();
        $project->title = $request->title;
        $project->companyName = $request->companyName;
        $project->size = $request->size;
        $project->structure = $request->structure;
        $project->constructionArea = $request->constructionArea;
        $project->location = $request->location;
        $project->save();

        if($request->hasFile('image')){
            $image = $request->image;

            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/projects'), $imageName);
            $project->image = $imageName;
            $project->save();
        }

        return redirect(route('projects.home'))->with('success','Product Created Successfully');
    }

    public function showAll()
    {
        $projects = Project::orderby('created_at','desc')->get();
        return view('projects.table',['projects'=>$projects]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $project = Project::findOrFail($id);
        return view('projects.edit', ['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        //
        $project = Project::findOrFail($id);
        $oldImage = $project->image;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'companyName' => 'required',
            'size' => 'nullable',
            'structure' => 'nullable',
            'constructionArea' => 'nullable',
            'location' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10485760',
        ]);
        if($validator->fails()){
            // redirect(route('form page'))
            // withError(var): will display the error
            // withInput(): even if it fails, the input will remain/will not refresh
            return redirect(route('projects.edit', $project->id))->withErrors($validator)->withInput();
        }

        $project = new Project();
        $project->title = $request->title;
        $project->companyName = $request->companyName;
        $project->size = $request->size;
        $project->structure = $request->structure;
        $project->constructionArea = $request->constructionArea;
        $project->location = $request->location;
        $project->save();

        if($request->hasFile('image')){
            if($oldImage != null && File::exists(public_path('uploads/projects/'.$oldImage))){
                File::delete(public_path('uploads/projects'.$oldImage));
            }
            $image = $request->image;
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/projects'), $imageName);
            $project->image = $imageName;
            $project->save();
        }

        return redirect(route('projects.table'))->with('success', 'Project updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $project = Project::findOrFail($id);

        if($project->image != null && File::exists(public_path('uploads/projects/'.$project->image))){
            File::delete(public_path('uploads/projects/'.$project->image));
        }

        $project->delete();

        return redirect(route('projects.index'))->with('success', 'project delete successfully');
    }
}
