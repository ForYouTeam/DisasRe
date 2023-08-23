<?php

namespace App\Http\Controllers\Backoffice;

use App\Contracts\ReporterContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReporterRequest;
use App\Models\Reporter;
use App\Repositories\ReporterRepository;
use Illuminate\Http\Request;

class ReporterController extends Controller
{
    private ReporterContract $reporterRepo;
    public function __construct()
    {
        $this->reporterRepo = new ReporterRepository;
    }

    public function getView()
    {
        $data = $this->reporterRepo->getAllPayload([]);
        return view('Backoffice.Reporter')->with('data', $data['data']);
    }

    public function getAllData()
    {
        $result = $this->reporterRepo->getAllPayload([]);

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id)
    {
        $result = $this->reporterRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function upsertData(ReporterRequest $request)
    {
        $id = $request->id | null;
        $result = $this->reporterRepo->upsertPayload($id, $request->all());

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id)
    {
        $result = $this->reporterRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
