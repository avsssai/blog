@extends('layout')

    <link rel="stylesheet" href="{{asset('css/indexStyle.css')}}" type='text/css'>

    <div class="ten column wide">

    <div class="heading">
        <h1>Hello! </h1><br>

    </div>

    <div class="sub-heading">
        <h2>Here is the list of the blog posts!</h2>

    </div>

    <div class="list">
    @foreach($blogs as $blog)
        <div class="ui list">
             <li> <a href="/blog/{{$blog->id}}">{{$blog->title}}</a>   </li>
         </div>

    @endforeach

    </div>
    
        <div class="button">


        </div>
            <form  action="/blog/create">
             <button class="ui primary button" >
                 create new blog!
             </button>
            </form>
        </div>  
    </div>

