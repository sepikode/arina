<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Undangan Pernikahan {{ $title ?? '' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<style type="text/tailwindcss">
		@theme {
		  --color-clifford: #da373d;
		}
	  </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-sans bg-rose-50 text-gray-800">
    @yield('content')
    
    <!-- Audio Player -->
    <div class="fixed bottom-4 right-4 z-50">
        <button id="musicToggle" class="p-3 bg-rose-600 text-white rounded-full shadow-lg">
            <i class="fas fa-music"></i>
        </button>
        <audio id="weddingMusic" loop>
            <source src="{{ asset('audio/anin.mp3') }}" type="audio/mpeg">
        </audio>
    </div>

    <script>
        const musicToggle = document.getElementById('musicToggle');
        const weddingMusic = document.getElementById('weddingMusic');
        let isPlaying = false;

        musicToggle.addEventListener('click', () => {
            if (isPlaying) {
                weddingMusic.pause();
                musicToggle.innerHTML = '<i class="fas fa-music"></i>';
            } else {
                weddingMusic.play();
                musicToggle.innerHTML = '<i class="fas fa-pause"></i>';
            }
            isPlaying = !isPlaying;
        });
    </script>
</body>
</html>