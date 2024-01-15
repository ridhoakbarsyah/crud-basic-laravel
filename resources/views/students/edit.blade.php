@extends('students.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contact Us Page</div>
  <div class="card-body">
      
    <form action="{{ url('student/' .$students->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")
      <input type="hidden" name="id" value="{{$students->id}}" />

      <label>NIM</label><br>
      <input type="number" name="nim" id="nim" value="{{$students->nim}}" class="form-control"><br>

      <label>Nama</label><br>
      <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control"><br>

      <label>Email</label><br>
      <input type="email" name="email" id="email" value="{{$students->email}}" class="form-control"><br>

      <label>Alamat</label><br>
      <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control"><br>

      <label>Program Studi</label><br>
      <input type="text" name="program_study" id="program_study" value="{{ $students->program_study }}" class="form-control"><br>

      <label>Nomor WhatsApp</label><br>
      <input type="number" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control"><br>

      <input type="submit" value="Update" class="btn btn-success"><br>
    </form>
   
  </div>
</div>

@stop