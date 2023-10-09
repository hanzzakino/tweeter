<x-layout>
    <div>
        <form action="/user/update" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" />
            @error('name')
                {{ $message }}
            @enderror
            <br />
            <button type="submit">Update</button>
        </form>
        <br />
    </div>
</x-layout>
