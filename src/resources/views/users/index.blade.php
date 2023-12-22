
    <x-app-layout>
    <x-slot name="header">
    </x-slot>
    @foreach ($users as $user)
    <p>{{ $user -> name}}</p>
    <p>{{ $user -> email}}</p>
    @endforeach
    </x-app-layout>
