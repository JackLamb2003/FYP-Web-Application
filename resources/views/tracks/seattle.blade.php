<x-layout title="Round6">
    <div class="track-container">
        <div class="track-box">
            <h1>{{ $track->title }}</h1>
            <h2>{{ $track->location }}</h2>
            <div class="layout">
                <img src="{{ asset('images/seattle.png') }}" alt="Seattle track layout">
            </div>
            <a href="https://www.google.co.uk/maps/place/Evergreen+Speedway/@47.8680379,-121.9912605,17z/data=!3m1!4b1!4m6!3m5!1s0x549aa64fa150bba7:0x63b6badea328567b!8m2!3d47.8680343!4d-121.9886856!16zL20vMGgybjNu?entry=ttu&g_ep=EgoyMDI1MDQxNi4xIKXMDSoASAFQAw%3D%3D" target="_blank" class="buttons">Find on Maps</a>
            <h2>We want your opinion:</h2>
            @auth
                <form method="POST" action="{{ route('favorite.track', $track->id) }}">
                    @csrf
                    <label>
                        <input style="margin-bottom: 10px" type="checkbox" name="favorite" onchange="this.form.submit()" {{ auth()->user()->favorite_track_id === $track->id ? 'checked' : '' }}>
                        Is this your favorite track?
                    </label>
                </form>
                <form style="display: flex; flex-direction: column; align-items: flex-start;" action="{{ route('comments.store', $track->id) }}" method="POST">
                    @csrf
                    <textarea name="content" placeholder="Leave a comment..." required style="width: 90%; height: 100px; margin-bottom: 10px;"></textarea>
                    <button type="submit">Send</button>
                </form>
                @else
                <p>Please <a href="{{ route('login') }}">login</a> to comment.</p>
            @endauth
            <h3>Comments:</h3>
            @foreach($comments as $comment)
                <div class="comment">
                    <p><strong>{{ $comment->user->name }}</strong> commented {{ $comment->created_at->diffForHumans() }}:</p>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
            <div class="pagination">
                {{-- Previous Button --}}
                @if ($comments->onFirstPage())
                    <a class="disabled"><span>&laquo; Previous</span></a>
                @else
                    <a href="{{ $comments->previousPageUrl() }}">&laquo; Previous</a>
                @endif

                {{-- Page Number Buttons --}}
                @foreach ($comments->getUrlRange(1, $comments->lastPage()) as $page => $url)
                    <a class="{{ $page == $comments->currentPage() ? 'active' : '' }}" href="{{ $url }}">{{ $page }}</a>
                @endforeach

                {{-- Next Button --}}
                @if ($comments->hasMorePages())
                    <a href="{{ $comments->nextPageUrl() }}">Next &raquo;</a>
                @else
                    <a class="disabled"><span>Next &raquo;</span></a>
                @endif
            </div>
            <h2>Scores from last 3 years:</h2>
            <div class="scores-container">
                @forelse($scores as $score)
                    <div class="score-card">
                        <p><strong>Driver:</strong> {{ $score->driver->name ?? 'Unknown' }}</p>
                        <p>2022: {{ $score->getAttribute('2022') }} ({{ $ranking[$score->id]['2022'] ?? '-' }})</p>
                        <p>2023: {{ $score->getAttribute('2023') }} ({{ $ranking[$score->id]['2023'] ?? '-' }})</p>
                        <p>2024: {{ $score->getAttribute('2024') }} ({{ $ranking[$score->id]['2024'] ?? '-' }})</p>
                    </div>
                @empty
                    <p>No scores available for this track yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>

@if(session('track_action') === 'updated')
<script>
    alert("Your favorite track has been updated!");
</script>
@endif