<?php

namespace App\Contracts;

interface ReportContract
{
  public function getAllPayload(array $payload);
  public function getPayloadById(int $id);
  public function upsertPayload($id, array $payload, array $detail, array $photo);
  public function deletePayload(int $id);
  public function getGeoData();
}