@extends('layout')

@section('content')

<form method='POST'  action="/blog">

@csrf
<div class="ui form">
<div class="field">
    <label>Title</label>
    <input type="text" name="title" placeholder="Title..." required>
  </div>

  <div class="ui form">
  <div class="field">
    <label>Text</label>
    <textarea name='description' required></textarea>
  </div>


</div>

<button class="ui primary button" type='submit'>Publish!</button>


</form>

@include('errors')



@endsection