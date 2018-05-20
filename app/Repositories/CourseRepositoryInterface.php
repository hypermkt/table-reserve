<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Course;

interface CourseRepositoryInterface
{
    public function store(array $data, $userId);
    public function update(array $data, Course $course);
}