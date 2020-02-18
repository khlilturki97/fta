<?php

namespace App\Http\Controllers;

use App\League;
use App\Repositories\LeagueRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LeagueController extends Controller
{
    private $repository;

    public function __construct(LeagueRepository $leagueRepository)
    {
        $this->repository = $leagueRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            $this->repository->index()
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(
            $this->repository->store($request->all())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(
            $this->repository->show($id)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json(
            $this->repository->update($request->all(), $id)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
            'success' => $this->repository->destroy($id) ? 'yes' : 'no'
        ]);
    }
}
