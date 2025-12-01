<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tailwind</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-zinc-50 text-zinc-800 max-w-5xl mx-auto">
    <nav class="px-6 py-4">
        <ul class="flex gap-10 text-sm justify-end">
            <li>
                <a href="#" class="text-zinc-800 hover:underline focus:underline">Dashboard</a>
            </li>
            <li>
                <a href="#" class="text-zinc-800 hover:underline focus:underline">Bookmarks</a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button class="text-zinc-800 hover:underline focus:underline">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <main class="p-8">
        <h1 class="text-4xl font-bold text-amber-600">BIT 342</h1>
        <p class="mt-1 text-zinc-500">Discover roles worth your skills.</p>

        <input type="text" placeholder="Search for roles, companies and type"
            class="w-full border border-zinc-300 rounded-md px-5 py-2 mt-6 focus:outline-none focus:ring-2 focus:ring-amber-500" />

        <div class="mt-8 space-y-4">
            <!-- ======================= -->
            <!--     JOB CARD COMPLETA   -->
            <!-- ======================= -->
            <div x-data="{
                showDetails: false,
                bookmarked: false,
                showToast: false,
                message: ''
            }" class="p-6 bg-white rounded-lg shadow-xs border border-zinc-200 relative">
                <!-- Summary / Header -->
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold text-xl">Full Stack Developer</h3>
                        <p class="text-zinc-600 text-sm mt-1">
                            Company • Remote • Part-Time
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        <!-- BOOKMARK BUTTON -->
                        <button
                            @click="
                  bookmarked = !bookmarked;
                  message = bookmarked ? 'Added to bookmarks' : 'Removed from bookmarks';
                  showToast = true;
                  setTimeout(() => showToast = false, 3000);
                "
                            :class="bookmarked ? 'text-amber-500' : 'text-zinc-300'"
                            class="hover:text-amber-600 p-2 rounded hover:bg-zinc-100 cursor-pointer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 2a2 2 0 00-2 2v14l7-4 7 4V4a2 2 0 00-2-2H5z" />
                            </svg>
                        </button>

                        <!-- DETAILS BUTTON -->
                        <button @click="showDetails = !showDetails"
                            class="bg-amber-600 px-4 py-1 text-white text-sm rounded-md">
                            <span x-show="!showDetails">View Details</span>
                            <span x-show="showDetails">Hide</span>
                        </button>
                    </div>
                </div>

                <!-- Details -->
                <div x-show="showDetails" x-transition class="mt-2 text-xs">
                    <p>Here are the job requirements and other details...</p>
                </div>

                <!-- TOAST -->
                <div x-show="showToast" x-cloak x-transition
                    class="fixed bottom-5 right-5 bg-green-100 border border-green-200 text-green-800 text-sm px-3 py-1 rounded shadow">
                    <span x-text="message"></span>
                </div>
            </div>
            <!-- END JOB CARD -->
        </div>
    </main>
</body>

</html>
