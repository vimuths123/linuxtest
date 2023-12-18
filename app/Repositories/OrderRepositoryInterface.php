<?php

namespace App\Repositories;

interface OrderRepositoryInterface
{
    public function create(array $data);
    public function all(int $perPage = 10);
    public function find($id);
}
