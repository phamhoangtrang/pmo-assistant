<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\ProjectService;
use App\Http\Requests\CreateProjectRequest;

class ProjectController extends Controller
{
    protected $projectService;

    // Tiêm ProjectService vào controller thông qua constructor
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::withTrashed()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $listProjectManager  = User::role('pm')->get();
        $projectStatuses = Constant::where('group', 'project_status')->get();
        return view('projects.create', compact('listProjectManager', 'projectStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        // Dữ liệu đã được validate
        $newProjectInfo = $request->validated();

        $createNewProject = $this->projectService->createProject($newProjectInfo);

        if ($createNewProject) {
            return redirect()->route('projects.index')
                ->with('success', 'Project created successfully.');
        }

        return 500;
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Xóa project bằng projectService
        $result = $this->projectService->deleteprojectById($id);
        
        if ($result) {
            return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
        }

        return redirect()->route('projects.index')->with('error', 'Failed to delete project.');
    }

    /**
     * Restore the specified project from soft deletes.
     */
    public function restore(string $id)
    {
        // Khôi phục project bằng projectService
        $result = $this->projectService->restoreProjectById($id);

        if ($result) {
            return redirect()->route('projects.index')->with('success', 'Project restored successfully.');
        }

        return redirect()->route('projects.index')->with('error', 'Failed to restore project.');
    }
}
