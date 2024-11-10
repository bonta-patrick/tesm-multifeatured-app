<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    @vite('resources/css/app.css')
    <script>
        tailwind.config = {
          theme: {
            fontFamily: {
              mono: ['Black Ops One', 'monospace'],
            },
          },
        }
      </script>
</head>
<body>
    <div class="md:hidden">
       <section id="home-page" class="flex flex-col bg-black min-h-screen overflow-auto">

        
        <div class="flex flex-row justify-between items-center border-b border-white w-full px-4 h-18">
          <h1 class="py-6 px-4 font-bold text-white text-2xl">Comments for {{$post->user->username}}'s post</h1>
          <i class="text-white text-4xl pr-4 bi bi-plus" title="Add a comment" onclick="revealCommentBox()"></i>
        </div>


        <div class="flex flex-row border-b border-slate-200 w-lg">
          <p class="p-6 text-md text-slate-500">Try to respect our guideline in terms of leaving comments.</p>
        </div>

        <div class="hidden flex flex-row p-10 items-start justify-start space-x-5" id="commentBox">
            <form action="/create-new-comment/{{$post->id}}" method="POST">
                @csrf
              <div class="flex flex-row items-center">
                <img src="{{auth()->user()->avatarsrc}}" alt="" class="rounded rounded-lg" style="height: 65px; width: 65px;">
                <input name="content" type="text" class="border-b-2 max-w-md border-slate-500 py-2 px-2 text-white bg-black ml-5" placeholder="Type your comment...">
                <button type="submit" class="bg-black py-2 px-2 ml-6 text-white">Create</button>
              </div>
            </form>
        </div>

        @foreach($post->getComments()->latest()->get() as $comment)
        <div class="flex flex-col py-6 px-4 w-{130px} ml-4 mr-4 my-4 bg-slate-900 rounded rounded-md">
            <div class="flex flex-row mb-6 border-b border-white">
                <div class="flex flex-row space-x-4 items-center justify-center">
                  <img src="{{$comment->user->avatarsrc}}" alt="" class="rounded rounded-full mb-5" style="height: 30px; width: 30px;">
                  <h1 class="text-white font-medium text-lg -mt-4">{{$comment->user->username}}</h1>
                </div>
            </div>
            <p class="text-white text-md pb-4">{{$comment->content}}</p>
            <div class="flex flex-row space-x-8 items-center mt-6 mx-4">
                <div class="flex flex-row items-center justify-center space-x-4">
                    <i class="bi bi-heart text-white text-xl"></i>
                    <p class="text-white text-md font-bold">212</p>
                 </div>
                 <div class="flex flex-row items-center justify-center space-x-4">
                     <i class="bi bi-chat-left text-white text-xl"></i>
                     <p class="text-white text-md font-bold">134</p>
                 </div>
                <i class="bi bi-send-plus text-white text-xl"></i>
            </div>
        </div>
        @endforeach

        

        <div class="h-24 w-full"></div>



        <div class="fixed bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600">
            <div class="grid h-full max-w-lg grid-cols-4 mx-auto font-medium">
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-2 text-gray-800 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <i class="bi bi-plus-circle -mt-3 text-2xl"></i>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2"/>
                    </svg>
                </button>
                <button type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <img src="{{auth()->user()->avatarsrc}}" alt="" class="rounded rounded-lg" style="height: 30px; width: 30px;">
                </button>
            </div>
        </div>

       </section>
    </div>

    <script>
        let cbox = document.getElementById('commentBox');
        function revealCommentBox() {
            cbox.classList.remove('hidden');
        }
    </script>
</body>
</html>