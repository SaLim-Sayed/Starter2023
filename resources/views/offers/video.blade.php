@extends('layout')

@section('content')
    <div class="container my-5 w-50  text-center card">
        <h2>Video Viewer ({{ $video ->viewers}})</h2>
        <iframe  height="315" src="https://www.youtube.com/embed/zRz_Bte-ihI" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </div>
@endsection
