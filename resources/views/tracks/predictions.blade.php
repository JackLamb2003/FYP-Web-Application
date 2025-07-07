<x-layout title="Predictions">
    <div class="track-container">
        <div class="track-box">
            <h1>Predictions</h1>
            <h2>This is for who is most likely to win each event out of the top 3 drivers not guaranteed</h2>
            <div class="scores-container">
                @foreach($predictions as $prediction)
                    <div class="score-card">
                        <p><strong>Track:</strong> {{ $prediction['track'] }}</p>
                        @foreach ($prediction['top_drivers'] as $index => $driver)
                            <p>Top {{ $index + 1 }}: {{ $driver['name'] }} Average Points: {{ number_format($driver['average_points'], 2) }} Chance to Win: {{ $driver['chance_to_win'] }}%</p>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>