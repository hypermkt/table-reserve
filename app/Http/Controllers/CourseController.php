<?php

namespace App\Http\Controllers;

use App\Course;
use App\TableType;
use Encore\Admin\Widgets\Table;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index', ['courses' => Course::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create', ['tableTypes' => TableType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create([
            'release_state' => $request->release_state,
            'kind' => $request->kind,
            'title' => $request->title,
            'price' => $request->price,
            'duration_minutes' => $request->duration_minutes,
        ]);

        $course->tableTypes()->attach($request->type_types);

        return redirect()->to('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('courses.show', ['course' => Course::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('courses.edit', ['course' => Course::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->release_state = $request->release_state;
        $course->kind = $request->kind;
        $course->title = $request->title;
        $course->price = $request->price;
        $course->duration_minutes = $request->duration_minutes;
        $course->save();

        return redirect()->to('/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->to('/courses');
    }
}
