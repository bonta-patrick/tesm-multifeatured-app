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
    <div class="md:hidden">
       <section id="home-page" class="flex flex-col bg-black min-h-screen overflow-auto">

        
        <div class="flex flex-row justify-between items-center border-b border-white w-full px-4 h-18">
          <h1 class="py-6 px-4 font-bold text-white text-2xl">Profile</h1>
          <a data-modal-target="defaultModal" data-modal-toggle="defaultModal"><i class="text-white text-2xl pr-4 bi bi-gear-fill"></i></a>
        </div>

        <div class="flex flex-col border-b border-white">
        <div class="flex flex-col items-start w-{130px} mx-6 my-6 bg-gradient-to-r from-blue-400 to-blue-700 rounded rounded-lg p-8">
            <div class="flex flex-row items-center justify-between space-x-6">
              <img src="{{auth()->user()->avatarsrc}}" alt="" class="rounded rounded-lg" height="80px" width="80px">
              <h1 class="text-white text-2xl font-bold pr-5">{{auth()->user()->username}}</h1>
            </div>
            <div class="flex flex-row space-x-6 mt-8">
              <h1 class="text-white font-mono text-4xl font-bold">{{auth()->user()->getAllPosts()->count()}}P</h1>
              <h1 class="text-white font-mono text-4xl font-bold">30F</h1>
              <h1 class="text-white font-mono text-4xl font-bold">12FL</h1>
            </div>
        </div>
        <p class="text-lg text-slate-500 font-bold px-6 py-2 mb-8">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam ullam voluptates impedit asperiores quod!</p>
        </div>

        <div class="flex flex-row justify-between items-center border-b border-white w-full px-4 h-18">
            <h1 class="py-6 px-4 font-bold text-white text-2xl">{{auth()->user()->username}}'s posts</h1>
          </div>

          @foreach($user_posts as $post)
          <div class="flex flex-col py-6 px-4 w-{130px} ml-4 mr-4 my-4 bg-slate-900 rounded rounded-md">
            <div class="flex flex-col">
                <div class="flex flex-row mb-6 border-b border-white">
                    <div class="flex flex-row space-x-4 items-center justify-center">
                      <img src="{{$post->user->avatarsrc}}" alt="" class="rounded rounded-lg mb-5" height="45px" width="45px">
                      <h1 class="text-white font-medium text-xl -mt-4">{{$post->user->username}}</h1>
                    </div>
                </div>
                <img src="./storage/posts/{{$post->imagesrc}}" alt="" class="rounded rounded-md">
                <p class="py-6 text-white max-w-xl">{{$post->captions}}</p>
                <div class="flex flex-row space-x-8 items-center mt-6 mx-4">
                    <div class="flex flex-row items-center justify-center space-x-4">
                       <i class="bi bi-heart text-white text-xl"></i>
                       <p class="text-white text-lg font-bold">{{$post->likes->count()}}</p>
                    </div>
                    <div class="flex flex-row items-center justify-center space-x-4">
                        <a href="./comments.html"><i class="bi bi-chat-left text-white text-xl"></i></a>
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
        <section id="profile-page" class="flex flex-row items-start justify-between bg-black min-h-screen">
            <div class="bg-black rounded rounded-lg h-[100vh] p-10">
                <h1 class="text-4xl lg:text-5xl font-mono font-bold text-blue-400">TESM</h1>

                <div class="flex flex-col mt-32 space-y-12">
                    <a href="/" class="flex flex-row space-x-4 items-center justify-center">
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
                    <a href="#" class="flex flex-row space-x-4 items-center justify-center">
                        <img src="{{auth()->user()->avatarsrc}}" alt="" class="rounded rounded-lg" height="30px" width="30px">
                      <p class="text-2xl text-white font-bold">Profile</p>
                    </a>
                </div>
           </div>

           <div class="flex flex-col overflow-auto h-[100vh] lg:border-l-2 lg:border-white lg:border-r-2 lg:border-white">
            <h1 class="py-6 px-4 font-bold text-white text-2xl">Profile - {{auth()->user()->username}}</h1>
            <p class="max-w-xl py-2 px-4 text-md text-slate-500">On this page you can update and see your profile! Click here to learn more about
                how you can customize your profile!
            </p>
            <div class="flex flex-row items-center justify-center py-6 px-4 ml-4 mr-4 my-8 bg-gradient-to-r from-blue-400 to-blue-700 rounded rounded-md">
                <button type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="bg-transparent text-white font-mono font-bold">Customize Now</button>
            </div>
            <div class="flex flex-col items-start w-auto mx-6 my-6 bg-gradient-to-r from-blue-400 to-blue-700 rounded rounded-lg p-8">
                <div class="flex flex-row items-center justify-between space-x-6">
                  <img src="{{auth()->user()->avatarsrc}}" alt="" class="rounded rounded-lg" height="80px" width="80px">
                  <h1 class="text-white text-2xl font-bold pr-5">{{auth()->user()->username}}</h1>
                </div>
                <div class="flex flex-row space-x-6 mt-8">
                  <h1 class="text-white font-mono text-4xl font-bold">28P</h1>
                  <h1 class="text-white font-mono text-4xl font-bold">30F</h1>
                  <h1 class="text-white font-mono text-4xl font-bold">12FL</h1>
                </div>
            </div>
            <p class="text-lg text-slate-500 max-w-xl font-bold px-6 py-2 mb-8">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam ullam voluptates impedit asperiores quod!</p>

            @foreach($user_posts as $upost)
           <div class="flex flex-col py-6 px-4 w-{130px} ml-4 mr-4 my-4 bg-slate-900 rounded rounded-md">
            <div class="flex flex-col">
                <div class="flex flex-row mb-6 border-b border-white">
                    <div class="flex flex-row space-x-4 items-center justify-center">
                      <img src="{{$upost->user->avatarsrc}}" alt="" class="rounded rounded-lg mb-5" height="45px" width="45px">
                      <h1 class="text-white font-medium text-xl -mt-4">{{$upost->user->username}}</h1>
                    </div>
                </div>
                <img src="./storage/posts/{{$upost->imagesrc}}" alt="" class="rounded rounded-md">
                <p class="py-6 text-white max-w-xl">{{$upost->captions}}</p>
                <div class="flex flex-row space-x-8 items-center mt-6 mx-4">
                    <div class="flex flex-row items-center justify-center space-x-4">
                       <i class="bi bi-heart text-white text-xl"></i>
                       <p class="text-white text-lg font-bold">212</p>
                    </div>
                    <div class="flex flex-row items-center justify-center space-x-4">
                        <a data-modal-target="commentSection" data-modal-toggle="commentSection" href="#"><i class="bi bi-chat-left text-white text-xl"></i></a>
                        <p class="text-white text-lg font-bold">134</p>
                    </div>
                    <i class="bi bi-send-plus text-white text-xl"></i>
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

        <div id="searchContainer" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-slate-800 rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-white dark:text-white">
                            Search
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="searchContainer">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="flex flex-col p-6 space-y-6 h-[60vh] overflow-auto">
                        <div class="flex flex-row items-center">
                            <i class="text-xl text-white bi bi-search -mt-2"></i>
                            <input type="text" class="w-full bg-slate-900 w-{130px} my-4 mx-4 rounded rounded-lg border-slate-600 text-white py-4 px-6" placeholder="Search by username">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="searchContainer" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
                        <button data-modal-hide="searchContainer" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"  onclick="location.reload()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        </section>
    </div>

    <div id="newAvatar" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-slate-800 rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white dark:text-white">
                        Upload New Avatar
                    </h3>
                    <i class="text-white text-2xl -mt-1 pl-6 pr-4 bi bi-plus" title="Add a comment" onclick="revealCommentBox()"></i>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="newAvatar">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="flex flex-col p-6 space-y-6 h-[50vh] overflow-auto">
                    <form id="avatar-form" action="/save-avatar" class="flex flex-col items-center justify-center w-{130px} mx-4 my-4" id="image-select" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label id="image-select" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                <input name="avatar" id="dropzone-file" type="file" class="hidden" onchange="showPreview(event)" />
                            </div>
                        </label>
                        <div class="preview mx-4 my-4">
                            <img id="file-ip-1-preview" class="rounded rounded-lg">
                        </div>
                        <button type="submit" class="mt-4 py-4 px-2 bg-slate-800 border border-slate-600 text-white">Upload</button>
                    </form> 
            
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="newAvatar" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="saveAvatar(event)">Upload</button>
                    <button data-modal-hide="newAvatar" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"  onclick="location.reload()">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-slate-800 rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white dark:text-white">
                        Account Settings
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="flex flex-col p-6 space-y-6">
                    <div class="flex flex-col space-y-6 p-6">
                        <div class="flex flex row">
                            <img src="{{auth()->user()->avatarsrc}}" alt="" class="rounded rounded-lg" height="65px" width="65px">
                            <button data-modal-target="newAvatar" data-modal-toggle="newAvatar" data-modal-hide="defaultModal" class="bg-slate-800 py-2 px-2 ml-6 text-white font-bold" onclick="hideParentModal()">Change Profile Picture</button>
                        </div>
                        <div class="flex flex row items-center">
                            <i class="bi bi-person-badge text-white text-3xl"></i>
                            <button class="bg-slate-800 py-2 px-2 ml-6 text-white mt-3 font-bold">Change Username</button>
                        </div>
                        <div class="flex flex row items-center">
                            <i class="bi bi-pencil-square text-white text-3xl"></i>
                            <button class="bg-slate-800 py-2 px-2 ml-6 text-white mt-3 font-bold">Change Description</button>
                        </div>
                        <div class="flex flex row items-center">
                            <i class="bi bi-envelope-at-fill text-white text-3xl"></i>
                            <p class="bg-slate-900 p-4 text-slate-500 rounded rounded-lg font-bold">{{auth()->user()->email}}</p>
                            <button class="bg-slate-800 py-2 px-2 ml-6 text-white mt-3"></button>
                        </div>
                        <div class="flex flex row items-center">
                            <i class="bi bi-envelope-at-fill text-white text-3xl"></i>
                            <p class="bg-slate-900 p-4 text-slate-500 rounded rounded-lg font-bold">1xsda23asdkAkdSSks</p>
                            <button class="bg-slate-800 py-2 px-2 ml-6 text-white mt-3"></button>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"  onclick="location.reload()">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
       function showPreview(event) {
          if(event.target.files.length > 0){
              let imgselect = document.getElementById('image-select');
              var src = URL.createObjectURL(event.target.files[0]);
              var preview = document.getElementById("file-ip-1-preview");
              preview.src = src;
              preview.style.display = "block";
              imgselect.classList.add('hidden');
          }
      }
      function saveAvatar(e) {
        let save = e.target.closest('#avatar-form');
        save.submit();
      }
    </script>

</body>
</html>