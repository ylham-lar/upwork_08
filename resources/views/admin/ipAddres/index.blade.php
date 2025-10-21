@extends('admin.layouts.app')

@section('content')
<div class="container-xxl">
    @foreach ($ip_Addresses as $ip_Addresss)
    <div>
        <div>{{$ip_Addresss->id}}</div>
        <div>{{$ip_Addresss->ip_address}}</div>
        <div>{{$ip_Addresss->country_code}}</div>
        <div>{{$ip_Addresss->country_name}}</div>
        <div>{{$ip_Addresss->city_name}}</div>
        <div>{{$ip_Addresss->disabled}}</div>
    </div>
    @endforeach
</div>
@endsection 