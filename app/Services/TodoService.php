<?php

namespace   App\Services;

use App\Models\Todo;
use App\Repositories\TodoRepository;

class TodoService
{

    public function __construct(public TodoRepository $todoRepository)
    {

    }
    public function create(array $data)
    {
        return $this->todoRepository->create($data);
    }
}