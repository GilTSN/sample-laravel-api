<?php

namespace App\Repositories;

abstract class BaseRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Store the related model
     * 
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data): \Illuminate\Database\Eloquent\Model
    {
        return $this->model->create($data);
    }

    /**
     * Get the related model
     * 
     * @param int $limit
     * @param int $offset
     * @param array $filters array of where clauses ex: [['column', 'condition', 'value']]
     * @param array $order array with columns and directions to order by ex: [['column', 'asc']]
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get(
        int $limit = 100, 
        int $offset = 0, 
        array $filters = [], 
        array $order = []
    ): \Illuminate\Database\Eloquent\Collection {
        $result = $this->model->skip($offset)->take($limit);

        if (!empty($filters)) {
            $result->where($filters);
        }

        foreach ($order as $orderItem) {
            $result->orderBy($orderItem[0], $orderItem[1]);
        }

        return $result->get();
    }

    /**
     * Get the first model where $field = $value
     * 
     * @param string $field
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getFirst(string $field, string $value): \Illuminate\Database\Eloquent\Model|Illuminate\Database\Eloquent\ModelNotFoundException
    {
        $model = $this->model->where($field, $value);

        return $model->firstOrFail();
    }

    /**
     * Update the related model where $field = $value
     * 
     * @param string $field
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(string $field, string $value, array $data): \Illuminate\Database\Eloquent\Model
    {
        $model = $this->model->where($field, $value)->firstOrFail();

        foreach ($data as $column => $value) {
            $model->{$column} = $value;
        }

        $model->save();

        return $model;
    }

    /**
     * Delete the related model by its primary key
     * 
     * @param int|array $id single value or an array of ids
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }
}