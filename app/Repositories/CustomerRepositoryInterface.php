<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function create(array $data);
    public function all(int $perPage);
    public function find($id);
    public function update($id, array $data);
}
