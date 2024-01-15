@extends('students.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
      
      <form action="{{ url('student') }}" method="post">
        {!! csrf_field() !!}
        <label>NIM</label></br>
        <input type="number" name="nim" id="nim" class="form-control" autofocus></br>
        @if($errors->has('nim'))
          <p class="text-danger">{{ $errors->first('nim') }}</p>
        @endif

        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        @if($errors->has('name'))
          <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif

        <label>Email Address</label></br>
        <input type="email" name="email" id="email" class="form-control"></br>
        @if($errors->has('email'))
          <p class="text-danger">{{ $errors->first('email') }}</p>
        @endif

        <label>City</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        @if($errors->has('address'))
          <p class="text-danger">{{ $errors->first('address') }}</p>
        @endif

        <label>Study Program</label></br>
        <input type="text" name="program_study" id="program_study" class="form-control"></br>
        @if($errors->has('address'))
          <p class="text-danger">{{ $errors->first('program_study') }}</p>
        @endif

        <label>WhatsApp Number</label></br>
        <input type="number" name="mobile" id="mobile" class="form-control"></br>
        @if($errors->has('address'))
          <p class="text-danger">{{ $errors->first('mobile') }}</p>
        @endif
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop