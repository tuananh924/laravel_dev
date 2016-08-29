<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Course;
class CourseController extends Controller
{
    public function index()
    {
        return view('admin.course');
    }

    public function getList()
    {
        return Course::orderBy('created_at', 'desc')->paginate();
    }

    public function combiningAngularAndReact()
    {
        return view('admin.combiningAngularAndReact');
    }

    public function coursesReact()
    {
        return view('admin.coursesReact');
    }

    public function add(Request $request)
    {
        $newCourse = $request->all();
        if ($newCourse) {
            unset($newCourse['id']);
            $course = Course::create();
            $course->title_course = $newCourse['title_course'];
            $course->alias_course = str_slug($newCourse['title_course'], '-');
            if ($course->save()) {
                return $this->getList();
            } else {
                return false;
            }
        }
    }
}
