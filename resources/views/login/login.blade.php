<x-layout title="Sign In">
    <h1>Sign In</h1>
    <form method="POST" action="/login">
        @csrf
        <div class="drivers">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" />
        </div>

        <div class="drivers">
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" />
        </div>
        <div class="buttons">
            <button type="submit">Sign in</button>
        </div>
    </form>
</x-layout>