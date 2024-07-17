<?php

namespace   App\Services;

use App\Models\Todo;

class TodoService
{
    public function create(array $data)
    {
        return Todo::create($data);
    }
}