@extends('admin.layouts.app')
@section('content')
<div class="h2 p-3 mb-3">
    Visitors
</div>
<div class="table-responsive text-dark  text-center">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Ip Addres
                </th>
                <th>
                    User Agent
                </th>
                <th>
                    Hits
                </th>
                <th>
                    Suspect Hits
                </th>
                <th>
                    Robot
                </th>
                <th>
                    Api
                </th>
                <th>
                    Disable
                </th>
                <th>
                    Created At
                </th>
                <th>
                    Updated At
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
            <tr class="p-3">
                <td>
                    {{ $visitor->id }}</td>
                <td>
                    <a href="{{ route('v1.admin.ipaddress.index', ['ip_address_id' => $visitor->ip_address_id]) }}" target="_blank">{{$visitor->ip_address?->ip_address }} </a>
                </td>
                <td>
                    {{$visitor->useragent?->user_agent }}
                </td>
                <td>
                    {{$visitor->hits}}
                </td>
                <td>
                    {{$visitor->suspect_hits}}
                </td>
                <td>
                    {{$visitor->robot}}
                </td>
                <td>
                    {{$visitor->api}}
                </td>
                <td>
                    {{$visitor->disable}}
                </td>
                <td>
                    <i class="bi bi-clock pe-1"></i>{{$visitor->created_at->format('H:i:s d.m.Y') }}
                </td>
                <td>
                    <i class="bi bi-clock pe-1"></i>{{$visitor->updated_at->format('H:i:s d.m.Y') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection