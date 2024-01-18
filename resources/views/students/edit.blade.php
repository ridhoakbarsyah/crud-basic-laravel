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
      <input type="number" name="nim" id="nim" value="{{$students->nim}}" class="form-control" maxlength="8"><br>

      <label>Nama</label><br>
      <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control"><br>

      <label>Email</label><br>
      <input type="email" name="email" id="email" value="{{$students->email}}" class="form-control"><br>

      <label>Alamat</label><br>
      <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control"><br>

      <label for="program_study">Program Studi</label><br>
        <select name="program_study" id="program_study" class="form-control" required>
          @foreach($programStudi as $data)
          <option value="{{ $data->id }}" {{ old('program_study') == $data->id ? 'selected' : '' }}>
            {{ $data->program_study }}
          </option>
          @endforeach
        </select><br>
        
        @if($errors->has('program_study'))
        <p class="text-danger">{{ $errors->first('program_study') }}</p>
        @endif

      <label>Nomor WhatsApp</label><br>
      <input type="number" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control" maxlength="12"><br>

      <div class="button-container">
        <input type="submit" value="Update" class="btn btn-success">
        <input type="submit" value="Back" class="btn btn-secondary" onclick="goBack()">
    </div>

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
      var maxLength = 8;
      var inputValue = $(this).val();

      if (inputValue.length > maxLength) {
        $(this).val(inputValue.slice(0, maxLength));
      }
    });
  });

   function goBack() {
        window.history.back();
    }
</script>
@stop