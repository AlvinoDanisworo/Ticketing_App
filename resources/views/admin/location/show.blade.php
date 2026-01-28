<x-layouts.admin title="Detail Lokasi">
    <div class="container mx-auto p-10">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-6">Detail Lokasi</h2>

                <div class="space-y-4">
                    <!-- Nama Lokasi -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Nama Lokasi</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" 
                            value="{{ $location->nama_lokasi }}" disabled />
                    </div>

                    <!-- Tanggal Dibuat -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Tanggal Dibuat</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" 
                            value="{{ $location->created_at->format('d M Y H:i') }}" disabled />
                    </div>

                    <!-- Tanggal Diupdate -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Terakhir Diupdate</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" 
                            value="{{ $location->updated_at->format('d M Y H:i') }}" disabled />
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="card-actions justify-end mt-6">
                        <a href="{{ route('admin.locations.index') }}" class="btn btn-ghost">Kembali</a>
                        <a href="{{ route('admin.locations.edit', $location->id) }}" class="btn btn-primary">Edit Lokasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
