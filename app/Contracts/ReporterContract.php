<?php

namespace App\Contracts;

interface ReporterContract
{
  public function getAllPayload(array $payload);
  public function getPayloadById(int $id);
  public function upsertPayload($id, array $payload, string $selfie);
  public function deletePayload(int $id);
}