@extends('layouts.app')

@section('content')
    <h1>Add User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" name="name" placeholder="Name" required>
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="email" name="email" placeholder="Email" required>
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
