@csrf

@if (!empty($produk->foto))
      <div class="mb-2">
            <label>Gambar Saat Ini</label><br>
          <img src="{{ asset('storage/' . $produk->foto) }}" 
               width="150"
               class="img-thumbnail">
      </div>
@endif

<div class="row mb-3">
      <div class="col">
            <div>
                  <label>Gambar</label>
                  <input type="file" 
                     name="foto"
                     onchange="previewImage(this)"
                     class="form-control @error('foto') is-invalid @enderror">
                  @error('foto')
                        <div class="invalid-feedback d-block">
                         {{ $message }}
                        </div>
                  @enderror      
            </div>
      </div>
      <div class="col">
            <div class="mb-2">
                  <label>Preview Gambar</label>
                  <img id="preview" class="img-thumbnail mt-2" style="display: none;" width="150">
            </div>
      </div>
</div>

<div class="mb-3">
      <label>Nama Menu</label><br>
      <input type="text" name="name" 
             class="form-control @error('name') is-invalid @enderror"
             value="{{ old('name', $produk->name ?? '') }}">
      @error('name')
            <div class="invalid-feedback">
             {{ $message }}
            </div> 
      @enderror
</div>


   <div class="mb-3">
        <label>Jenis Menu</label><br>
               <select name="jenis" class="form-select bg-white text-slate-800" required>
                    <option value="">Pilih Jenis Menu</option>
                    <option value="Minuman">Minuman</option>
                    <option value="Makanan">Makanan</option>
               </select>
  </div>
    @error('jenis')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror


<div class="mb-3">
      <label>Harga Pokok</label><br>
      <input type="number" name="purchase_price" 
             class="form-control @error('purchase_price') is-invalid @enderror"
             value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">
      @error('purchase_price')
            <div class="invalid-feedback">
             {{ $message }}
            </div> 
      @enderror
</div>


<div class="mb-3">
      <label>Harga Jual</label><br>
      <input type="number" name="selling_price" 
             class="form-control @error('selling_price') is-invalid @enderror"
             value="{{ old('selling_price', $produk->harga_jual ?? '') }}">
      @error('selling_price')
            <div class="invalid-feedback">
             {{ $message }}
            </div> 
      @enderror
</div>

<div class="mb-3">
      <label>Stok Bahan</label><br>
      <input type="number" name="stok" 
             class="form-control @error('stok') is-invalid @enderror"
             value="{{ old('stok', $produk->stok ?? '') }}">
      @error('stok')
            <div class="invalid-feedback">
             {{ $message }}
            </div> 
      @enderror
</div>

<div class="d-flex justify-content-end gap-2 pt-3 border-top">
    <button type="submit" class="btn text-white fw-semibold rounded-3 px-4 shadow-sm border-0" style="background-color: #4f46e5;">
        <i class="bi bi-save me-1"></i> Simpan
    </button>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const file = input.files[0];

    if (!file) {
        preview.style.display = 'none';
        return;
    }

    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
}
</script>
