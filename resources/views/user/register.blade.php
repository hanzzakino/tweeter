<x-layout>
    <div class="container-sm w-25">
        <h1>Create</h1>
        <form class="forgm-group" action="/user/create" method="POST">
            @csrf
            <input class="form-control w-75" type="text" name="name" placeholder="Name" value="{{ old('name') }}" />
            @error('name')
                {{ $message }}
            @enderror
            <br />
            <input class="form-control w-75" type="email" name="email" placeholder="Email"
                value="{{ old('email') }}" />
            @error('email')
                {{ $message }}
            @enderror
            <br />
            <input class="form-control w-75" type="password" name="password" placeholder="Password" />
            @error('password')
                {{ $message }}
            @enderror
            <br />
            <input class="form-control w-75" type="password" name="password_confirmation"
                placeholder="Confirm Password" />
            @error('password_confirmation')
                {{ $message }}
            @enderror
            <br />
            <button class="btn btn-primary" type="submit">Register</button>
        </form>
    </div>
</x-layout>
