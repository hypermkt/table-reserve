<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CourseRequest;
use App\TableType;
use Encore\Admin\Widgets\Table;
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
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
        $course = Course::create([
            'user_id' => Auth::id(),
            'release_state' => $request->release_state,
            'kind' => $request->kind,
            'course_name' => $request->course_name,
            'price' => $request->price,
            'duration_minutes' => $request->duration_minutes,
        ]);

        $course->tableTypes()->attach($request->table_types);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::find($id);
        $course->release_state = $request->release_state;
        $course->kind = $request->kind;
        $course->course_name = $request->course_name;
        $course->price = $request->price;
        $course->duration_minutes = $request->duration_minutes;
        $course->save();

        $course->tableTypes()->sync($request->table_types);

        return redirect()->to('/courses')->with('success', 'メニュー「' . $request->course_name . '」を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course $course
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
