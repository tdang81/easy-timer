<?php

namespace App\Http\Controllers;

use App\Tracking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class TrackingsController
 * @package App\Http\Controllers
 */
class TrackingsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function index()
    {
        return response(Tracking::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function create(Request $request)
    {
        $project = new Tracking();
        $project->name = $request->name;
        $project->project_id = $request->project_id;
        $project->save();

        return response($project->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(Request $request, $id)
    {
        $tracking       = Tracking::findOrFail($id);
        $tracking->name = $request->name;
        $tracking->save();

        return response(null, Response::HTTP_OK);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function delete($id)
    {
        Tracking::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
