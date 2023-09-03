<?php

namespace App\Http\Controllers\Backoffice;

use App\Contracts\DetailReportContract;
use App\Contracts\FloodContract;
use App\Contracts\ReportContract;
use App\Contracts\ReporterContract;
use App\Contracts\ReportPhotoContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReporterRequest;
use App\Http\Requests\ReportRequest;
use App\Repositories\DetailReportRepository;
use App\Repositories\FloodRepository;
use App\Repositories\ReporterRepository;
use App\Repositories\ReportPhotoRepository;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    private ReportContract $reportRepo;
    private ReporterContract $reporterRepo;
    private FloodContract $floodRepo;
    private DetailReportContract $detailRepo;
    private ReportPhotoContract $reportPhotoRepo;
    public function __construct()
    {
        $this->reportRepo = new ReportRepository;
        $this->floodRepo = new FloodRepository;
        $this->reporterRepo = new ReporterRepository;
        $this->detailRepo = new DetailReportRepository;
        $this->reportPhotoRepo = new ReportPhotoRepository;
    }

    public function getView()
    {
        return view('Backoffice.ReportImage');
    }

    public function detailView($id)
    {
        $reporter = $this->reportRepo->getPayloadById($id);
        $data = [
            'report' => $this->reportRepo->getPayloadById($id),
            'detail' => $this->detailRepo->getPayloadByReportId($id),
            'photo' => $this->reportPhotoRepo->getPayloadByReportId($id),
        ]; 
        return view('Backoffice.DetailReportImage')->with('data', $data);
    }
    public function add()
    {
        $data =[
            'flood' => $this->floodRepo->getAllPayload([]),
            'reporter' => $this->reporterRepo->getAllPayload([]),
        ] ;
        return view('Backoffice.AddReport')->with('data', $data);
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
            'report_number' =>  'LPR-'.random_int(100000, 999999),
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
            Alert::success('Berhasil', 'Berhasil Membuat Laporan');
            return back();
        }
        
    }

    public function deleteData(int $id)
    {
        $result = $this->reportRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
