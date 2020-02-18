<?php


namespace App\Repositories;


use App\Club;
use App\League;
use Illuminate\Http\Request;

class ClubRepository
{
    private $model;

    public function __construct(Club $club)
    {
        $this->model = $club;
    }

    public function index()
    {
        return $this->model->all();

    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function show($id)
    {
        return $this->model->where('id', '=', $id)->first();
    }

    public function update(array $data, $id)
    {
        $modelToUpdate = $this->model->where('id', $id)->firstOrFail();
        $modelToUpdate->update($data);
        return $modelToUpdate;
    }

    public function destroy($id)
    {
        $modelToDelete = $this->model->where('id', $id)->firstOrFail();
        return $modelToDelete->delete();
    }

}
