<x-layout>
    <div class="container">
        <form action="/user/update" method="POST">
            @csrf
            <br />
            <input type="text" name="password" placeholder="New Password" /><br /><br />
            @error('password')
                {{ $message }}
            @enderror
            <input type="text" name="password_confirmation" placeholder="Confirm New Password" /><br />
            @error('password_confirmation')
                {{ $message }}
            @enderror
            <br />
            <button type="submit">Update</button>
        </form>
        <br />
    </div>
</x-layout>
