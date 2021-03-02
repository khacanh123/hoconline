@extends('admin.master')
@section('title','Khóa học')
@section('content')
<form action="{{route('add_lesson')}}" method="post" enctype="multipart/form-data">

               @csrf
                <div class="form-group">
                    <label for="">Upload filee</label>
                    <input type="file" name="upload" class="form-control">
                </div>
                <button class="btn btn-primary btn-block">Theem moi</button>
               </form>

@endsection
