<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Imports\GuestsImport;
use Maatwebsite\Excel\Facades\Excel;

class WeddingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'name'); // Default sort by name
        $direction = $request->input('direction', 'asc'); // Default direction
        
        $guests = Guest::when($search, function($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('address', 'like', "%{$search}%");
                })
                ->when($sort, function($query) use ($sort, $direction) {
                    $query->orderBy($sort, $direction);
                })
                ->paginate(10)
                ->withQueryString();
    
        return view('admin.guests', compact('guests', 'search'));
    }
    
    public function show($code)
    {
        $guest = Guest::where('unique_code', $code)->firstOrFail();
        $weddingDate = '2025-06-25 08:00:00'; // Ganti dengan tanggal pernikahan
        
        return view('invitation', [
            'guest' => $guest,
            'weddingDate' => $weddingDate,
            'gallery' => [
                ['image' => 'prewed-1.jpg', 'caption' => 'Prewedding di Bali'],
                ['image' => 'prewed-2.jpg', 'caption' => 'Prewedding di Jogja'],
                ['image' => 'prewed-3.jpg', 'caption' => 'Prewedding di Jakarta'],
            ]
        ]);
    }
    
    public function rsvp(Request $request, $code)
    {
        $request->validate([
            'attending' => 'required|boolean',
            'guest_count' => 'required|integer|min:1|max:10'
        ]);
        
        $guest = Guest::where('unique_code', $code)->firstOrFail();
        $guest->update([
            'attending' => $request->attending,
            'guest_count' => $request->guest_count
        ]);
        
        return back()->with('success', 'Terima kasih telah mengonfirmasi kehadiran!');
    }
    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);
    
        $import = new GuestsImport();
        
        try {
            Excel::import($import, $request->file('excel_file'));
            
            $message = 'Import berhasil!';
            $skippedCount = count($import->getSkippedRows());
            
            if ($skippedCount > 0) {
                $message .= " ($skippedCount baris dilewati karena data tidak lengkap)";
            }
            
            return back()
                ->with('success', $message)
                ->with('skippedRows', $import->getSkippedRows());
                
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Error importing file: '.$e->getMessage());
        }
    }
}