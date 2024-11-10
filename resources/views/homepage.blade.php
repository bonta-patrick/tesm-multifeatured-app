<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
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
      <style>
        ::-webkit-scrollbar {
            width: 14px;
        }

        ::-webkit-scrollbar-track {
            background: #fff;
        }

        ::-webkit-scrollbar-thumb {
            background: #0EA5E9;
            border-radius: 16px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
      </style>
</head>
<body>
    <div id="home">
    <div class="md:hidden">
       <section class="flex flex-row items-center justify-center min-h-screen bg-blue-400">
          <div class="flex flex-col items-center justify-between space-y-4">
             <h1 class="text-5xl font-mono font-bold text-white">TESM</h1>
             <a href="#home-page"><i class="text-3xl text-white bi bi-arrow-down"></i></a>
          </div>
       </section>
       <section id="home-page" class="flex flex-col bg-black min-h-screen overflow-auto">

        
        <div class="flex flex-row justify-between items-center border-b border-white w-full px-4 h-18">
          <h1 class="py-6 px-4 font-bold text-white text-2xl">Main Feed</h1>
          <i class="text-white text-2xl pr-4 bi bi-bell"></i>
        </div>


        <div class="flex flex-row border-b border-slate-200 w-lg">
          <p class="p-6 text-md text-slate-500">See all posts from the ones that you are following</p>
        </div>

        @foreach ($posts as $post)
           <div class="flex flex-col py-6 px-4 w-{130px} ml-4 mr-4 my-4 bg-slate-900 rounded rounded-md">
            <div class="flex flex-col">
                <div class="flex flex-row mb-6 border-b border-white">
                    <div class="flex flex-row space-x-4 items-center justify-center">
                      <img src="{{$post->user->avatarsrc}}" alt="" class="rounded rounded-lg mb-5" height="45px" width="45px">
                      <h1 class="text-white font-medium text-xl -mt-4">{{$post->user->username}}</h1>
                    </div>
                </div>
                <img src="/storage/posts/{{$post->imagesrc}}" alt="" class="rounded rounded-md" height="400px" width="600px">
                <p class="py-6 text-white max-w-xl">{{$post->captions}}</p>
                <div class="flex flex-row space-x-8 items-center mt-6 mx-4">
                    @if(auth()->user()->likedThisPost($post->id) == false)
                    <form action="/create-like/{{$post->id}}" method="POST" id="likeform">
                        @csrf
                    <div class="flex flex-row items-center justify-center space-x-4">
                       <i class="bi bi-heart text-white text-xl" onclick="changeLayoutLikeLive(event)"></i>
                       <p class="text-white text-lg font-bold">{{$post->likes->count()}}</p>
                    </div>
                    </form>
                    @endif
                    @if(auth()->user()->likedThisPost($post->id))
                    <form action="/remove-like/{{$post->id}}" method="POST" id="unlikeform">
                        @csrf
                    <div class="flex flex-row items-center justify-center space-x-4">
                       <i class="bi bi-heart-fill text-white text-xl" onclick="changeLayoutUnlikeLive(event)"></i>
                       <p class="text-white text-lg font-bold">{{$post->likes->count()}}</p>
                    </div>
                    </form>
                    @endif
                    <div class="flex flex-row items-center justify-center space-x-4">
                        <a href="/comments/{{$post->id}}"><i class="bi bi-chat-left text-white text-xl"></i></a>
                        <p class="text-white text-lg font-bold">{{$post->getComments->count()}}</p>
                    </div>
                    <i class="bi bi-send-plus text-white text-xl"></i>
                </div>
            </div>
        </div>
        @endforeach

        <div class="h-24 w-full"></div>

        <x-mobile-navbar></x-mobile-navbar>

       </section>
    </div>

    <div class="hidden md:block">
        <section id="home" class="flex flex-row items-start justify-between bg-black min-h-screen">
            <div class="bg-black rounded rounded-lg h-[100vh] p-10">
                <h1 class="text-4xl lg:text-5xl font-mono font-bold text-blue-400">TESM</h1>

                <div class="flex flex-col mt-32 space-y-12">
                    <a href="#" class="flex flex-row space-x-4 items-center justify-center">
                        <i class="text-2xl text-white bi bi-house-fill -mt-2"></i>
                      <p class="text-2xl text-white font-bold">Home</p>
                    </a>
                    <a data-modal-target="searchContainer" data-modal-toggle="searchContainer" href="#" class="flex flex-row space-x-4 items-center justify-center">
                        <i class="text-2xl text-white bi bi-search -mt-2"></i>
                      <p class="text-2xl text-white font-bold">Search</p>
                    </a>
                    <a href="#" class="flex flex-row space-x-4 items-center justify-center">
                        <i class="text-2xl text-white bi bi-heart -mt-2"></i>
                      <p class="text-2xl text-white font-bold">Notifs</p>
                    </a>
                    <a href="/channels/{{auth()->user()->id}}" class="flex flex-row space-x-4 items-center justify-center">
                        <i class="text-2xl text-white bi bi-chat-left-dots-fill -mt-2"></i>
                      <p class="text-2xl text-white font-bold">Channels</p>
                    </a>
                    <a href="/profile" class="flex flex-row space-x-4 items-center justify-center">
                        <img src="{{auth()->user()->avatarsrc}}" alt="" class="rounded rounded-lg" height="30px" width="30px">
                      <p class="text-2xl text-white font-bold">Profile</p>
                    </a>
                </div>
           </div>

           <div class="flex flex-col overflow-auto h-[100vh] lg:border-l-2 lg:border-white lg:border-r-2 lg:border-white">
            <h1 class="py-6 px-4 font-bold text-white text-2xl">Posts for you</h1>
            <p class="py-2 px-4 text-md text-slate-500">In this feed you can see the posts from the users that you follow.</p>
            <div class="flex flex-row items-center justify-center py-6 px-4 ml-4 mr-4 my-8 bg-gradient-to-r from-blue-400 to-blue-700 rounded rounded-md">
                <button type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="bg-transparent text-white font-mono font-bold">Upload Now</button>
            </div>

            @foreach ($posts as $post)
           <div class="flex flex-col py-6 px-4 w-{130px} ml-4 mr-4 my-4 bg-slate-900 rounded rounded-md post-element" id="{{$post->id}}">
            <div class="flex flex-col">
                <div class="flex flex-row mb-6 border-b border-white">
                    <div class="flex flex-row space-x-4 items-center justify-center">
                      <img src="{{$post->user->avatarsrc}}" alt="" class="rounded rounded-lg mb-5" style="height: 45px; width: 45px;">
                      <h1 class="text-white font-medium text-xl -mt-4">{{$post->user->username}}</h1>
                    </div>
                </div>
                <img src="./storage/posts/{{$post->imagesrc}}" alt="" class="rounded rounded-md" style="height: 400px; width: 600px;">
                <p class="py-6 text-white max-w-xl">{{$post->captions}}</p>
                <div class="flex flex-row space-x-8 items-center mt-6 mx-4">
                    @if(auth()->user()->likedThisPost($post->id) == false)
                    <form action="/create-like/{{$post->id}}" method="POST" id="likeform">
                        @csrf
                    <div class="flex flex-row items-center justify-center space-x-4">
                       <i class="bi bi-heart text-white text-xl" onclick="changeLayoutLikeLive(event)"></i>
                       <p class="text-white text-lg font-bold">{{$post->likes->count()}}</p>
                    </div>
                    </form>
                    @endif
                    @if(auth()->user()->likedThisPost($post->id))
                    <form action="/remove-like/{{$post->id}}" method="POST" id="unlikeform">
                        @csrf
                    <div class="flex flex-row items-center justify-center space-x-4">
                       <i class="bi bi-heart-fill text-white text-xl" onclick="changeLayoutUnlikeLive(event)"></i>
                       <p class="text-white text-lg font-bold">{{$post->likes->count()}}</p>
                    </div>
                    </form>
                    @endif
                    <div class="flex flex-row items-center justify-center space-x-4">
                        <a data-modal-target="commentSection-{{$post->id}}" data-modal-toggle="commentSection-{{$post->id}}" href="#"><i class="bi bi-chat-left text-white text-xl"></i></a>
                        <p class="text-white text-lg font-bold">{{$post->getComments->count()}}</p>
                    </div>
                    <i class="bi bi-send-plus text-white text-xl"></i>
                </div>
            </div>
        </div>

        <div id="commentSection-{{$post->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-slate-800 rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-white dark:text-white">
                            Comments {{$post->getComments()->count()}}
                        </h3>
                        <i class="text-white text-2xl -mt-1 pl-6 pr-4 bi bi-plus" title="Add a comment" onclick="document.getElementById('commentBox-{{$post->id}}').classList.remove('hidden');"></i>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="commentSection-{{$post->id}}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="flex flex-col p-6 space-y-6 h-[60vh] overflow-auto">
                        <div class="hidden flex flex-row p-10 items-start justify-start space-x-5" id="commentBox-{{$post->id}}">
                            <form action="/create-new-comment/{{$post->id}}" id="commentForm" method="POST">
                                @csrf
                            <div class="flex flex-row items-center">
                                <img src="{{auth()->user()->avatarsrc}}" alt="" class="rounded rounded-lg" height="65px" width="65px">
                                <input name="content" type="text" class="border-b-2 max-w-md border-slate-500 py-2 px-2 text-white bg-slate-800 ml-5" placeholder="Type your comment..." v-model="commentBox">
                                <button type="submit" class="bg-slate-800 py-2 px-2 ml-6 text-white">Create</button>
                            </div>
                            </form>
                        </div>

                        @foreach($post->getComments()->latest()->get() as $comment)
                        <div class="flex flex-col py-6 px-4 w-{130px} ml-4 mr-4 my-4 bg-slate-900 rounded rounded-md">
                            <div class="flex flex-row mb-6 border-b border-white">
                                <div class="flex flex-row space-x-4 items-center justify-center">
                                  <img src="{{$comment->user->avatarsrc}}" alt="" class="rounded rounded-full mb-5" height="30px" width="30px">
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
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="commentSection-{{$post->id}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
                        <button data-modal-hide="commentSection-{{$post->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"  onclick="location.reload()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
           </div>
         <div class="bg-slate-900 p-10 mr-8 mt-6 flex flex-col items-center justify-center rounded h-[90vh] rounded-lg p-10 md:hidden lg:block">
            <h1 class="max-w-sm font-bold text-white text-2xl">Suggested</h1>
            <div class="flex flex-col mt-8 space-y-6">
                <div class="flex flex-row items-center space-x-6 border-y-2 border-slate-600 py-4">
                    <img src="{{auth()->user()->avatarsrc}}" alt="" class="rounded rounded-lg" height="65px" width="65px">
                    <p class="text-xl text-white font-bold">{{auth()->user()->username}} (You)</p>
                </div>
                <div class="flex flex-row items-center space-x-6 border-b-2 border-slate-600 -pt-2 pb-4">
                    <img src="./pr-image.jpg" alt="" class="rounded rounded-lg" height="65px" width="65px">
                    <p class="text-xl text-white font-bold">hans (F)</p>
                </div>
            </div>
         </div>

        </section>
    </div>


    <x-searchUsersModal></x-searchUsersModal>
    <x-uploadPostModal></x-uploadPostModal>

    </div>

    @vite('resources/js/app.js')


    <script type="module">

        const app = createApp({
            data() {
                return {
                    searchedTerm: '',
                    commentBox: '',
                    users: {!! $users->toJson() !!},
                    foundUsers: null,
                }
            },
            methods: {
                searchUser(username) {
                    console.log('you searched ' + username);

                    const searchTerm = username;

                    this.foundUsers = this.users.filter(user => user.username.toLowerCase().includes(searchTerm.toLowerCase()));
                },
            },
        });

        app.mount('#home');
    </script>

    <script>

        function changeLayoutLikeLive(e) {
            let frm = e.target.closest('#likeform');
            e.target.classList.remove('bi-heart');
            e.target.classList.add('bi-heart-fill');
            frm.submit();
        }

        function changeLayoutUnlikeLive(e) {
            let frm = e.target.closest('#unlikeform');
            e.target.classList.remove('bi-heart-fill');
            e.target.classList.add('bi-heart');
            frm.submit();
        }

        function getPostId(e) {
            let closest_post = e.target.closest('.post-element');
            let closest_id = closest_post.id;
            let comment_form = document.getElementById("commentForm");
            comment_form.action = "/create-new-comment/" + closest_id;
        }
        function showPreview(event) {
            if(event.target.files.length > 0){
                let imgselect = document.getElementById('image-select');
                let prv = document.getElementById('previewimg');
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                prv.classList.remove('hidden');
                preview.src = src;
                preview.style.display = "block";
                imgselect.classList.add('hidden');
            }
        }

        function revealCommentBox(e) {
            let cbox = e.target.closest('#commentBox');
            cbox.classList.remove('hidden');
        }
    </script>
</body>
</html>