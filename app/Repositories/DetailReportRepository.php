<?php

namespace App\Repositories;

use App\Contracts\DetailReportContract;
use App\Models\DetailReport;
use App\Models\Flood;
use App\Traits\HttpResponseModel;
use Carbon\Carbon;

class DetailReportRepository implements DetailReportContract
{
  use HttpResponseModel;

  private DetailReport $detailReportModel;
  public function __construct()
  {
    $this->detailReportModel = new DetailReport();
  }
  public function getAllPayload(array $payload)
  {
    try {

      $data = $this->detailReportModel->all();

      return $this->success($data, "success getting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function getPayloadById(int $id)
  {
    try {
      
      $find = $this->detailReportModel->whereId($id)->first();

      if (!$find) {
        return $this->error('detail report not found', 404);
      }

      return $this->success($find, "success getting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function upsertPayload($id, array $payload)
  {
    try {
      if ($id) {
        $find = $this->getPayloadById($id);
        if ($find['code'] !== 200) {
          return $find;
        }
        $payload['updated_at'] = Carbon::now();
        $result = [
          'data' => $this->detailReportModel->whereId($id)->update($payload),
          'message' => 'Updated data successfully'
        ];

      } else {

        $result = [
          'data' => $this->detailReportModel->create($payload),
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

      if ($find['code'] == 200 && $find['data']['scope'] == 'super-admin') {
        return $this->error('detail report not found', 404);
      }

      $data = $this->detailReportModel->whereId($id)->delete();

      return $this->success($data, "success deleting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }
}