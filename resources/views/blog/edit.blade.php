<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
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
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ Route('logout') }}">Logout</a></li>
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




<div class="w-4/5 mx-auto">
    <div class="text-center pt-5">
        <h1 class="text-2xl text-gray-700">
          Edit: {{ $posts->title }}
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

<div class="m-auto pt-5">
    <form
        action="{{ route('blog.update', $posts->id) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label for="is_published" class="text-gray-500 text-1">
            Is Published
        </label>

        <input
            type="checkbox"
           {{ $posts->is_published=== true ? 'checked' : '' }}
            class="bg-transparent  outline-none"
            name="is_published">

            <input
            type="text"
            name="user_id"
            placeholder="user_id..."
            value="{{ $posts->user->id }}"
            class="hidden"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            
        <input
            type="text"
            name="title"
           value="{{ $posts->title }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <br>
        <input
            type="text"
            name="excerpt"
          value="{{ $posts->excerpt }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <br>
        <input
            type="number"
            name="min_to_read"
            value="{{ $posts->min_to_read }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <br>
        <textarea
            name="body"
            placeholder="Body..."
            rows ="6"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        {{ $posts->body }}
        </textarea>
<br>
        <div class="bg-grey-lighter py-10 hidden">
            <label class="w-80 flex flex-col items-left px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                <input
                    type="file"
                    name="image_path"
              
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            </label>
        </div>

        

        <button
            type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Submit Post
        </button>
    </form>
</div>
</body>
</html>