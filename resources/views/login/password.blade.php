<x-layout title="Password Reset">
    <h1>Reset Your Password</h1>
    <form action="/password" method="POST">
        @csrf
        <div class="drivers">
            <p>Please enter the details required to reset your passowrd</p>
        </div>
        <div class="drivers">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" />
        </div>
        <div class="drivers">
            <label for="current_password">Current Password:</label>
            <input type="text" id="current_password" name="current_password" />
        </div>
        <div class="drivers">
            <label for="new_password">New Password:</label>
            <input type="text" id="new_password" name="new_password" />
        </div>
        <div class="drivers">
            <button type="submit">Reset Password</button>
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