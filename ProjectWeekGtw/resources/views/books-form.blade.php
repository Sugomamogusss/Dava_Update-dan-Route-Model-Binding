<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h1>Add Book</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('store-book') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <p>Title<br><input type="text" name="title" value="{{ old('title') }}"></p>
        <p>Writer<br><input type="text" name="writer" value="{{ old('writer') }}"></p>
        <p>Published Year<br><input type="number" name="published_year" value="{{ old('published_year') }}"></p>
        <p>Cover Image<br><input type="file" name="cover_path" accept="image/*"></p>

        <button type="submit">Save</button>
        <a href="{{ url('/') }}">Back</a>
    </form>
</body>
</html>
