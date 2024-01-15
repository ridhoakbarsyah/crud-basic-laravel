@extends('students.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
      
      <form action="{{ url('student') }}" method="post">
        {!! csrf_field() !!}
        <label>NIM</label></br>
        <input type="number" name="nim" id="nim" class="form-control" autofocus value="{{ old('nim') }}"  maxlength="10"></br>
        @if($errors->has('nim'))
          <p class="text-danger">{{ $errors->first('nim') }}</p>
        @endif

        <label>Nama</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"></br>
        @if($errors->has('name'))
          <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif

        <label>Email</label></br>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"></br>
        @if($errors->has('email'))
          <p class="text-danger">{{ $errors->first('email') }}</p>
        @endif

        <label>Alamat</label></br>
        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}"></br>
        @if($errors->has('address'))
          <p class="text-danger">{{ $errors->first('address') }}</p>
        @endif

        <label for="program_study">Program Studi</label></br>
        <select name="program_study" id="program_study" class="form-control">
          @foreach($programStudi as $programStudi)
          <option value="{{ $programStudi }}" {{ old('program_study') == $programStudi ? 'selected' : '' }}>
            {{ $programStudi }}
          </option>
          @endforeach
        </select></br>
        
        @if($errors->has('program_study'))
        <p class="text-danger">{{ $errors->first('program_study') }}</p>
        @endif

        <label>Nomor WhatsApp</label></br>
        <input type="number" name="mobile" id="mobile" class="form-control" value="{{ old('mobile') }}" maxlength="12"></br>
        @if($errors->has('mobile'))
          <p class="text-danger">{{ $errors->first('mobile') }}</p>
        @endif
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#mobile').on('input', function() {
      var maxLength = 12;
      var inputValue = $(this).val();

      if (inputValue.length > maxLength) {
        $(this).val(inputValue.slice(0, maxLength));
      }
    });
  });

   $(document).ready(function() {
    $('#nim').on('input', function() {
      var maxLength = 10;
      var inputValue = $(this).val();

      if (inputValue.length > maxLength) {
        $(this).val(inputValue.slice(0, maxLength));
      }
    });
  });
</script>

 
@stop