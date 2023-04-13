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
<body>

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
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ __('register') }}">Register</a></li>
                @endif
               
            </ul>
        </nav>
  
        <div class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline px-10">
             
        </div>
  
    </div>
  
  </nav>



    <div class="w-4/5 mx-auto">
        <div class="pt-10">
            <a href="{{ URL::previous() }}"
               class="text-blue-500 italic hover:text-blue-400 hover:border-b-2 border-blue-400 pb-3 transition-all py-20">
                < Back to previous page
            </a>
        </div>

        <h4 class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 sm:py-20">
            {{ $posts->title }}
        </h4>

        <div class="block lg:flex flex-row">
            <div class="basis-9/12 text-center sm:block sm:text-left">
                <span class="text-left sm:text-center sm:text-left sm:inline block text-gray-900 pb-1 sm:pt-0 pt-0 sm:pt-10 pl-0 sm:pl-4 -mt-8 sm:-mt-0">
                   Posted on:
                 
                     {{ $posts->created_at->format('d/m/y')}}
                </span>
            </div>
        </div>

        <div class="pt-10 pb-10 text-gray-900 text-xl">
            <p class="font-bold text-2xl text-black pt-0">
                <img class="object-cover h-50 w-full" src=" {{ asset($posts->image_path) }}">
            </p>

            <p class="text-base text-black pt-0" style="position:relative;white-space:pre-line;word-break:;overflow-wrap: break-word;">
              {{$posts->body}}
            </p>
        </div>
    </div>
    </body>
</html>