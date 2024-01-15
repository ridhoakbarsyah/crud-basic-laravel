@extends('students.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">NIM : {{ $students->nim }}</h5>

        <p class="card-text">Name : {{ $students->name }}</p>

        <p class="card-text">Email Adress: {{ $students->email }}</p>

        <p class="card-text">City : {{ $students->address }}</p>

        <p class="card-text">Study Program : {{ $students->program_study }}</p>
        
        <p class="card-text">WhatsApp Number : {{ $students->mobile }}</p>
  </div>
  
  </div>
</div>