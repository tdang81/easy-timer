<?php

namespace App\Http\Controllers;

use App\Tracking;
use Carbon\Carbon;
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
        $tracking = new Tracking();
        $tracking->name = $request->name;
        $tracking->project_id = $request->project_id;
        $tracking->start_datetime = Carbon::now();
        $tracking->save();

        return response(Tracking::findOrFail($tracking->id)->jsonSerialize(), Response::HTTP_CREATED);
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
        if (!empty($request->name)) {
            $tracking->name = $request->name;
        }
        if (!empty($request->project_id)) {
            $tracking->project_id = $request->project_id;
        }
        if ($request->stop === true) {
            $tracking->end_datetime = Carbon::now();
        }
        $tracking->save();

        return response(Tracking::findOrFail($tracking->id)->jsonSerialize(), Response::HTTP_OK);
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
