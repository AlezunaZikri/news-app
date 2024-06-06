<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New News</title>
    <link rel="shortcut icon" href="https://i.pinimg.com/736x/4c/99/13/4c99138cc7fc8d51b077d80be22621a0.jpg" type="image/x-icon">
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.1/flowbite.min.css" rel="stylesheet">
</head>
<body class="bg-gray-300">


    <div class="container mx-auto py-12">
        <div class="max-w-4xl mx-auto bg-white border border-gray-200 rounded-lg shadow-md">
            <div class="overflow-hidden rounded-t-lg">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full">
            </div>
            <div class="p-6">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h2>
                <h3 class="text-blue-700 font-3xl mb-6">{{ $post->description }}</h3>
                <div class="prose max-w-none">
                    {!! $post->content !!}
                </div>
                <div class="flex justify-end mt-6">
                    <a href="{{ route('post.index') }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 mr-2">Back</a>
                    <a href="{{ route('post.edit', $post->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 mr-2">Edit</a>
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.1/dist/flowbite.min.js"></script>
</body>
</html>