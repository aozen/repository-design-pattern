<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected Model $model)
    {

    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int|string $id): ?stdClass
    {
        return (object) $this->model->findOrFail($id)->toArray();
    }

    public function create(array $data): stdClass
    {
        return $this->model->create([$data])->toArray();
    }

    public function update(string|int $id, array $data): ?stdClass
    {
        return (object) tap($this->model->findOrFail($id))->update($data)->toArray();
    }

    public function delete(int|string $id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }
}
