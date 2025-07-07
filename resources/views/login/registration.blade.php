<x-layout title="Registration">
  <h1>Registration</h1>

  <form method="POST" action="/registration">
    @csrf
    <div class="drivers">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" />
    </div>
    <div class="drivers">
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" />
    </div>
    <div class="drivers">
      <label for="password">Password:</label>
      <input type="text" id="password" name="password" />
    </div>
    <input type="hidden" name="role_id" value="1" />
    <div class="buttons">
      <button type="submit">Register</button>
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