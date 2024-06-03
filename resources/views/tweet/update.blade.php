<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Update</h1>
    <div>
        <a href="{{ route('tweet.index') }}">back</a>
        @if (session('feedback.success'))
        <p>{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <textarea type="text" name="tweet" id="tweet-content">{{ $tweet->content }}</textarea>
            @error('tweet')
            <p>{{ $message }}</p>
            @enderror
            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>