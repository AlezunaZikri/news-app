<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Edit</title>
    <link rel="shortcut icon" href="https://i.pinimg.com/736x/4c/99/13/4c99138cc7fc8d51b077d80be22621a0.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
</head>
<body class="font-sans antialiased bg-gray-300">


    <div class="container mx-auto p-8">
        <form action="{{ route('post.update' , $post->id)}}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
            <!-- Input Gambar -->
            @csrf
            @method('put')
            <div>
                <label for="image" class="block text-blue-700 text-2xl">Gambar</label>
                <input type="file" id="image" name="image" class="block w-full mt-1" >


            <!-- Input Judul -->
            <div>
                <label for="title" class="block text-blue-700 text-2xl mt-4">Judul</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" class="block w-full mt-1" >
            </div>


            <!-- Input Deskripsi -->
            <div>
                <label for="description" class="block text-blue-700 text-2xl mt-4">Deskripsi</label>
                <textarea id="description" name="description"  class="block w-full mt-1">{{ $post->description }}</textarea>
            </div>


            <!-- Input Konten -->
            <div>
                <label for="content" class="block text-blue-700 text-2xl mt-4">Konten</label>
                <textarea id="content" name="content"  class="block w-full mt-1">{{ $post->content }}</textarea>
            </div>


            <!-- Tombol Submit -->
            <div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">Kirim</button>
            </div>
        </form>
    </div>


</body>
</html>