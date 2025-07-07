<x-layout title="Drivers">
    <h1>Drivers in the sport of FormulaD 2025</h1>
    <div class="scores-container">
        @foreach ($drivers as $driver)
            <div class="score-card">
                <a href="/drivers/{{$driver->id}}">
                    {{$driver->name}}
                </a>
            </div>
        @endforeach
    </div>
</x-layout>