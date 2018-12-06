@extends('layout')


<link ref='stylesheet' src="{{asset('css/editStyle.css')}}">
<div class="ten wide column">

<h1>Edit the Blog here.</h1>
<form method='POST' action="/blog/{{$blogs->id}}">
@method('PATCH')
@csrf
<div class="ui form">
  <div class="field">
    <label  >Title </label>
    <input placeholder='Edit the Title..' type="text" name='title'  value="{{$blogs->title}}" required>
  </div>
</div>

<div class="text-area-edit">
<div class="ui form">
  <div class="field">
    <label>Text</label>
    <textarea name='description' placeholder='Edit the Description...' required>{{$blogs->description}}</textarea>
  </div>

</div>

<button type='submit' class="ui primary button">Edit the Blog</button>


</form>



<form action="/blog/{{$blogs->id}}" method="POST">
@method('DELETE')
@csrf
<button class="ui primary button" type='submit'>Delete this Blog</button>


</form>

@include('errors')


    
</div>
