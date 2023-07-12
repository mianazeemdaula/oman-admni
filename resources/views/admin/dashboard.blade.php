@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-5 p-4 gap-4">
        <x-stat-card title="Total Visitor" count="0" color="bg-blue-500">
            <span class="bi bi-people text-white"></span>
        </x-stat-card>
        <x-stat-card title="Total Building" count="{{ \App\Models\Building::count() }}" color="bg-green-500">
            <span class="bi bi-building text-white"></span>
        </x-stat-card>
        <x-stat-card title="Total Items" count="{{ \App\Models\Item::count() }}" color="bg-red-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="Organizations" count="{{ \App\Models\Organization::count() }}" color="bg-yellow-500">
            <span class="bi bi-shop text-white"></span>
        </x-stat-card>
        <x-stat-card title="Total User" count="{{ \App\Models\User::count() }}" color="bg-purple-500">
            <span class="bi bi-person-check text-white"></span>
        </x-stat-card>
        <x-stat-card title="مقتنيات أثرية" count="{{ \App\Models\Item::whereType('مقتنيات أثرية')->count() }}"
            color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="مقتنيات فنية" count="{{ \App\Models\Item::whereType('مقتنيات فنية')->count() }}"
            color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="مقتنيات متنوعة" count="{{ \App\Models\Item::whereType('مقتنيات متنوعة')->count() }}"
            color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="مقتنيات أخرى" count="{{ \App\Models\Item::whereType('مقتنيات أخرى')->count() }}"
            color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="مقتنيات التاريخ الطبيعي"
            count="{{ \App\Models\Item::whereType('مقتنيات التاريخ الطبيعي')->count() }}" color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>

        <x-stat-card title="العصر الحجري" count="{{ \App\Models\Item::whereFromWhen('العصر الحجري')->count() }}"
            color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="العصر البرونزي" count="{{ \App\Models\Item::whereFromWhen('العصر البرونزي')->count() }}"
            color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="العصر الحديدي" count="{{ \App\Models\Item::whereFromWhen('العصر الحديدي')->count() }}"
            color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="العصر الإسلامي" count="{{ \App\Models\Item::whereFromWhen('العصر الإسلامي')->count() }}"
            color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="أخرى" count="{{ \App\Models\Item::whereFromWhen('أخرى')->count() }}" color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
        <x-stat-card title="غير معروف" count="{{ \App\Models\Item::whereFromWhen('غير معروف')->count() }}"
            color="bg-blue-500">
            <span class="bi bi-rocket text-white"></span>
        </x-stat-card>
    </div>
@endsection
