<?php

namespace App\Http\Controllers\web;

use App\Contracts\DetailReportContract;
use App\Contracts\FloodContract;
use App\Contracts\ReportContract;
use App\Contracts\ReporterContract;
use App\Contracts\ReportPhotoContract;
use App\Http\Controllers\Controller;
use App\Repositories\DetailReportRepository;
use App\Repositories\FloodRepository;
use App\Repositories\ReporterRepository;
use App\Repositories\ReportPhotoRepository;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
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
    public function index()
    {
        $data = $this->floodRepo->getAllPayload([]);
        return view('web.layout.base')->with('data' , $data);
    }

    public function store(Request $request)
    {
        try {
            $id = $request->id | null;
            $data_reporter = [
                'name' => $request->reporter_name,
                'phone' =>  $request->reporter_phone,
                'address' =>  $request->reporter_address,
            ];
            if ($image = $request->file('selfie')) {
                $destinationPath = public_path('reporter/');
                    $reporterImage = random_int(100000, 999999)."-".date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $data_reporter['selfie'] = $reporterImage;
                    try {
                        $image->move($destinationPath, $reporterImage);
                    } catch (\Exception $e) {
                        return redirect()->back()->withErrors(['upload_error' => 'File upload failed']);
                    }
            } else {
                unset($data_reporter['selfie']);
            }
            $result_reporter = $this->reporterRepo->upsertPayload($id, $data_reporter, $reporterImage);
            
            $data_report = [
                'reporter_id' => $result_reporter['data']->id,
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
            $result = $this->reportRepo->upsertPayload($id, $data_report, $data_report_detail, $dataCollReportPhoto );
            if ($result) {
                Alert::success('Berhasil', 'Berhasil Membuat Laporan');
                return back();
            }
        } catch (\Throwable $th) {
            Alert::error('gagal', 'periksa kembali inputan anda');
            return back();
        }

        
        // return view('web.layout.base');
    }
}
