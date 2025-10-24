@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Users
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Username
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    {{$user->id}}
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->username}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection