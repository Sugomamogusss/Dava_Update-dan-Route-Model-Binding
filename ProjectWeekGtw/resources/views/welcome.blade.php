<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
</head>
<body>
    <h1>Book List</h1>

    <a href="{{ url('/create-book') }}">+ Add Book</a>
    <br><br>

    <table border="1" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Writer</th>
            <th>Published Year</th>
            <th>Action</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($book->cover_path)
                        <img src="{{ asset('storage/' . $book->cover_path) }}" width="50">
                    @else
                        -
                    @endif
                </td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->writer }}</td>
                <td>{{ $book->published_year }}</td>
                <td>
                    <a href="{{ route('edit-book', $book) }}">Edit</a>
                    <form method="POST" action="{{ route('destroy-book', $book) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
