<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Kategori;
use App\Models\Location;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with(['kategori', 'location'])->get(); // menampilkan semua data event dari database, data di simpan dalam variabel events
        return view('admin.event.index', compact('events')); // mengirim data ke view admin.event.index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Kategori::all(); // mengambil semua data kategori dari database
        $locations = Location::all(); // mengambil semua data lokasi dari database
        return view('admin.event.create', compact('categories', 'locations')); // mengirim data kategori dan lokasi ke view admin.event.create yang akan digunakan dengan dropdown
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //berfungsi untuk menyimpan data event baru ke database
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_waktu' => 'required|date',
            'location_id' => 'required|exists:locations,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('events', 'public');
            $validatedData['gambar'] = $imagePath;
        }

        $validatedData['user_id'] = auth()->id(); // Menyimpan ID user yang sedang login sebagai pembuat event
        Event::create($validatedData);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        $categories = Kategori::all();
        $tickets = $event->tikets;

        return view('admin.event.show', compact('event', 'categories', 'tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $categories = Kategori::all();
        $locations = Location::all();
        return view('admin.event.edit', compact('event', 'categories', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $event = Event::findOrFail($id);

            $validatedData = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'tanggal_waktu' => 'required|date',
                'location_id' => 'required|exists:locations,id',
                'kategori_id' => 'required|exists:kategoris,id',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Handle file upload
            if ($request->hasFile('gambar')) {
                $imageName = time().'.'.$request->gambar->extension();
                $request->gambar->move(public_path('images/events'), $imageName);
                $validatedData['gambar'] = $imageName;
            }

            $event->update($validatedData);

            return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui event: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
