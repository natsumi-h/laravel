<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tweet App</h1>
    <ul>
        @foreach ($tweets as $tweet)
        <li>{{$tweet->id}}:{{ $tweet->content }}</li>
        <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">Update</a>
        <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
            @method('DELETE')
            @csrf
            <button>DELETE</button>

        </form>
        @endforeach
    </ul>

    <form action="{{ route('tweet.create') }}" method="post">
        @csrf
        <textarea type="text" name="tweet" id="tweet-content"></textarea>
        @error('tweet')
        <p>{{ $message }}</p>
        @enderror
        <button type="submit">Tweet</button>
    </form>
</body>

</html>