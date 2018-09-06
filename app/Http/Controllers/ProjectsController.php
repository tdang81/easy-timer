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
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function delete($id)
    {
        Project::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
