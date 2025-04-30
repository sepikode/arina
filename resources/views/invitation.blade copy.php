@extends('layouts.app', ['title' => 'Undangan Pernikahan'])

@section('content')
<!-- Countdown Timer -->
<div class="bg-rose-700 text-white py-8 text-center">
	<div class="container mx-auto px-4">
	  <h2 class="text-2xl font-bold mb-4">Menuju Hari Bahagia</h2>
	  <div class="flex justify-center gap-4" id="countdown">
		<div class="bg-grey bg-opacity-20 rounded-lg p-4 w-20">
		  <div class="text-3xl font-bold text-black" id="days">00</div>
		  <div class="text-sm">Hari</div>
		</div>
		<div class="bg-grey bg-opacity-20 rounded-lg p-4 w-20">
		  <div class="text-3xl font-bold text-black" id="hours">00</div>
		  <div class="text-sm">Jam</div>
		</div>
		<div class="bg-grey bg-opacity-20 rounded-lg p-4 w-20">
		  <div class="text-3xl font-bold text-black" id="minutes">00</div>
		  <div class="text-sm">Menit</div>
		</div>
		<div class="bg-grey bg-opacity-20 rounded-lg p-4 w-20">
		  <div class="text-3xl font-bold text-black" id="seconds">00</div>
		  <div class="text-sm">Detik</div>
		</div>
	  </div>
	</div>
  </div>

<!-- Main Invitation -->
<div class="max-w-6xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-rose-800 mb-4">Sarah & Dito</h1>
        <p class="text-xl text-gray-600">Sabtu, 25 Desember 2024</p>
    </div>

    <!-- Greeting -->
    <div class="bg-white rounded-xl shadow-md p-8 mb-12 text-center">
        <p class="text-lg mb-4">Kepada Yth. Bapak/Ibu/Saudara/i</p>
        <h2 class="text-2xl font-bold text-rose-700 mb-6">{{ $guest->name }}</h2>
        <p class="mb-6">Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Anda untuk hadir dalam acara pernikahan kami.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-rose-50 p-6 rounded-lg">
                <h3 class="text-xl font-semibold text-rose-800 mb-2">Akad Nikah</h3>
                <p class="text-gray-700">08:00 - 10:00 WIB</p>
                <p class="text-gray-700">Masjid Al-Falah, Jl. Merdeka No. 123</p>
                <div class="mt-4">
                    <a href="https://maps.google.com?q=Masjid+Al-Falah+Jl+Merdeka+123" target="_blank" class="text-rose-600 hover:text-rose-800 inline-flex items-center">
                        <i class="fas fa-map-marker-alt mr-2"></i> Lihat Peta
                    </a>
                </div>
            </div>
            <div class="bg-rose-50 p-6 rounded-lg">
                <h3 class="text-xl font-semibold text-rose-800 mb-2">Resepsi</h3>
                <p class="text-gray-700">11:00 - 14:00 WIB</p>
                <p class="text-gray-700">Grand Ballroom, Hotel Maju</p>
                <div class="mt-4">
                    <a href="https://maps.google.com?q=Grand+Ballroom+Hotel+Maju" target="_blank" class="text-rose-600 hover:text-rose-800 inline-flex items-center">
                        <i class="fas fa-map-marker-alt mr-2"></i> Lihat Peta
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- RSVP Form -->
    <div class="bg-white rounded-xl shadow-md p-8 mb-12">
        <h2 class="text-2xl font-bold text-rose-800 mb-6 text-center">Konfirmasi Kehadiran</h2>
        
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('rsvp', $guest->unique_code) }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Apakah Anda akan hadir?</label>
                <div class="flex flex-wrap gap-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="attending" value="1" class="form-radio text-rose-600" 
                            {{ $guest->attending === true ? 'checked' : '' }}>
                        <span class="ml-2">Ya, saya akan hadir</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="attending" value="0" class="form-radio text-rose-600"
                            {{ $guest->attending === false ? 'checked' : '' }}>
                        <span class="ml-2">Tidak bisa hadir</span>
                    </label>
                </div>
            </div>
            
            <div class="mb-6" id="guestCountContainer" style="{{ $guest->attending === false ? 'display: none;' : '' }}">
                <label for="guest_count" class="block text-gray-700 mb-2">Jumlah Tamu (termasuk Anda)</label>
                <select name="guest_count" id="guest_count" class="form-select block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50">
                    @for($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ $guest->guest_count == $i ? 'selected' : '' }}>{{ $i }} orang</option>
                    @endfor
                </select>
            </div>
            
            <div class="text-center">
                <button type="submit" class="px-6 py-3 bg-rose-600 text-white rounded-lg hover:bg-rose-700 transition">
                    Konfirmasi Kehadiran
                </button>
            </div>
        </form>
    </div>

    <!-- Gallery -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-rose-800 mb-6 text-center">Galeri Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($gallery as $item)
            <div class="relative group overflow-hidden rounded-lg shadow-md">
                <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['caption'] }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <p class="text-white text-center px-4">{{ $item['caption'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Closing -->
    <div class="text-center text-gray-600">
        <p class="mb-4">Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu.</p>
        <p class="font-medium">Wassalamualaikum Warahmatullahi Wabarakatuh</p>
        <div class="mt-8 flex justify-center space-x-6">
            <a href="#" class="text-rose-600 hover:text-rose-800">
                <i class="fab fa-whatsapp fa-2x"></i>
            </a>
            <a href="#" class="text-rose-600 hover:text-rose-800">
                <i class="fab fa-instagram fa-2x"></i>
            </a>
            <a href="#" class="text-rose-600 hover:text-rose-800">
                <i class="fas fa-envelope fa-2x"></i>
            </a>
        </div>
    </div>
</div>

<script>
    // Countdown Timer
    function updateCountdown() {
        const weddingDate = new Date("{{ $weddingDate }}").getTime();
        const now = new Date().getTime();
        const distance = weddingDate - now;
        
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
        document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
        document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
        document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');
    }
    
    setInterval(updateCountdown, 1000);
    updateCountdown();
    
    // Show/hide guest count based on attendance
    document.querySelectorAll('input[name="attending"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.getElementById('guestCountContainer').style.display = 
                this.value === '1' ? 'block' : 'none';
        });
    });
</script>
@endsection