<div class="fixed bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600">
    <div class="grid h-full max-w-lg grid-cols-4 mx-auto font-medium">
        <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group" onclick="location.href='/'">
            <svg class="w-5 h-5 mb-2 text-gray-800 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
        </button>
        <button type="submit" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group" data-modal-target="defaultModal" data-modal-toggle="defaultModal">
            <i class="bi bi-plus-circle -mt-3 text-2xl"></i>
        </button>
        <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group" onclick="location.href='/channels/{{auth()->user()->id}}'">
            <i class="bi bi-chat-left-dots-fill -mt-3 text-2xl"></i>
        </button>
        <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group" onclick="location.href='/profile'">
            <img src="{{auth()->user()->avatarsrc}}" alt="" class="rounded rounded-lg" style="height: 30px; width: 30px;">
        </button>
    </div>
</div>