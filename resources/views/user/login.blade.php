<x-layout>
    <div>
        <h1>Login page</h1>
        <form action="/user/authenticate" method="POST">
            @csrf

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
            @error('email')
                {{ $message }}
            @enderror
            <br />
            <input type="password" name="password" placeholder="Password" />
            @error('password')
                {{ $message }}
            @enderror
            <br />
            @if (session()->has('message'))
                <div>
                    {{ session('message') }}
                </div>
            @endif
            <button type="submit">Login</button>
        </form>
        <a href="/user/register">Create an Account</a>
    </div>
</x-layout>
