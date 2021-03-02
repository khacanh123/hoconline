@extends('admin.master')
@section('title','Sửa khóa học')
@section('content')
<script src="http://127.0.0.1:8000/ckeditor/ckeditor.js"></script>
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
<h3>Sửa thông tin khóa học</h3>
<form action="{{ route('edit_save') }}" method="post">
    @csrf
    <input value="{{$edit->id}}" type="text" name="id" hidden>
<div class="form-group">
  <label for="usr">Tên khóa học:</label>
  <input type="text" class="form-control" value="{{$edit->name}}" name="name" id="usr">
</div>
<div class="form-group">
  <label for="usr">Image khóa học:</label>
  <input type="text" class="form-control" value="{{$edit->image}}" id="usr" name="image">
</div>
<div class="form-group">
  <label for="usr">Danh mục khóa học:</label>
  <input type="text" class="form-control" id="usr">
</div>
<div class="form-group">
  <label for="usr">Giá sale:</label>
  <input type="text" class="form-control"value="{{$edit->price_sale}}" name="price_sale" id="usr">
</div>
<div class="form-group">
    <label for="">Mô tả ngắn:</label>
    <input type="text" class="form-control" name="description" value="{{$edit->description}}">
</div>
<div class="form-group">
    <label for="">Mô tả chi tiết</label>
    <textarea name="description_full" id="post_content" rows="10" cols="150">{{$edit->description_full}}</textarea>
</div>
<button class="btn btn-primary" type="submit">Lưu lại</button>
</form>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'post_content' );
</script>
@endsection
