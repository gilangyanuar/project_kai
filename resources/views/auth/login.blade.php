<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Mobile Train Inspection System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-bgdark font-sans">

    <!-- HEADER -->
    <header class="bg-white border-b border-gray-200">
    <div class="flex items-center gap-6 px-10 py-6">
        
        <div class="shrink-0"> 
            <img src="{{ asset('assets/icon-kai.png') }}" 
                 alt="Logo KAI" 
                 class="h-16 w-auto object-contain">
        </div>

        <h1 class="text-3xl font-extrabold tracking-wide text-black">
            MOBILE TRAIN INSPECTION SYSTEM
        </h1>
    </div>
    <div class="h-1 bg-orange-500"></div> 
</header>

    <!-- CONTENT -->
    <main class="flex items-center justify-center py-24">
        <div class="w-full max-w-xl rounded-2xl bg-white p-12 shadow-xl">
            <h2 class="mb-10 text-center text-3xl font-bold text-black">LOGIN</h2>

            <form method="POST" action="#" class="space-y-6">
                @csrf

                <!-- NIPP -->
                <input
                    type="text"
                    name="nipp"
                    placeholder="Masukkan NIPP"
                    class="w-full rounded-full border border-gray-300 px-6 py-4 text-base focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary"
                    required
                />

                <!-- PASSWORD -->
                <div class="relative">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Password"
                        class="w-full rounded-full border border-gray-300 px-6 py-4 pr-12 text-base focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary"
                        required
                    />
                    <button
                        type="button"
                        onclick="togglePassword()"
                        class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary"
                        aria-label="Toggle password"
                    >
                        👁️
                    </button>
                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="mt-4 w-full rounded-full bg-primary py-4 text-lg font-semibold text-white transition hover:opacity-90"
                >
                    MASUK
                </button>
            </form>
        </div>
    </main>

    <!-- SCRIPT -->
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>

</body>
</html>