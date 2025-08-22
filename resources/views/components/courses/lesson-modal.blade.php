<div>
{{--    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-xl">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header bg-dark-secondary-soft bg-gradient-to-b border-0">--}}
{{--                    <div class="w-100">--}}
{{--                        <!-- Title -->--}}
{{--                        <nav aria-label="breadcrumb">--}}
{{--                            <ol class="breadcrumb text-dark-emphasis">--}}
{{--                                <li class="breadcrumb-item active course-title" aria-current="page"></li>--}}
{{--                                <li class="breadcrumb-item active module-title" aria-current="page"></li>--}}
{{--                                <li class="breadcrumb-item active lesson-title" aria-current="page"></li>--}}
{{--                            </ol>--}}
{{--                        </nav>--}}

{{--                        <!-- Meta info -->--}}
{{--                        <div class="d-flex flex-wrap gap-3 small text-dark-emphasis">--}}
{{--                            <span><i class="bi bi-person "></i><span class="lesson-author"></span></span>--}}
{{--                            <span><i class="bi bi-clock"></i><span class=" lesson-duration"></span></span>--}}
{{--                            <span><i class="bi bi-cash"></i><span class="lesson-price"></span></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Close button -->--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}

{{--                <div class="modal-body">--}}
{{--                    --}}{{-- Видео --}}
{{--                    <video id="lesson-video"--}}
{{--                           class="plyr-lv w-100 d-none"></video>--}}

{{--                    --}}{{-- Текст --}}
{{--                    <div id="lesson-text" class="d-none">--}}
{{--                        <div id="lesson-text-content" class="p-2"--}}
{{--                             style="white-space: pre-line; font-size: 1.1rem;"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoTitle">Видео</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <video id="lessonVideo" controls style="width:100%; height: 80vh">
                        <source src="" type="video/mp4">
                        Ваш браузер не поддерживает видео.
                    </video>
                </div>
            </div>
        </div>
    </div>

</div>

@push('styles')
    <style>
        #lesson-video {
            height: 80vh;
            max-height: 100vh;
            border-radius: 8px;
            object-fit: contain;
        }

        /* Fullscreen override */
        #lesson-video:fullscreen {
            height: 100%;
            max-height: 100%;
            width: 100%;
            border-radius: 0;
        }
    </style>
@endpush
{{-- Скрипт для модала --}}
@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const video = document.getElementById('lessonVideo');
            const source = video.querySelector('source');

            document.querySelectorAll('.open-video').forEach(button => {
                button.addEventListener('click', () => {
                    const path = button.getAttribute('data-path');
                    const title = button.getAttribute('data-title');
                    const lessonId = button.getAttribute('data-lessonid');
                    const streamUrl = `/lessons/${lessonId}/stream`;
                    source.setAttribute('src', streamUrl);

                    video.load();
                    video.play();

                    document.getElementById('videoTitle').innerText = title;

                    new bootstrap.Modal(document.getElementById('videoModal')).show();
                });
            });

            // При закрытии модалки — стопим видео
            document.getElementById('videoModal').addEventListener('hidden.bs.modal', () => {
                video.pause();
                video.currentTime = 0; // сброс на начало
            });
        });
    </script>


    {{--    <script>--}}
{{--        let playerInstance = null; // Declare it globally so it's accessible throughout--}}

{{--        document.addEventListener('DOMContentLoaded', () => {--}}
{{--            // Initialize the player only once--}}
{{--            const player = new Plyr('#lesson-video', {--}}
{{--                fullscreen: {--}}
{{--                    enabled: true,--}}
{{--                    fallback: true,--}}
{{--                    iosNative: false--}}
{{--                },--}}
{{--                controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'],--}}
{{--                settings: ['captions', 'quality', 'speed', 'loop']--}}
{{--            });--}}

{{--            // Handle fullscreen--}}
{{--            player.on('enterfullscreen', event => {--}}
{{--                const video = event.detail.plyr.media;--}}
{{--                video.style.height = '100%';--}}
{{--                video.style.maxHeight = '100%';--}}
{{--                video.style.width = '100%';--}}
{{--                video.style.borderRadius = '0';--}}
{{--            });--}}

{{--            player.on('exitfullscreen', event => {--}}
{{--                const video = event.detail.plyr.media;--}}
{{--                video.style.height = '80vh';--}}
{{--                video.style.maxHeight = '100vh';--}}
{{--                video.style.width = '100%';--}}
{{--                video.style.borderRadius = '8px';--}}
{{--            });--}}

{{--            // Modal cleanup after closing--}}
{{--            const modalEl = document.getElementById('videoModal');--}}
{{--            modalEl.addEventListener('hidden.bs.modal', function () {--}}
{{--                if (playerInstance) {--}}
{{--                    playerInstance.destroy();--}}
{{--                    playerInstance = null;--}}
{{--                }--}}

{{--                // Clear the video source--}}
{{--                const video = document.getElementById('lesson-video');--}}
{{--                video.src = '';--}}
{{--                video.load();--}}
{{--            });--}}
{{--        });--}}

{{--        // Open Lesson--}}
{{--        function openLessonFromElement(el) {--}}
{{--            const id = el.dataset.lessonId;--}}
{{--            const type = el.dataset.lessonType;--}}
{{--            const base64Content = el.dataset.lessonContentBase64;--}}
{{--            const content = base64Content ? atob(base64Content) : null;--}}

{{--            openLessonModal(el, id, type, content);--}}
{{--        }--}}

{{--        // Open modal and load content--}}
{{--        function openLessonModal(element, lessonId, type, textContent = null) {--}}
{{--            const video = document.getElementById('lesson-video');--}}
{{--            const textContainer = document.getElementById('lesson-text');--}}
{{--            const textContentDiv = document.getElementById('lesson-text-content');--}}
{{--            const title = element.getAttribute('data-title');--}}
{{--            const author = element.getAttribute('data-author');--}}
{{--            const duration = element.getAttribute('data-duration');--}}
{{--            const price = element.getAttribute('data-price');--}}
{{--            const lessonTitle = element.getAttribute('data-lesson-title');--}}
{{--            const moduleTitle = element.getAttribute('data-module-title');--}}
{{--            const courseTitle = element.getAttribute('data-course-title');--}}

{{--            const path = button.getAttribute('data-path');--}}



{{--            const modal = document.getElementById('videoModal');--}}

{{--            // Populate modal metadata--}}
{{--            modal.querySelector('.lesson-title').innerText = title;--}}
{{--            modal.querySelector('.lesson-author').innerText = " " + author;--}}
{{--            modal.querySelector('.lesson-duration').innerText = " " + duration + " seconds";--}}
{{--            modal.querySelector('.lesson-price').innerText = " " + price;--}}
{{--            modal.querySelector('.lesson-title').innerText = " " + lessonTitle;--}}
{{--            modal.querySelector('.module-title').innerText = " " + moduleTitle;--}}
{{--            modal.querySelector('.course-title').innerText = " " + courseTitle;--}}

{{--            // Hide both containers initially--}}
{{--            video.classList.add('d-none');--}}
{{--            textContainer.classList.add('d-none');--}}

{{--            // Destroy old player instance if it exists--}}
{{--            if (playerInstance) {--}}
{{--                playerInstance.destroy();--}}
{{--                playerInstance = null;--}}
{{--            }--}}

{{--            // Load video or text--}}
{{--            if (type === 'video') {--}}
{{--                video.innerHTML = '';--}}
{{--                // Using a demo video for this example--}}
{{--                const streamUrl = `/lessons/${lessonId}/stream`;--}}

{{--                const source = document.createElement('source');--}}
{{--                source.src = path;--}}
{{--               // source.type = 'video/mp4';--}}
{{--                video.appendChild(source);--}}
{{--                video.load();--}}

{{--                setTimeout(() => {--}}
{{--                    playerInstance = new Plyr(video, {--}}
{{--                        controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen']--}}
{{--                    });--}}
{{--                    video.classList.remove('d-none');--}}
{{--                }, 100);--}}
{{--            }--}}

{{--            else if (type === 'text') {--}}
{{--                textContentDiv.innerHTML = textContent || '<p>No content available</p>';--}}
{{--                textContainer.classList.remove('d-none');--}}
{{--            }--}}

{{--            // Show the modal--}}
{{--            new bootstrap.Modal(modal).show();--}}
{{--        }--}}

{{--        // Demo function to open a lesson--}}
{{--        function openDemoLesson() {--}}
{{--            const demoElement = document.createElement('div');--}}
{{--            demoElement.setAttribute('data-title', 'Introduction to Web Development');--}}
{{--            demoElement.setAttribute('data-created', '2023-05-15');--}}
{{--            demoElement.setAttribute('data-author', 'John Smith');--}}
{{--            demoElement.setAttribute('data-duration', '360');--}}
{{--            demoElement.setAttribute('data-price', '25000');--}}

{{--            openLessonModal(demoElement, 1, 'video');--}}
{{--        }--}}
{{--    </script>--}}


@endpush

