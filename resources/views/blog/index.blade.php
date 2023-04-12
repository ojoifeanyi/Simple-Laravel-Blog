<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    @vite('resources/css/app.css')
    <title>
        Laravel App
    </title>
</head>
<body class="w-full h-full bg-gray-100">

 <!-- Top Bar Nav -->
 <nav class="w-full py-4 bg-blue-800 shadow">
  <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

      <nav>
          <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
              <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ Route('blog.index') }}">Home</a></li>
              @if (Auth::user())
              <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ Route('dashboard') }}">Dashboard</a></li>
              @else
              <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ __('login') }}">Login</a></li>
              @endif
             
          </ul>
      </nav>

      <div class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline px-10">
          Free Blog Article Site  
      </div>

  </div>

</nav>





 
<!-- component -->
<div class="max-w-screen-lg mx-auto">
    <!-- header -->

    <!-- header ends here -->

    <main class="mt-12 w-4/5 mx-auto">
     

      <!-- popular posts -->
      <!--<div class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between">
        <h2 class="font-bold text-3xl">Popular news</h2>
        <a class="bg-gray-200 hover:bg-green-200 text-gray-800 px-3 py-1 rounded cursor-pointer">
          View all
        </a>
      </div> -->

      <br>


   


    <div class="w-4/5 mx-auto">
        
      @if (Auth::user())
      <div class=" py-10 sm:py-10">
        <a class="primary-btn inline text-base  bg-blue-500 py-4 px-4 shadow-xl rounded-xl transition-all hover:bg-gray-400"
           href="{{ route ('blog.create') }}">
           Create New Post
        </a>
    </div>
      @endif

    </div>

    @foreach ($posts as $post)
    <div class="w-full mx-auto pb-10">
        <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
            <div class="w-11/12 mx-auto pb-10">
                <h2 class="text-gray-900 text-2xl font-bold pt-0 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                    <a href="{{ route ('blog.show',$post->id) }}">
                        {{ $post->title }}
                    </a>
                </h2>

                <p class="text-gray-900 text-lg py-4 w-full break-words mb-0">
                    {{ $post->excerpt }} 
                  
                   @if (!$post->image_path)
                       <div></div>
                       @else
                       <div class="w-90">  <img class="object-cover h-50 w-96" src=" {{ asset($post->image_path) }}"> </div>
                   @endif
                   

                <span class="text-gray-500 text-sm sm:text-base">
                   <br> Posted by {{ $post->user->name }} on: {{ $post->created_at->format('d/m/y') }}
                </span>
            </p>
            </div>
        </div>
    </div>
    @endforeach

    <div class="mx-auto pb-10 w-3/5">
        {{ $posts->links() }}
    </div>
</body>
</html>