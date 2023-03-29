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
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">Home</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">Login</a></li>
                </ul>
            </nav>

            <div class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline px-10">
                Free Blog Article Site  
            </div>
    
        </div>

    </nav>


    <div class="w-4/5 mx-auto">
        
        <div class="py-10 sm:py-10">
            <a class="primary-btn inline text-base sm:text-xl bg-blue-500 py-4 px-4 shadow-xl rounded-xl transition-all hover:bg-gray-400"
               href="{{ route ('blog.create') }}">
                New Post
            </a>
        </div>
    </div>

    @foreach ($posts as $post)
    <div class="w-4/5 mx-auto pb-10">
        <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
            <div class="w-11/12 mx-auto pb-10">
                <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                    <a href="{{ route ('blog.show',$post->id) }}">
                        {{ $post->title }}
                    </a>
                </h2>

                <p class="text-gray-900 text-lg py-8 w-full break-words">
                    {{ $post->excerpt }}

                <span class="text-gray-500 text-sm sm:text-base">
                   <br> Posted on: {{ $post->created_at->format('d/m/y') }}
                </span>
            </div>
        </div>
    </div>
    @endforeach

    
</body>
</html>