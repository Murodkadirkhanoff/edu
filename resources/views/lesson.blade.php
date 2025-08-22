<x-layouts.instructor.layout>
{{-- Видео --}}
{{--<video id="lesson-video"--}}
{{--       class="plyr-lv w-100 d-none"></video>--}}

{{-- Текст --}}
{{--<div id="lesson-text" class="d-none">--}}
{{--    <div id="lesson-text-content" class="p-2"--}}
{{--         style="white-space: pre-line; font-size: 1.1rem;"></div>--}}
{{--</div>--}}
@php
    $mimitype = \Illuminate\Support\Facades\Storage::disk('wasabi')->mimeType($lesson->video->path);
    dd($mimitype)
@endphp
    <div class="video-container">
        <video
            id="lessonVideo"
            class="video-js vjs-default-skin"
            controls
            preload="auto"
            data-setup='{}'
        >
            <source src="/lessons/{{$lesson->id}}/stream" type="{{ $mimitype }}" />
            Your browser does not support HTML5 video.
        </video>
    </div>

    @push('scripts')
        <script>
            {{--let playerInstance = null; // Declare it globally so it's accessible throughout--}}

            {{--document.addEventListener('DOMContentLoaded', () => {--}}
            {{--    // Initialize the player only once--}}
            {{--    const player = new Plyr('#lesson-video', {--}}
            {{--        fullscreen: {--}}
            {{--            enabled: true,--}}
            {{--            fallback: true,--}}
            {{--            iosNative: false--}}
            {{--        },--}}
            {{--        controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'],--}}
            {{--        settings: ['captions', 'quality', 'speed', 'loop']--}}
            {{--    });--}}


            {{--    const video = document.getElementById('lesson-video');--}}
            {{--    video.innerHTML = '';--}}
            {{--    // Using a demo video for this example--}}
            {{--    const streamUrl = `/lessons/{{$lesson->id}}/stream`;--}}
            {{--    console.log(streamUrl);--}}
            {{--    const source = document.createElement('source');--}}
            {{--    source.src = streamUrl;--}}
            {{--    source.type = 'video/x-msvideo';--}}
            {{--    video.appendChild(source);--}}
            {{--    video.load();--}}

            {{--    setTimeout(() => {--}}
            {{--        playerInstance = new Plyr(video, {--}}
            {{--            controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen']--}}
            {{--        });--}}
            {{--        video.classList.remove('d-none');--}}
            {{--    }, 100);--}}

            {{--});--}}
            const player = videojs('lessonVideo', {
                controls: true,
                autoplay: false,
                preload: 'auto',
                fluid: true
            });

            player.ready(function() {
                console.log('Video.js is ready');
            });
        </script>
    @endpush
</x-layouts.instructor.layout>
