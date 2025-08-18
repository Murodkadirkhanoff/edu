@props([
    'title'
])

<div>
    <div class="modal fade" id="videoModal  " tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title  }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Ёпиш"></button>
                </div>
                <div class="modal-body">
                    {{-- Видео --}}
                    <video id="lesson-video" class="plyr w-100 d-none"
                           style="max-height: 80vh; border-radius: 8px; object-fit: contain" controls></video>


                    {{-- Текст --}}
                    <div id="lesson-text" class="d-none">
                        <div id="lesson-text-content" class="p-2"
                             style="white-space: pre-line; font-size: 1.1rem;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Скрипт для модала --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const player = new Plyr('#video-player', {
                    controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
                });
            });

        </script>

        <script>
            let playerInstance = null;

            function openLessonFromElement(el) {
                const id = el.dataset.lessonId;
                const type = el.dataset.lessonType;
                const base64Content = el.dataset.lessonContentBase64;
                const content = base64Content ? atob(base64Content) : null;

                openLessonModal(id, type, content);
            }

            function openLessonModal(lessonId, type, textContent = null) {
                const video = document.getElementById('lesson-video');
                const textContainer = document.getElementById('lesson-text');
                const textContentDiv = document.getElementById('lesson-text-content');

                // Скрыть оба контейнера
                video.classList.add('d-none');
                textContainer.classList.add('d-none');

                // Уничтожить старый плеер
                if (playerInstance) {
                    playerInstance.destroy();
                    playerInstance = null;
                }

                if (type === 'video') {
                    video.innerHTML = '';
                    const streamUrl = `/lessons/${lessonId}/stream`;
                    const source = document.createElement('source');
                    source.src = streamUrl;
                    source.type = 'video/mp4';
                    video.appendChild(source);
                    video.load();

                    setTimeout(() => {
                        playerInstance = new Plyr(video, {});
                        video.classList.remove('d-none');
                    }, 100);
                }
                else if (type === 'text') {
                    textContentDiv.innerHTML = textContent || '<p>Нет контента</p>';
                    textContainer.classList.remove('d-none');
                }

                new bootstrap.Modal(document.getElementById('videoModal')).show();
            }

            // При закрытии модала — сбрасываем плеер
            document.addEventListener('DOMContentLoaded', function () {
                const modalEl = document.getElementById('videoModal');

                modalEl.addEventListener('hidden.bs.modal', function () {
                    const video = document.getElementById('lesson-video');

                    if (playerInstance) {
                        playerInstance.pause();
                        playerInstance.stop();
                        playerInstance.destroy();
                        playerInstance = null;
                    }

                    video.innerHTML = '';
                });
            });

        </script>
    @endpush
</div>
