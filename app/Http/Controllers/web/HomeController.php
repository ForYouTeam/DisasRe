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
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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

    private function getStringBetween($string, $start, $end) {
        $start_position = strpos($string, $start);
        if ($start_position === false) {
            return false;
        }
        
        $end_position = strpos($string, $end, $start_position + strlen($start));
        if ($end_position === false) {
            return false;
        }
        
        return substr($string, $start_position + strlen($start), $end_position - $start_position - strlen($start));
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
            if ($image = $request->selfie_file) {
                $base64Image = $request->input ( 'selfie_file' ) ;
                $base64_data = explode ( "base64," , $base64Image)[1];
                $extension   = $this ->getStringBetween($base64Image, "data:" , ";" ) ;

                $decoded_data    = base64_decode ($base64_data) ;
                $destinationPath = public_path ('reporter-image/') ;
                $reporterImage   = random_int (100000, 999999)."-".date('YmdHis') . "." . $extension;

                $data_reporter['selfie'] = $reporterImage ;
                    try {
                        file_put_contents($destinationPath . "" . $reporterImage, $decoded_data);
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
            if ($image = $request->image) {
                foreach ($image as $key) {
                    $base64_data = explode ( "base64," , $key)[1];
                    $extension   = $this->getStringBetween($base64Image, "data:" , ";" ) ;
    
                    $decoded_data    = base64_decode ($base64_data) ;

                    $destinationPath = public_path('images/');
                    $profileImage = random_int(100000, 999999)."-".date('YmdHis') . "." . $extension;
            
                    try {
                        file_put_contents($destinationPath . "" . $profileImage, $decoded_data);
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
            Log::error($th->getMessage());
            Alert::error('gagal', 'periksa kembali inputan anda');
            return back();
        }

        
        // return view('web.layout.base');
    }
}
