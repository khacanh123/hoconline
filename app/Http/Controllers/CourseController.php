<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CourseImport;
use App\Imports\LessonImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Course;
use App\Lesson;
class CourseController extends Controller
{
    public function index()
    {
        $course = Course::select('*')->paginate(10);
        return view('admin.page.course',['course' => $course]);
    }
    function import(Request $request)
    {
        Excel::import(new CourseImport,request()->file('upload'));
           
        return back()->with('success', 'Thêm khóa học từ file Excel thành công.');
    }
    function importLesson(Request $request)
    {
        Excel::import(new LessonImport,request()->file('upload'));
           
        return redirect()->route('course')->with('success', 'Thêm bài học từ file Excel thành công.');
    }
    function lesson()
    {
        return view('admin.page.add_lesson');
    }
    function listLesson(Request $request, $courseId)
    {
        $course = Course::find($courseId);
        $code = $course->course_code;
        $listLesson =  Lesson::where('course_id', $code)->paginate(10);
        return view('admin.page.list_lesson',['course_name' =>$course->name, 'list' =>$listLesson]);
    }
    function getEdit(Request $request, $courseId)
    {
        $edit = Course::find($courseId);
        return view('admin.page.edit_course',['edit'=>$edit]);
    }
    function postEdit(Request $request)
    {
        $update = Course::find($request->id);
        $update->name = $request->name;
        $update->image = $request->image;
        $update->price_sale = $request->price_sale;
        $update->description = $request->description;
        $update->description_full = $request->description_full;
        $update->save();
        return back()->with('success', 'Sửa thông tin khóa học thành công.');
    }
}
