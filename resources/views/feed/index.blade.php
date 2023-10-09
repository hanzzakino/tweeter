<x-layout>
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <div>
                <h1 class="mb-4">Hello {{ auth()->user()->name }},</h1>
            </div>
            <div class="d-flex">
                <div><a href="/user/edit">Account</a></div>
                <div>
                    <form action="/user/logout" method="GET">
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>







        <h1>Tweets</h1>
        <div class="card p-3 form-group">
            <form class="mb-3" method="POST" action="feed/create">
                @csrf
                <label for="content">Create Post</label><br />
                <textarea class="form-control" id="content" name="content"></textarea><br />
                <button class="btn btn-primary" type="submit">Post</button>
            </form>
        </div>


        @foreach ($tweets as $tweet)
            <div class="mb-4 d-flex flex-row w-100 align-items-center justify-content-center">
                <div class="w-75 card p-3">
                    <h3>{{ $tweet->creator_name }}:</h3>
                    <p>{{ $tweet->created_at }}</p>
                    <p>{{ $tweet->content }}</p>
                    <div style="transform: translateX(-15px)" class="position-absolute top-25 end-0">
                        @if (auth()->user()->id == $tweet->creator_id)
                            <form method="POST" action="feed/{{ $tweet->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-light" type="Delete"><i class="bi-trash"></i></button>
                            </form>
                        @endif
                    </div>
                    <div class="align-self-end">
                        <form method="POST" action="feed/like/{{ $tweet->id }}">
                            @csrf
                            <button class="btn btn-light" type="Submit"><i class="bi bi-heart-fill"></i></button>
                        </form>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</x-layout>
