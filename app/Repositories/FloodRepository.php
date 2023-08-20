<?php

namespace App\Repositories;

use App\Contracts\FloodContract;
use App\Models\Flood;
use App\Traits\HttpResponseModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class FloodRepository implements FloodContract
{
  use HttpResponseModel;

  private Flood $floodModel;
  public function __construct()
  {
    $this->floodModel = new Flood();
  }
  public function getAllPayload(array $payload)
  {
    try {

      $data = $this->floodModel->all();

      return $this->success($data, "success getting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }

  public function getPayloadById(int $id)
  {
    try {
      
      $find = $this->floodModel->whereId($id)->first();

      if (!$find) {
        return $this->error('flood not found', 404);
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
          'data' => $this->floodModel->whereId($id)->update($payload),
          'message' => 'Updated data successfully'
        ];

      } else {

        $result = [
          'data' => $this->floodModel->create($payload),
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
      $data = $this->floodModel->whereId($id)->delete();

      return $this->success($data, "success deleting data");

    } catch (\Throwable $th) {

      return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__ );
    }
  }
}