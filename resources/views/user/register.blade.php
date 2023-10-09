<x-layout>
    <div>
        <h1>Create</h1>
        <form action="/user/create" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" />
            @error('name')
                {{ $message }}
            @enderror
            <br />
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
            <input type="password" name="password_confirmation" placeholder="Confirm Password" />
            @error('password_confirmation')
                {{ $message }}
            @enderror
            <br />
            <input type="submit" />
        </form>
    </div>
</x-layout>
