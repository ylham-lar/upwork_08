@extends('admin.layouts.app')
@section('content')
<div class="h2 pt-3 mb-3">
    Ip Addresses
</div>
<div class="table-responsive text-dark">
    <table class="table table-striped table-hover table-bordered table-sm">
        <thead class="small">
            <tr>
                <th>Id</th>
                <th>Ip Address</th>
                <th>Country Code</th>
                <th>Country Name</th>
                <th>City Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ip_Addresses as $ip_Address)
            <tr class="p-3">
                <td>{{$ip_Address->id }}</td>
                <td>{{$ip_Address->ip_address}}</td>
                <td>{{$ip_Address->country_code}}</td>
                <td>{{$ip_Address->country_name}}</td>
                <td>{{$ip_Address->city_name}}</td>
                <td>{{$ip_Address->created_at}}</td>
                <td>{{$ip_Address->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection