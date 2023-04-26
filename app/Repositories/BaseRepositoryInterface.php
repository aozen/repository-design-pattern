<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface BaseRepositoryInterface
{
    public function all(): Collection;

    public function find(int|string $id): ?stdClass;

    public function create(array $data): stdClass;

    public function update(int|string $id, array $data): ?stdClass;

    public function delete(int|string $id): bool;
}
