<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-gray-900 leading-tight">
            Tambah Jasa / Produk
        </h2>
        <p class="text-sm text-gray-500 font-medium mt-1">
            Tambahkan layanan kreatif untuk ditampilkan di platform.
        </p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-[2rem]">
                    <h3 class="text-xl font-extrabold text-gray-900 mb-8">Informasi Jasa</h3>

                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-[13px] font-bold text-gray-700 mb-2">Nama Jasa /
                                Produk</label>
                            <input type="text" id="name" name="name"
                                placeholder="Contoh: Desain Poster Event Kampus"
                                class="block w-full rounded-xl border-gray-200 focus:border-[#4F46E5] focus:ring-[#4F46E5] shadow-sm text-sm py-2.5">
                        </div>

                        <div>
                            <label for="category"
                                class="block text-[13px] font-bold text-gray-700 mb-2">Kategori</label>
                            <select id="category" name="category"
                                class="block w-full rounded-xl border-gray-200 bg-indigo-50/40 focus:border-[#4F46E5] focus:ring-[#4F46E5] shadow-sm text-sm py-2.5 text-gray-700">
                                <option value="" disabled selected>Pilih kategori</option>
                                <option value="desain-publikasi">Desain Publikasi</option>
                                <option value="ui-design">UI Design</option>
                                <option value="social-media">Social Media</option>
                                <option value="web-development">Web Development</option>
                                <option value="video-editing">Video Editing</option>
                            </select>
                        </div>

                        <div>
                            <label for="price" class="block text-[13px] font-bold text-gray-700 mb-2">Harga</label>
                            <input type="number" id="price" name="price" placeholder="Contoh: 75000"
                                class="block w-full rounded-xl border-gray-200 focus:border-[#4F46E5] focus:ring-[#4F46E5] shadow-sm text-sm py-2.5">
                        </div>

                        <div>
                            <label for="description"
                                class="block text-[13px] font-bold text-gray-700 mb-2">Deskripsi</label>
                            <textarea id="description" name="description" rows="5"
                                placeholder="Jelaskan jasa atau produk yang kamu tawarkan..."
                                class="block w-full rounded-xl border-gray-200 focus:border-[#4F46E5] focus:ring-[#4F46E5] shadow-sm text-sm resize-none"></textarea>
                        </div>
                    </div>
                </div>

                <div
                    class="p-8 bg-white shadow-sm border border-gray-100 rounded-[2rem] flex flex-col sm:flex-row sm:items-start justify-between gap-6 relative">
                    <div>
                        <h3 class="text-xl font-extrabold text-gray-900">Thumbnail</h3>
                        <p class="text-sm text-gray-500 font-medium mt-1">Upload gambar terbaik untuk menarik perhatian
                            pembeli.</p>

                        <div id="preview-container" class="hidden mt-6">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Preview Thumbnail:
                            </p>
                            <img id="image-preview" src="" alt="Preview Thumbnail"
                                class="w-48 h-32 object-cover rounded-xl border border-gray-200 shadow-sm">
                        </div>
                    </div>

                    <div class="relative flex items-center justify-center shrink-0 mt-2">
                        <input type="file" id="thumbnail" name="thumbnail" onchange="previewImage(event)"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*">
                        <button type="button"
                            class="text-black px-8 py-3 rounded-xl font-medium text-sm shadow-md shadow-indigo-600/20 transition-all hover:-translate-y-0.5 active:scale-95">
                            Upload file
                        </button>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit"
                        class=" bg-[#4F46E5] hover:bg-indigo-700 text-white px-8 py-3 rounded-xl font-bold text-sm shadow-md shadow-indigo-600/20 transition-all hover:-translate-y-0.5 active:scale-95">
                        Simpan Jasa
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('image-preview');

            // Cek apakah ada file yang dipilih
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                // Ketika file selesai dibaca
                reader.onload = function(e) {
                    // Masukkan data gambar ke tag <img>
                    previewImage.src = e.target.result;
                    // Hapus class 'hidden' agar gambar dan labelnya muncul
                    previewContainer.classList.remove('hidden');
                }

                // Baca file sebagai URL data
                reader.readAsDataURL(input.files[0]);
            } else {
                // Jika user batal memilih gambar, sembunyikan lagi
                previewImage.src = "";
                previewContainer.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
