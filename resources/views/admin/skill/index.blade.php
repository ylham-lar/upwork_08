@extends('admin.layouts.app')
@section('content')
<div class="h2 pt-3 mb-3">
    Skills
</div>
<div class="table-responsive text-dark">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr>
                <td>{{$skill->id}}</td>
                <td>{{$skill->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection