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
        <div class="card shadow p-3 mb-4 form-group">
            <form class="mb-3" method="POST" action="feed/create">
                @csrf
                <label for="content">Create Post</label><br />
                <textarea class="form-control" id="content" name="content"></textarea><br />
                <button class="btn btn-primary" type="submit">Post</button>
            </form>
        </div>


        @foreach ($tweets as $tweet)
            <div class="mt-4 mb-4 d-flex flex-row w-100 align-items-center justify-content-center">
                <div class="w-75 shadow card p-3">
                    <h3>{{ $tweet->creator_name }}:</h3>
                    <p>{{ date_format(date_create($tweet->created_at), 'M d, Y') }}</p><br />
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

                        @php
                            $isUserLiked = 'black';
                            $count = 0;
                            foreach ($tweet_likes as $tweet_like) {
                                if ($tweet->id == $tweet_like->tweet_id) {
                                    $count += 1;
                                    if (auth()->user()->id == $tweet_like->liker_id) {
                                        $isUserLiked = 'red';
                                    }
                                }
                            }
                        @endphp

                        <div class="d-flex flex-row align-items-center">
                            <div>
                                <p class="m-0">{{ $count }}</p>
                            </div>
                            <div>
                                <form method="POST" action="/feed/like/{{ $tweet->id }}">
                                    @csrf
                                    <button class="btn btn-light" type="submit"><i style="color: {{ $isUserLiked }};"
                                            class="bi bi-heart-fill"></i></button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</x-layout>
