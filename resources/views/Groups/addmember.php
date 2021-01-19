@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<form action="/groups/addmember/{{$group->id}}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama teman</label>
    <select class="form-select" aria-label="Default select example" name="friend_id">
      <option selected>pilih teman untuk dimasukan ke groups </option>
      @foreach ($friend as $f)
      <option value="{{$f->id}}">{{$f->nama}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Tambah ke group</button>
</form>




@endsection  