<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $produksDiterima = Produk::query()->where([
            'user_id' => $userId,
            'status_verifikasi' => 'diterima'
        ])->get();

        $produksMenunggu = Produk::query()->where([
            'user_id' => $userId,
            'status_verifikasi' => 'menunggu'
        ])->get();

        $produksDitolak = Produk::query()->where([
            'user_id' => $userId,
            'status_verifikasi' => 'ditolak'
        ])->get();

        return view('seller.produk', compact('produksDiterima', 'produksMenunggu', 'produksDitolak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan halaman form tambah produk
        // Asumsinya file blade kamu bernama create.blade.php dan ada di folder resources/views/seller/
        return view('seller.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input dari Form
        $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'thumbnail'   => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal 2MB
        ]);

        // 2. Proses Upload Gambar
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            // Gambar akan disimpan di folder storage/app/public/thumbnails
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // 3. Simpan Data ke Database (hanya field yang aman dari $fillable)
        $produk = new Produk();
        $produk->nama_produk       = $request->name;
        $produk->kategori          = $request->category;
        $produk->harga             = $request->price;
        $produk->deskripsi         = $request->description;
        $produk->gambar_produk     = $thumbnailPath;
        // Field sensitif — di-set eksplisit oleh server, BUKAN dari input user
        $produk->user_id           = Auth::id();
        $produk->status_verifikasi = 'menunggu';
        $produk->save();

        // 4. Redirect kembali dengan pesan sukses
        // Sesuaikan nama route dengan yang ada di web.php kamu
        return redirect()->route('produk.seller')->with('success', 'Jasa atau Produk berhasil ditambahkan dan sedang menunggu verifikasi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        // Pastikan hanya pemilik produk yang bisa melihat detail produknya
        if ($produk->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk melihat produk ini.');
        }

        return view('seller.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        // Pastikan hanya pemilik produk yang bisa mengedit produk ini
        if ($produk->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengubah produk ini.');
        }

        // Return ke view edit (misal: resources/views/seller/edit.blade.php)
        return view('seller.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        // Pastikan hanya pemilik produk yang bisa mengupdate
        if ($produk->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengubah produk ini.');
        }

        // 1. Validasi Input
        $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            // Pada edit, thumbnail bersifat 'nullable' (opsional) karena user tidak wajib ganti gambar
            'thumbnail'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
        ]);

        // 2. Update hanya field yang aman (dari $fillable)
        $produk->nama_produk = $request->name;
        $produk->kategori    = $request->category;
        $produk->harga       = $request->price;
        $produk->deskripsi   = $request->description;

        // Field sensitif — di-set eksplisit oleh server, BUKAN dari input user
        $produk->status_verifikasi = 'menunggu'; // Reset agar diverifikasi ulang oleh admin

        // 3. Logika jika user mengupload thumbnail baru
        if ($request->hasFile('thumbnail')) {
            
            // Hapus thumbnail lama dari storage jika filenya ada
            if ($produk->gambar_produk && Storage::disk('public')->exists($produk->gambar_produk)) {
                Storage::disk('public')->delete($produk->gambar_produk);
            }

            // Upload thumbnail baru
            $produk->gambar_produk = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // 4. Eksekusi update data ke database
        $produk->save();

        // 5. Redirect dengan pesan sukses
        return redirect()->route('produk.seller')->with('success', 'Jasa atau Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        // Pastikan hanya pemilik produk yang bisa menghapus produknya
        if ($produk->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus produk ini.');
        }

        // Hapus gambar dari storage jika ada
        if ($produk->gambar_produk && Storage::disk('public')->exists($produk->gambar_produk)) {
            Storage::disk('public')->delete($produk->gambar_produk);
        }

        $produk->delete();

        return redirect()->route('produk.seller')->with('success', 'Produk berhasil dihapus.');
    }
}
