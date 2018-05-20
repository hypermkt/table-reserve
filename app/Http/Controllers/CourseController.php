<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\DataAccess\Eloquent\Course;
use App\DataAccess\Eloquent\TableType;
use App\Repositories\CourseRepositoryInterface;
use Auth;

class CourseController extends Controller
{
    private $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create', [
            'tableTypes' => TableType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CourseRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $this->courseRepository->store($request->all(), Auth::id());

        return redirect()->to('/courses')->with('success', 'メニュー「' . $request->course_name . '」を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('courses.show', [
            'course' => Course::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('courses.edit', [
            'course' => Course::find($id),
            'tableTypes' => TableType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CourseRequest  $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $this->courseRepository->update($request->all(), $course);

        return redirect()->to('/courses')->with('success', 'メニュー「' . $request->course_name . '」を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $courseName = $course->course_name;
        $course->tableTypes()->detach();
        $course->delete();

        return redirect()->to('/courses')->with('success', 'メニュー「' . $courseName . '」を削除しました');
    }
}
