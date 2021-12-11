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
        <div id="videoElementDiv" class="col-span-3">
            <video id="videoElement" controls></video>
        </div>
        <div class="col-span-1">
            @livewire('watch.live.chat', ['channel' => '#' . strtolower($liveStream->publisher)])
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script src="https://cdn.bootcss.com/flv.js/1.5.0/flv.min.js"></script>

    <script>
        var videoElement = document.getElementById('videoElement');

        var sourceURL = '{{ "http://" . env("RTMP_HOST") . ":" . env("RTMP_PORT") . "/live/" . $liveStream->publisher}}';

        if (Hls.isSupported()) {
            var videoSrc = sourceURL + '/index.m3u8';

            console.log('Using hls.js (HLS) as the player, videoSrc: ', videoSrc);

            var hls = new Hls();

            hls.attachMedia(videoElement);

            hls.on(Hls.Events.MEDIA_ATTACHED, function () {
                console.log('videoElement and hls.js are now bound together !');

                hls.loadSource(videoSrc);

                hls.on(Hls.Events.MANIFEST_PARSED, function (event, data) {
                    console.log(
                        'manifest loaded, found ' + data.levels.length + ' quality level'
                    );
                });
            });

            videoElement.play();
        }
        else if (videoElement.canPlayType('application/vnd.apple.mpegurl')) {
            var videoSrc = sourceURL + '/index.m3u8';

            console.log('Using Native Playback (HLS on Safari) as the player, videoSrc: ', videoSrc);

            videoElement.src = videoSrc;

            videoElement.play();
        }
        else if (flvjs.isSupported()) {
            var videoSrc = sourceURL + '.flv';

            console.log('Using flv.js (FLV) as the player, videoSrc: ', videoSrc);

            var flvPlayer = flvjs.createPlayer({
                type: 'flv',
                url: videoSrc
            });

            flvPlayer.attachMediaElement(videoElement);
            flvPlayer.load();
            flvPlayer.play();
        }
        else {
            console.log('Could not find a suitable player for this device.');

            alert('This device is unable to play livestreams in Albicant.');

            document.getElementById('videoElementDiv').write('Could not find a suitable player for this device. This device is unable to play livestreams in Albicant.');
        }
    </script>
@endsection

@section('page_sidebar')
    <h1 class="text-xl">{{$liveStream->title}}</h1>
@endsection
