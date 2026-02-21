<form method="POST" action="{{ url('/register') }}">
    @csrf

    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
    @error('name')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
    @error('email')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <input type="password" name="password" placeholder="Password" required>
    @error('password')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

    <button type="submit">Register</button>
</form>