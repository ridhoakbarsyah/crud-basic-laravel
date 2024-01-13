@extends('students.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
      
      <form action="{{ url('student') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>

        <label>Email Address</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>

        <label>City</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>

        <label>Study Program</label></br>
        <input type="text" name="program_study" id="program_study" class="form-control"></br>

        <label>WhatsApp Number</label></br>
        <input type="number" name="mobile" id="mobile" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop