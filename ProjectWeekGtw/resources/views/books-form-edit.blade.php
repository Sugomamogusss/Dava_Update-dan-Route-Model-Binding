<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('update-book', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <p>Title<br><input type="text" name="title" value="{{ old('title', $book->title) }}"></p>
        <p>Writer<br><input type="text" name="writer" value="{{ old('writer', $book->writer) }}"></p>
        <p>Published Year<br><input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}"></p>
        <p>
            Cover Image<br>
            @if ($book->cover_path)
                <img src="{{ asset('storage/' . $book->cover_path) }}" width="80"><br>
            @endif
            <input type="file" name="cover_path" accept="image/*"><br>
            <small>Kosongkan kalau tidak mau ganti cover</small>
        </p>

        <button type="submit">Update</button>
        <a href="{{ url('/') }}">Back</a>
    </form>
</body>
</html>
