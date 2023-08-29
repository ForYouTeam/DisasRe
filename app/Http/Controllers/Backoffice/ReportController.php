<?php

namespace App\Http\Controllers\Backoffice;

use App\Contracts\FloodContract;
use App\Contracts\ReportContract;
use App\Contracts\ReporterContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReporterRequest;
use App\Http\Requests\ReportRequest;
use App\Repositories\FloodRepository;
use App\Repositories\ReporterRepository;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private ReportContract $reportRepo;
    private ReporterContract $reporterRepo;
    private FloodContract $floodRepo;
    public function __construct()
    {
        $this->reportRepo = new ReportRepository;
        $this->floodRepo = new FloodRepository;
        $this->reporterRepo = new ReporterRepository;
    }

    public function getView()
    {
        $data =[
            'flood' => $this->floodRepo->getAllPayload([]),
            'reporter' => $this->reporterRepo->getAllPayload([]),
        ] ;
        return view('Backoffice.ReportImage')->with('data', $data);
    }

    public function getAllData()
    {
        $result = $this->reportRepo->getAllPayload([]);

        return response()->json($result, $result['code']);
    }

    public function dddata(Request $request)
    {
        $dataCollReportPhoto = [];
        if ($image = $request->file('upload_file')) {
            foreach ($image as $key) {
                $destinationPath = public_path('images/');
                $profileImage = random_int(100000, 999999)."-".date('YmdHis') . "." . $key->getClientOriginalExtension();
        
                try {
                    $key->move($destinationPath, $profileImage);
                    $dataCollReportPhoto[] = ['path' => $profileImage];
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['upload_error' => 'File upload failed']);
                }
            }
        }
    }

    public function getDataById(int $id)
    {
        $result = $this->reportRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function upsertData(ReportRequest $request)
    {
        $data_report = [
            'reporter_id' => $request->reporter_id,
            'report_number' => random_int(100000, 999999),
        ];
        $data_report_detail = [
            'flood_id' => $request->flood_id,
            'level' => $request->level,
            'priority' => $request->priority,
            'desc' => $request->desc,
            'location' => $request->location,
            'longtitude' => $request->longtitude,
            'latitude' => $request->latitude,
        ];
        $dataCollReportPhoto = [];
        if ($image = $request->file('image')) {
            foreach ($image as $key) {
                $destinationPath = public_path('images/');
                $profileImage = random_int(100000, 999999)."-".date('YmdHis') . "." . $key->getClientOriginalExtension();
        
                try {
                    $key->move($destinationPath, $profileImage);
                    $dataCollReportPhoto[] = ['path' => $profileImage];
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['upload_error' => 'File upload failed']);
                }
            }
        }
        $id = $request->id | null;
        $result = $this->reportRepo->upsertPayload($id, $data_report, $data_report_detail, $dataCollReportPhoto );
        if ($result) {
            dd('asw');
        }
        
    }

    public function deleteData(int $id)
    {
        $result = $this->reportRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
