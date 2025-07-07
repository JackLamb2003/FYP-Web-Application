<x-layout title="Edit a drivers information">
    <h1>Edit the details for {{$driver->name}}</h1>
    <form action="/drivers" method="POST">
    @csrf
    @method('PATCH')
    <!--A hidden field contains the id number of the track -->
    <input type="hidden" name="id" value="{{$driver->id}}">
    <div class="drivers">
        <label for="name">Name:</label>
        <!-- The text boxes are populated with values from the database ready for the user to edit -->
        <input type="text" id="name" name="name" value="{{$driver->name}}">
    </div>
    <div class="drivers">
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" value="{{$driver->age}}">
    </div>
    <div class="drivers">
        <label for="car">Car:</label>
        <input type="text" id="car" name="car" value="{{$driver->car}}">
    </div>
    <div class="buttons">
        <button type="submit">Save Changes</button>
    </div>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</x-layout>