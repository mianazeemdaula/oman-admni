@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-4 p-4 gap-4">
        <x-stat-card title="Total Visitor" count="0" color="bg-blue-500">
            <span class="bi bi-people text-white"></span>
        </x-stat-card>
        <x-stat-card title="Total Building" count="{{ \App\Models\Building::count() }}" color="bg-green-500">
            <span class="bi bi-building text-white"></span>
        </x-stat-card>
        <x-stat-card title="Total Items" count="{{ \App\Models\Item::count() }}" color="bg-red-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="Total Organizations" count="{{ \App\Models\Organization::count() }}" color="bg-yellow-500">
            <span class="bi bi-shop text-white"></span>
        </x-stat-card>
        <x-stat-card title="Total User" count="{{ \App\Models\User::count() }}" color="bg-purple-500">
            <span class="bi bi-person-check text-white"></span>
        </x-stat-card>
        <x-stat-card title="Total Visitor" count="25" color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="Total Visitor" count="25" color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="Total Visitor" count="25" color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
    </div>
@endsection
