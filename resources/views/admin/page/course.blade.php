@extends('admin.master')
@section('title','Khóa học')
@section('content')
@if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
            @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
<form action="{{route('add_course')}}" method="post" enctype="multipart/form-data">

               @csrf
                <div class="form-group">
                    <label for="">Upload filee</label>
                    <input type="file" name="upload" class="form-control">
                </div>
                <button class="btn btn-primary btn-block">Theem moi</button>
               </form>
               <table class="table table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên Khóa Học</th>
        <th>Thời lượng</th>
        <th>Số bài học</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1; ?>
    @foreach($course as $value)
      <tr>
        <td>{{$i++}}</td>
        <td><a href="/list_lesson/{{$value->id}}">{{$value->name}}</a></td>
        <td>{{$value->time}}</td>
        <td>{{$value->number_lesson}}</td>
        <td><a href="{{route('edit_course',['courseId' => $value->id])}}">Sửa</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $course->links() }}

@endsection
