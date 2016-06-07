<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Course;


class CourseController extends Controller
{
    public function index()
    {
        echo "ssss";die;
        return view('admin.course');
    }
    public function getList()
    {
        return Course::orderBy('created_at', 'desc')->paginate(2);
    }

    public function combiningAngularAndReact()
    {
        return view('admin.combiningAngularAndReact');
    }
}
