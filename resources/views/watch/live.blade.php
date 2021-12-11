<?php $liveStream = json_decode($_GET['liveStream']) ?>

@extends('layouts.app')

@section('page_title')
    Livestream - {{$liveStream->publisher}}
@endsection

@section('page_navbar')
    @parent
@endsection

@section('page_content')
    <div class="grid gap-4 grid-cols-4 grid-rows-1" style="width: 1280px;">
        <div class="col-span-3">
            <div class="grid gap-2 grid-cols-1 grid-rows-2">
                <video id="videoElement" controls></video>
                <div class="h-20">
                    <div class="grid gap-1 grid-cols-2 grid-rows-1">
                        <button onclick="resetPlayer();" class="btn-primary">Reset Player (Skip to live)</button>
                        <button onclick="stopPlayer();" class="btn-primary">Stop Player</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1">
            @livewire('watch.live.chat', ['channel' => '#' . strtolower($liveStream->publisher)])
        </div>
    </div>

    <script src="https://cdn.bootcss.com/flv.js/1.5.0/flv.min.js"></script>
    <script>
        if (flvjs.isSupported()) {
            var videoElement = document.getElementById('videoElement');

            var flvPlayer = flvjs.createPlayer({
                type: 'flv',
                url: '{{'http://' . env('RTMP_HOST') . ':' . env('RTMP_PORT') . '/live/' . $liveStream->publisher . '.flv'}}'
            });

            flvPlayer.attachMediaElement(videoElement);
            flvPlayer.load();
            flvPlayer.play();
        }
        function resetPlayer()
        {
            flvPlayer.unload();
            flvPlayer.load();
            flvPlayer.play();
        }
        function stopPlayer()
        {
            flvPlayer.unload();
        }
    </script>
@endsection

@section('page_sidebar')
    <h1 class="text-xl">{{$liveStream->title}}</h1>
@endsection
