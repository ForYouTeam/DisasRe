<?php

namespace App\Repositories;

use App\Contracts\ReporterContract;
use App\Models\Reporter;
use App\Traits\HttpResponseModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ReporterRepository implements ReporterContract
{
  use HttpResponseModel;

  private Reporter $reporterModel;
  public function __construct()
  {
    $this->reporterModel = new Reporter();
  }
  public function getAllPayload(array $payload)
  {
    try {

      $data = $this->reporterModel->all();

      return $this->success($data, "success getting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function getPayloadById(int $id)
  {
    try {
      
      $find = $this->reporterModel->whereId($id)->first();

      if (!$find) {
        return $this->error('reporter not found', 404);
      }

      return $this->success($find, "success getting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function upsertPayload($id, array $payload, string $profilImage)
  {
    try {
      if ($id) {
        $find = $this->getPayloadById($id);
        if ($find['code'] !== 200) {
          return $find;
        }
        $payload['selfie'] = $profilImage;
        $payload['updated_at'] = Carbon::now();
        $result = [
          'data' => $this->reporterModel->whereId($id)->update($payload),
          'message' => 'Updated data successfully'
        ];

      } else {
        $payload['selfie'] = $profilImage;
        $result = [
          'data' => $this->reporterModel->create($payload),
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
      
      $data = $this->reporterModel->whereId($id)->delete();

      return $this->success($data, "success deleting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }
}