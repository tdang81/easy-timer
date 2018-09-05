<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ProjectsController
 * @package App\Http\Controllers
 */
class ProjectsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function index()
    {
        return response(Project::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param string $name
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function create(Request $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->user_id = $request->user_id;
        $project->save();

        return response($project->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        echo 'update';
    }

    /**
     * @param Request $request
     */
    public function delete(Request $request)
    {
        echo 'delete';
    }

    /**
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        echo 'destroy';
    }
}
