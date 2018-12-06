<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" type='text/css'>
</head>
<body>

    <section>
        <div class="heading">
            Log.

        </div>

        <span>
            <div class="log-in">

            </div>

        </span>

    </section>

    <section>
        <div class="blog-heading">
            {{$blogs->title}}            
       </div>

       <div class="author-name">
           <i>-Shiva Seshasai</i>
       </div>

       <div class="ui four wide column">

            <div class="blog-content">

                <p>{{$blogs->description}}</p>
               </div>
        

       </div>



    </section>

</body>
</html>