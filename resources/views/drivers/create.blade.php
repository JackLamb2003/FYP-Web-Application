<x-layout title="Add a new driver">
  <h1>Add a new driver</h1>

  <form method="POST" action="/drivers">
    @csrf
    <div class="drivers">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" />
    </div>
    <div class="drivers">
      <label for="age">Age:</label>
      <input type="text" id="age" name="age" />
    </div>
    <div class="drivers">
      <label for="car">Car:</label>
      <input type="text" id="car" name="car" />
    </div>
    <div class="buttons">
      <button type="submit">Save the Driver</button>
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