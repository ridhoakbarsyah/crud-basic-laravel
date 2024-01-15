@extends('students.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">NIM : {{ $students->nim }}</h5>

        <p class="card-text">Nama : {{ $students->name }}</p>

        <p class="card-text">Email : {{ $students->email }}</p>

        <p class="card-text">Kota : {{ $students->address }}</p>

        <p class="card-text">Program Studi : {{ $students->program_study }}</p>
        
        <p class="card-text">Nomor WhatsApp : {{ $students->mobile }}</p>
  </div>
  
  </div>
</div>