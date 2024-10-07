@extends('layouts.app')

@section('content')
    <h1>Add Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Author</th>
                <td>
                    <select name="user_id" required>
                        <option value="" disabled selected>Select Author</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Title</th>
                <td>
                    <input type="text" name="title" placeholder="Title" required>
                </td>
            </tr>
            <tr>
                <th>Content</th>
                <td>
                    <textarea name="content" placeholder="Content" required></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
@endsection
