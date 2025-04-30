@extends('layouts.app')

@section('title', 'Daftar Tamu')

@section('content')

@if(session('success'))
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

@if(session('skippedRows'))
<div class="mb-4 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded">
    <h4 class="font-bold">Baris yang dilewati:</h4>
    <ul class="list-disc pl-5">
        @foreach(session('skippedRows') as $row)
        <li>
            Data: {{ json_encode($row) }}
        </li>
        @endforeach
    </ul>
</div>
@endif

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-rose-800 mb-8 text-center">Daftar Tamu Undangan</h1>

	<div class="bg-white rounded-xl shadow-md p-6 mb-8">
        <h2 class="text-xl font-semibold text-rose-800 mb-4">Import Data Tamu</h2>
        <form action="{{ route('guests.import') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 mb-2">File Excel</label>
                <input type="file" name="excel_file" class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0
                    file:text-sm file:font-semibold
                    file:bg-rose-50 file:text-rose-700
                    hover:file:bg-rose-100" required>
                <p class="mt-1 text-sm text-gray-500">Format file: .xlsx atau .xls</p>
                <p class="mt-1 text-sm text-gray-500">
                    <a href="{{ asset('templates/template_guest.xlsx') }}" class="text-rose-600 hover:text-rose-800">
                        <i class="fas fa-download mr-1"></i> Download template Excel
                    </a>
                </p>
            </div>
            <button type="submit" class="px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 transition">
                <i class="fas fa-upload mr-2"></i> Import Data
            </button>
        </form>
        
        @if(session('success'))
        <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
        @endif
        
        @if($errors->any())
        <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

	<div class="mb-6 bg-white rounded-lg shadow-md p-4">
        <form action="{{ route('admin.guests') }}" method="GET" class="flex items-center gap-4">
            <div class="flex-grow">
                <input type="text" 
                       name="search" 
                       placeholder="Cari nama atau alamat..." 
                       value="{{ request('search') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500">
            </div>
            <button type="submit" 
                    class="px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700 transition flex items-center">
                <i class="fas fa-search mr-2"></i> Cari
            </button>
            @if(request('search'))
                <a href="{{ route('admin.guests') }}" 
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition flex items-center">
                    <i class="fas fa-times mr-2"></i> Reset
                </a>
            @endif
        </form>
    </div>

    
        <!-- Daftar Tamu -->
		<div class="bg-white rounded-xl shadow-md overflow-hidden">
			<table class="min-w-full divide-y divide-gray-200">
				<!-- Header Tabel -->
				<thead class="bg-rose-100">
					<tr>
						<th class="px-6 py-3 text-left text-xs font-medium text-rose-800 uppercase tracking-wider">
							<a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="flex items-center">
								Nama
								@if(request('sort') === 'name')
									<i class="fas fa-sort-{{ request('direction') === 'asc' ? 'up' : 'down' }} ml-2"></i>
								@else
									<i class="fas fa-sort ml-2"></i>
								@endif
							</a>
						</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-rose-800 uppercase tracking-wider">Alamat</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-rose-800 uppercase tracking-wider">Kode Unik</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-rose-800 uppercase tracking-wider">Status</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-rose-800 uppercase tracking-wider">Jumlah Tamu</th>
						<th class="px-6 py-3 text-left text-xs font-medium text-rose-800 uppercase tracking-wider">Aksi</th>
					</tr>
				</thead>
				<!-- Isi Tabel -->
				<tbody class="bg-white divide-y divide-gray-200">
					@forelse($guests as $guest)
					<tr>
						<td class="px-6 py-4 whitespace-nowrap">{{ $guest->name }}</td>
						<td class="px-6 py-4">{{ $guest->address }}</td>
						<td class="px-6 py-4 whitespace-nowrap">{{ $guest->unique_code }}</td>
						<td class="px-6 py-4 whitespace-nowrap">
							@if($guest->attending === null)
								<span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Belum Konfirmasi</span>
							@elseif($guest->attending)
								<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Hadir ({{ $guest->guest_count }} orang)</span>
							@else
								<span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Tidak Hadir</span>
							@endif
						</td>
						<td class="px-6 py-4 whitespace-nowrap">{{ $guest->guest_count }}</td>
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
							<a href="{{ route('invitation', $guest->unique_code) }}" class="text-rose-600 hover:text-rose-800" target="_blank">
								<i class="fas fa-link"></i> Buka
							</a>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="6" class="px-6 py-4 text-center text-gray-500">
							@if(request('search'))
								Tidak ditemukan tamu dengan kata kunci "{{ request('search') }}"
							@else
								Belum ada data tamu
							@endif
						</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>

		<div class="mt-4">
			{{ $guests->links() }}
		</div>
</div>
@endsection