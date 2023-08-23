<?php

namespace App\Http\Controllers\Backoffice;

use App\Contracts\FloodContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\FloodRequest;
use App\Repositories\FloodRepository;
use Illuminate\Http\Request;

class FloodController extends Controller
{
    private FloodContract $floodRepo;
    public function __construct()
    {
        $this->floodRepo = new FloodRepository;
    }

    public function getView()
    {
        $data = $this->floodRepo->getAllPayload([]);
        return view('Backoffice.Flood')->with('data', $data);
    }

    public function getAllData()
    {
        $result = $this->floodRepo->getAllPayload([]);

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id)
    {
        $result = $this->floodRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function upsertData(FloodRequest $request)
    {
        $id = $request->id | null;
        $result = $this->floodRepo->upsertPayload($id, $request->all());

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id)
    {
        $result = $this->floodRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
