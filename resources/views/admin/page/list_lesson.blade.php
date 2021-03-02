@extends('admin.master')
@section('title','Khóa học')
@section('content')
<h3>Khóa học: {{$course_name}}</h3>
               <table class="table table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên bai giang</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1; ?>
    @foreach($list as $value)
      <tr>
        <td>{{$i++}}</td>
        <td><a href="/list_lesson/{{$value->id}}">{{$value->name}}</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $list->links() }}
@endsection
