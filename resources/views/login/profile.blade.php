<x-layout title="Profile">
    <div class="profile-wrap">
        <div class="drivers">
            <h1>{{ $user->name }}'s Profile</h1>
            <p>Email: {{ $user->email }}</p>
            @if ($user->created_at)
                <p>Joined: {{ $user->created_at->format('F j, Y') }}</p>
            @else
                <p>Joined: Unknown</p>
            @endif
            <h2>Supported Drivers</h2>
            @if($drivers->isEmpty())
                <p>You haven't selected any favorite drivers yet.</p>
            @else
                @foreach($drivers as $driver)
                    <p>{{ $driver->name }}</p>
                @endforeach
            @endif
            <h2>Favourite Track</h2>
            @if($favoriteTrack)
                <p>Your favorite event is: {{$favoriteTrack->title}} located at {{ ucwords(strtolower($favoriteTrack->location)) }}.</p>
            @else
            <p>You haven't selected a favourite track yet.</p>
            @endif
        </div>
    </div>
</x-layout>