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
            background: #555;
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
          <h1 class="py-6 px-4 font-bold text-white text-2xl">Channels</h1>
          <div class="flex flex-row space-x-6">
            <a href="#" data-modal-target="channelShowMobile" data-modal-toggle="channelShowMobile"><i class="text-white text-2xl pr-4 bi bi-chat-left-dots-fill"></i></a>
            <a href="#" data-modal-target="searchChannel" data-modal-toggle="searchChannel"><i class="text-white text-2xl pr-4 bi bi-search"></i></a>
            <a href="#" data-modal-target="createChannel" data-modal-toggle="createChannel"><i class="text-white text-4xl pr-4 bi bi-plus"></i></a>
          </div>
        </div>

        <div class="flex flex-col items-center justify-center flex-1 h-full w-full bg-slate-800">
            <i class="bi bi-chat-left-dots-fill text-transparent text-8xl bg-clip-text bg-gradient-to-r from-blue-400 to-green-600"></i>
            <h1 class="py-6 px-4 font-bold text-white text-4xl text-center">Strike a convo</h1>
            <p class="py-2 px-4 text-center text-xl text-slate-500 max-w-4xl">
                Enter any of your channels and start having conversations with people!
            </p>
            
          </div>
       
        <!-- <div class="h-24 w-full"></div> -->



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
                    <a href="./profile.html" class="flex flex-row space-x-4 items-center justify-center">
                        <img src="./fallback-avatar.jpg" alt="" class="rounded rounded-lg" height="30px" width="30px">
                      <p class="text-2xl text-white font-bold">Profile</p>
                    </a>
                </div>
           </div>

           <div class="flex flex-row items-start justify-start overflow-auto w-full h-[100vh] border-l-2 border-white">
            <div class="flex flex-col px-8 lg:px-8 py-8 bg-slate-950 w-1/3 lg:w-1/4 h-full border-r-2 border-white">
                <div class="flex flex-col space-y-6">
                   <div class="flex flex-row items-center justify-center py-4 px-4 bg-gradient-to-r from-blue-400 to-blue-700 rounded rounded-md">
                      <button type="button" data-modal-target="searchChannel" data-modal-toggle="searchChannel" class="w-full bg-transparent text-white text-xl font-bold">Search</button>
                   </div>
                   <div class="flex flex-row items-center justify-center py-4 px-4 bg-gradient-to-r from-blue-400 to-blue-700 rounded rounded-md">
                      <button type="button" data-modal-target="createChannel" data-modal-toggle="createChannel" class="w-full bg-transparent text-xl text-white font-bold">Create</button>
                   </div>
                </div>
                <h1 class="text-xl text-white font-bold mt-8 mb-8">Your Channels</h1>
                <div class="flex flex-col space-y-4">
                    @foreach($channels as $channel)
                    <div class="flex flex-row items-center justify-start space-x-6 bg-slate-900 p-4 rounded rounded-lg cursor-pointer" onclick="location.href='/channels/channel/{{$channel->getChannel->id}}'">
                        <img src="../storage/channels/{{$channel->getChannel->channel_image}}" alt="" height="65px" width="65px" class="rounded rounded-lg">
                        <div class="flex flex-col space-y-1 hidden 2xl:block">
                            <h1 class="text-white text-xl font-bold">{{$channel->getChannel->channel_name}}</h1>
                            <p class="text-slate-600 text-lg">#3thb21g</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!--
            <div class="flex flex-col flex-1 h-full w-full bg-slate-800">
                <div class="flex flex-row items-center justify-between p-6 bg-slate-900 border-b-2 border-white">
                    <h1 class="text-white text-3xl font-bold">
                        theboys
                    </h1>
                    <a data-modal-target="channelSettings" data-modal-toggle="channelSettings" href="#"><i class="text-white text-2xl bi bi-gear-fill"></i></a>
                </div>
                <div class="flex flex-col p-6 overflow-auto" id="message-container">
                    <div class="flex flex-col items-center justify-center pb-5 border-b border-slate-700">
                        <h1 class="text-white mt-8 font-bold text-lg">This is the beginning of the conversation</h1>
                    </div>
                    <div class="flex flex-col p-6 rounded rounded-lg space-y-4 ml-2 hover:bg-slate-900">
                        <div class="flex flex-row items-center justify-start space-x-2 max-w-2xl">
                           <img src="./fallback-avatar.jpg" alt="" height="55px" width="55px" class="rounded rounded-lg">
                           <h1 class="text-white text-xl font-bold pl-2">superman12</h1>
                           <p class="text-slate-500 mt-1 text-md">at 12:00 PM</p>
                        </div>
                        <h1 class="text-lg text-white max-w-2xl">Hello there</h1>
                        <div class="flex flex-row mt-4 space-x-6 items-center justify-start space-x-4">
                            <i class="bi bi-heart text-xl text-white -mt-2"></i>
                            <p class="text-white text-xl">0</p>
                        </div>

                    </div>
                    <div class="flex flex-col p-6 rounded rounded-lg space-y-4 ml-2 hover:bg-slate-900">
                        <div class="flex flex-row items-center justify-start space-x-2 max-w-2xl">
                           <img src="./fallback-avatar.jpg" alt="" height="55px" width="55px" class="rounded rounded-lg">
                           <h1 class="text-white text-xl font-bold pl-2">superman12</h1>
                           <p class="text-slate-500 mt-1 text-md">at 12:00 PM</p>
                        </div>
                        <h1 class="text-lg text-white max-w-2xl">Hello there</h1>
                        <div class="flex flex-row mt-4 space-x-6 items-center justify-start space-x-4">
                            <i class="bi bi-heart text-xl text-white -mt-2"></i>
                            <p class="text-white text-xl">0</p>
                        </div>

                    </div>
                    <div class="flex flex-col p-6 rounded rounded-lg space-y-4 ml-2 hover:bg-slate-900">
                        <div class="flex flex-row items-center justify-start space-x-2 max-w-2xl">
                           <img src="./fallback-avatar.jpg" alt="" height="55px" width="55px" class="rounded rounded-lg">
                           <h1 class="text-white text-xl font-bold pl-2">superman12</h1>
                           <p class="text-slate-500 mt-1 text-md">at 12:00 PM</p>
                        </div>
                        <h1 class="text-lg text-white max-w-2xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos repellendus eligendi id corporis amet sed voluptas aspernatur vel eos numquam.</h1>
                        <div class="flex flex-row mt-4 space-x-6 items-center justify-start space-x-4">
                            <i class="bi bi-heart text-xl text-white -mt-2"></i>
                            <p class="text-white text-xl">0</p>
                        </div>

                    </div>
                    <div class="flex flex-col p-6 rounded rounded-lg space-y-4 ml-2 hover:bg-slate-900">
                        <div class="flex flex-row items-center justify-start space-x-2 max-w-2xl">
                           <img src="./fallback-avatar.jpg" alt="" height="55px" width="55px" class="rounded rounded-lg">
                           <h1 class="text-white text-xl font-bold pl-2">superman12</h1>
                           <p class="text-slate-500 mt-1 text-md">at 12:00 PM</p>
                        </div>
                        <h1 class="text-lg text-white max-w-2xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos repellendus eligendi id corporis amet sed voluptas aspernatur vel eos numquam.</h1>
                        <div class="flex flex-row mt-4 space-x-6 items-center justify-start space-x-4">
                            <i class="bi bi-heart text-xl text-white -mt-2"></i>
                            <p class="text-white text-xl">0</p>
                        </div>

                    </div>
                    
                </div>
            -->
              <div class="flex flex-col items-center justify-center flex-1 h-full w-full bg-slate-800">
                <i class="bi bi-chat-left-dots-fill text-transparent text-8xl bg-clip-text bg-gradient-to-r from-blue-400 to-green-600"></i>
                <h1 class="py-6 px-4 font-bold text-white text-8xl text-center">Strike a convo</h1>
                <p class="py-2 px-4 text-center text-2xl text-slate-500 max-w-4xl">
                    Enter any of your channels and start having conversations with people!
                </p>
                
              </div>
            </div>
           </div>
         

         <div id="channelSettings" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-slate-800 rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-white dark:text-white">
                            Channel Settings
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="channelSettings">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="flex flex-col h-[60vh] overflow-auto p-6 space-y-6">
                        <div class="flex flex-row items-center justify-start bg-gradient-to-r from-blue-400 to-blue-600 text-white p-6 rounded rounded-lg space-x-4">
                            <img src="./fallback-avatar.jpg" alt="" height="75px" width="75px" class="rounded rounded-lg">
                            <h1 class="text-2xl text-white font-bold">theboys</h1>
                        </div>
                        <p class="text-lg text-slate-500 font-bold py-2 mb-8">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam ullam voluptates impedit asperiores quod!</p>
                        <h2 class="text-xl text-white font-bold pt-2">Members</h2>
                        <div class="flex flex-col space-y-4 mt-4 h-[20vh] overflow-auto">
                            <div class="flex flex-row items-center justify-start p-4 bg-slate-700 rounded rounded-lg space-x-4">
                                <img src="./fallback-avatar.jpg" alt="" height="55px" width="55px" class="rounded rounded-lg">
                                <h1 class="text-xl text-white font-bold">sportycap23</h1>
                                <p class="bg-gradient-to-r from-blue-400 to-green-600 text-white p-2 rounded rounded-lg text-md font-bold" id="admin-badge">Admin</p>
                            </div>
                            <div class="flex flex-row items-center justify-start p-4 bg-slate-700 rounded rounded-lg space-x-4">
                                <img src="./fallback-avatar.jpg" alt="" height="55px" width="55px" class="rounded rounded-lg">
                                <h1 class="text-xl text-white font-bold">superman12</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="channelSettings" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Customize</button>
                        <button data-modal-hide="channelSettings" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"  onclick="location.reload()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="commentSection" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-slate-800 rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-white dark:text-white">
                            Comments (2)
                        </h3>
                        <i class="text-white text-2xl -mt-1 pl-6 pr-4 bi bi-plus" title="Add a comment" onclick="revealCommentBox()"></i>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="commentSection">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="flex flex-col p-6 space-y-6 h-[60vh] overflow-auto">
                        <div class="hidden flex flex-row p-10 items-start justify-start space-x-5" id="commentBox">
                            <div class="flex flex-row items-center">
                                <img src="./fallback-avatar.jpg" alt="" class="rounded rounded-lg" height="65px" width="65px">
                                <input type="text" class="border-b-2 max-w-md border-slate-500 py-2 px-2 text-white bg-slate-800 ml-5" placeholder="Type your comment...">
                                <button class="bg-slate-800 py-2 px-2 ml-6 text-white">Create</button>
                            </div>
                        </div>

                        <div class="flex flex-col py-6 px-4 w-{130px} ml-4 mr-4 my-4 bg-slate-900 rounded rounded-md">
                            <div class="flex flex-row mb-6 border-b border-white">
                                <div class="flex flex-row space-x-4 items-center justify-center">
                                  <img src="./images/pr-image.jpg" alt="" class="rounded rounded-full mb-5" height="30px" width="30px">
                                  <h1 class="text-white font-medium text-lg -mt-4">jack_mars</h1>
                                </div>
                            </div>
                            <p class="text-white text-md pb-4">Hope you like my post!</p>
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
                
                        <div class="flex flex-col py-6 px-4 w-{130px} ml-4 mr-4 my-4 bg-slate-900 rounded rounded-md">
                            <div class="flex flex-row mb-6 border-b border-white">
                                <div class="flex flex-row space-x-4 items-center justify-center">
                                  <img src="./images/pr-image.jpg" alt="" class="rounded rounded-full mb-5" height="30px" width="30px">
                                  <h1 class="text-white font-medium text-lg -mt-4">hans</h1>
                                </div>
                            </div>
                            <p class="text-white text-md pb-4">Yeah it was nice</p>
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
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="commentSection" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
                        <button data-modal-hide="commentSection" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"  onclick="location.reload()">Cancel</button>
                    </div>
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

        <div id="channelShowMobile" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-slate-800 rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-white dark:text-white">
                            Your Channels
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="channelShowMobile">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="flex flex-col p-6 space-y-6 h-[50vh] overflow-auto">
                            @foreach($channels as $channel)
                            <div class="flex flex-row items-center justify-start space-x-6 bg-slate-900 p-4 rounded rounded-lg cursor-pointer" onclick="location.href='/channels/channel/{{$channel->getChannel->id}}'">
                                <img src="/storage/channels/{{$channel->getChannel->channel_image}}" alt="" style="width: 65px; height: 65px;" class="rounded rounded-lg">
                                <div class="flex flex-col space-y-1">
                                    <h1 class="text-white text-xl font-bold">{{$channel->getChannel->channel_name}}</h1>
                                    <p class="text-slate-600 text-lg">#3thb21g</p>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="channelShowMobile" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
                        <button data-modal-hide="channelShowMobile" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"  onclick="location.reload()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="createChannel" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-slate-800 rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-white dark:text-white">
                            Crate New Channel
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="createChannel">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="flex flex-col p-6 space-y-6">
                        <div class="flex items-center justify-center w-{130px} mx-4 my-4" id="image-select">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" onchange="showPreview(event)" />
                            </label>
                        </div> 
                
                        <div class="preview mx-4 my-4 flex flex-row items-center justify-center">
                            <img id="file-ip-1-preview" class="rounded rounded-lg">
                        </div>

                        <input type="text" class="border rounded rounded-lg max-w-md border-slate-500 py-2 px-2 text-white bg-slate-800 ml-5" placeholder="Channel Name">
                        <textarea name="" id="" cols="30" rows="2" class="bg-slate-900 text-white py-4 px-4 mx-4 my-4 rounded rounded-lg" placeholder="Channel description"></textarea>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="createChannel" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                        <button data-modal-hide="createChannel" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"  onclick="location.reload()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="searchChannel" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-slate-800 rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-white dark:text-white">
                            Search Channels
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="searchChannel">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="flex flex-col p-6 space-y-6 h-[60vh]">
                        <div class="flex flex-col items-start">
                            <div class="flex flex-row items-center justify-start space-x-4 w-full">
                                <i class="text-white bi bi-search text-xl -mt-2"></i>
                                <input type="text" class="w-full bg-slate-900 w-{130px} my-4 mx-4 rounded rounded-lg border-slate-600 text-white py-4 px-6" placeholder="Search channel by tag">
                            </div>


                            <h2 class="text-xl text-white font-bold pt-2">Channels</h2>
                        <div class="flex flex-col w-full space-y-4 mt-4 h-[40vh] overflow-auto bg-slate-900 rounded rounded-lg p-4">
                            <div class="flex flex-row items-center justify-between p-4 bg-slate-700 rounded rounded-lg space-x-4">
                                <div class="flex flex-row space-x-4 items-center justify-start">
                                    <img src="./fallback-avatar.jpg" alt="" height="55px" width="55px" class="rounded rounded-lg">
                                    <h1 class="text-xl text-white font-bold">sportycap23</h1>
                                </div>
                                <button class="py-2 px-2 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded rounded-lg font-bold">Join</button>
                            </div>
                            <div class="flex flex-row items-center justify-between p-4 bg-slate-700 rounded rounded-lg">
                                <div class="flex flex-row space-x-4 items-center justify-start">
                                    <img src="./fallback-avatar.jpg" alt="" height="55px" width="55px" class="rounded rounded-lg">
                                    <h1 class="text-xl text-white font-bold">superman12</h1>
                                </div>
                                
                                <button class="py-2 px-2 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded rounded-lg font-bold">Join</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="searchChannel" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
                        <button data-modal-hide="searchChannel" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"  onclick="location.reload()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        </section>
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

        let cbox = document.getElementById('commentBox');
        function revealCommentBox() {
            cbox.classList.remove('hidden');
        }
    </script>
</body>
</html>