@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    User Agents
</div>
<div class="table-responsive text-dark text-center">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    User Agent
                </th>
                <th>
                    Device
                </th>
                <th>
                    Platform
                </th>
                <th>
                    Browser
                </th>
                <th>
                    Robot
                </th>
                <th>
                    Disable
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($useragents as $useragent)
            <tr class="p-3">
                <td>
                    {{$useragent->id}}
                </td>
                <td>
                    {{$useragent->user_agent}}
                </td>
                <td>
                    {{$useragent->device}}
                </td>
                <td>
                    {{$useragent->platform}}
                </td>
                <td>
                    {{$useragent->browser}}
                </td>
                <td>
                    {{$useragent->robot }
                }</td>
                <td>
                    {{$useragent->disable }
                }</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection