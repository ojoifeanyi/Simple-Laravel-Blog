<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
    {{ __("You're logged in!") }} | <a href="{{ Route('logout') }}">Logout</a> | <a href="{{ Route('blog.index') }}">Home</a>
                </div>
            </div>

<div>
    <h1 class="pt-8 pb-8 text-xl font-bold">
        Posts of: {{ Auth::user()->name }}
    </h1>
</div>


@if (session()->has('message'))
<div class="mx-auto w-4/5 pb-10">
    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
        Warning
    </div>
    <div class="border border-t-1 border-red-400 bg-red-100 px-4 py-3 text-red-700">
        {{ session()->get('message') }}
    </div>

</div>
    
@endif

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Post Title
                </th>
                <th scope="col" class="px-6 py-3">
                   Post Excerpt
                </th>
                <th scope="col" class="px-6 py-3">
                   Action
                 </th>
                 <th scope="col" class="px-6 py-3">
                   
                  </th>
            </tr>
        </thead>
        <tbody>
            @foreach (Auth::user()->posts as $post )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4">
                    {{ $post->title }} 
                </th>
                <td class="px-6 py-4">
                    {{ $post->excerpt }} 
                </td>
            
                <td class="px-6 py-4 ">
                    <a href="{{ Route('blog.edit',$post->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                  
                </td>
                <td class="px-6 py-4 ">
                    <form action="{{ Route('blog.destroy',$post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="pt-3 text-red-500 pr-3">Delete</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>





        </div>
    </div>
</x-app-layout>
