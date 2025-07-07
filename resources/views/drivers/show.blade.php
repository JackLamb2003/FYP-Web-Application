<x-layout title="{{ $driver->name }}">
    <div class="center-container">
        <div class="drivers">
            <h1>{{$driver->name}}</h1>
            <p>Age: {{$driver->age}}</p>
            <p>Car: {{$driver->car}}</p> 
            @auth
            <form action="{{ route('driver.choice', $driver->id) }}" method="POST">
                @csrf
                <label>
                    <input type="checkbox" name="choice" value="1" 
                        @if(in_array($driver->id, $driverChoiceIds)) checked @endif>
                    Mark as Favorite
                </label>
                <button type="submit">Save</button>
            </form>
            @endauth
        </div>    
        @can('admin')
        <a class="buttons" href='/drivers/{{$driver->id}}/edit'>
            <button>Edit</button>
        </a>
        <form class="buttons" method='POST' action='/drivers'>
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$driver->id}}">
            <button type='submit'>Delete</button>
        </form>
        @endcan
    </div>
</x-layout>

@if(session('driver_action') === 'added')
<script>
    alert("Favorite driver has been added to your profile!");
</script>
@elseif(session('driver_action') === 'removed')
<script>
    alert("Favorite driver has been removed from your profile!");
</script>
@endif