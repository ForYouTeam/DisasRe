<?php

namespace App\Repositories;

use App\Contracts\ReportContract;
use App\Models\DetailReport;
use App\Models\Report;
use App\Models\ReportPhoto;
use App\Traits\HttpResponseModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReportRepository implements ReportContract
{
  use HttpResponseModel;

  private Report $reportModel;
  private DetailReport $reportDetail;
  private ReportPhoto $reportPhoto;
  public function __construct()
  {
    $this->reportModel = new Report();
    $this->reportDetail = new DetailReport();
    $this->reportPhoto = new ReportPhoto();
  }
  public function getAllPayload(array $payload)
  {
    try {

      $data = $this->reportModel->all();

      return $this->success($data, "success getting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function getPayloadById(int $id)
  {
    try {
      
      $find = $this->reportModel->whereId($id)->with('reporter')->first();

      if (!$find) {
        return $this->error('report not found', 404);
      }

      return $this->success($find, "success getting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function upsertPayload($id, array $payload,array $detail, array $photo)
  {
    try {
      if ($id) {
        $find = $this->getPayloadById($id);
        if ($find['code'] !== 200) {
          return $find;
        }
        $payload['updated_at'] = Carbon::now();
        $result = [
          'data' => $this->reportModel->whereId($id)->update($payload),
          'message' => 'Updated data successfully'
        ];

      } else {
        try {
          DB::beginTransaction();
          $data_report = $this->reportModel->create($payload);
          $detail['report_id'] = $data_report->id;
          $detail = $this->reportDetail->create($detail);
          // dd($photo);
          foreach ($photo as $key) {
            $key['report_id'] = $data_report->id;
            // dd($key);
            $photos = $this->reportPhoto->create($key);
            // dd($photos->id);
          }
          DB::commit();
        } catch (\Throwable $th) {
          DB::rollback();
        }
        $result = [
          'data' => $data_report,
          'message' => 'Created data successfully'
        ];
      }

      return $this->success($result['data'], $result['message']);

    } catch (\Throwable $th) {
      
      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function deletePayload(int $id)
  {
    try {

      $find = $this->getPayloadById($id);

      if ($find['code'] != 200) {
        return $find;
      }
      
      $data = $this->reportModel->whereId($id)->delete();

      return $this->success($data, "success deleting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }
}