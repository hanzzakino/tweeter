<x-layout>
    <div class="container-sm w-25">
        <h1>Login page</h1>
        <br />
        <form class="forgm-group" action="/user/authenticate" method="POST">
            @csrf

            <input class="form-control w-75" type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
            @error('email')
                {{ $message }}
            @enderror
            <br />
            <input class="form-control w-75" type="password" name="password" placeholder="Password" />
            @error('password')
                {{ $message }}
            @enderror
            <br />
            @if (session()->has('message'))
                <div>
                    {{ session('message') }}
                </div>
            @endif
            <button class="btn btn-primary" type="submit">Login</button>
        </form><br />
        <a href="/user/register">Create an Account</a>
    </div>
</x-layout>
