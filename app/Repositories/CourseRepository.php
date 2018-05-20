<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Course;

class CourseRepository implements CourseRepositoryInterface
{
    public function store(array $data, $userId)
    {
        $course = Course::create([
            'user_id' => $userId,
            'release_state' => $data['release_state'],
            'kind' => $data['kind'],
            'course_name' => $data['course_name'],
            'price' => $data['price'],
            'duration_minutes' => $data['duration_minutes'],
        ]);

        $course->tableTypes()->attach($data['table_types']);

        return $course;
    }

    public function update(array $data, Course $course)
    {
        $course->release_state = $data['release_state'];
        $course->kind = $data['kind'];
        $course->course_name = $data['course_name'];
        $course->price = $data['price'];
        $course->duration_minutes = $data['duration_minutes'];
        $course->save();

        $course->tableTypes()->sync($data['table_types']);
    }
}