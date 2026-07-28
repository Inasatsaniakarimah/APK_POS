@csrf

<div class="mb-3 text-start">
    <label for="name" class="form-label font-monospace text-slate-600 small fw-bold">NAMA LENGKAP</label>
    <input 
        type="text" 
        name="name" 
        id="name"
        class="form-control bg-light border-0 text-slate-800 @error('name') is-invalid @enderror" 
        value="{{ old('name', $user->name ?? '') }}"
        placeholder="Masukkan nama pengguna"
        autocomplete="off"
        required
    >
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 text-start">
    <label for="email" class="form-label font-monospace text-slate-600 small fw-bold">EMAIL</label>
    <input 
        type="email" 
        name="email" 
        id="email"
        class="form-control bg-light border-0 text-slate-800 @error('email') is-invalid @enderror" 
        value="{{ old('email', $user->email ?? '') }}"
        placeholder="masukan email"
        autocomplete="off"
        required
    >
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 text-start">
    <label for="password" class="form-label font-monospace text-slate-600 small fw-bold">
        PASSWORD 
        @if(isset($user))
            <span class="text-slate-400 fw-normal fs-7">(Kosongkan jika tidak ingin diubah)</span>
        @endif
    </label>
    <input 
        type="password" 
        name="password" 
        id="password"
        class="form-control bg-light border-0 text-slate-800 @error('password') is-invalid @enderror"
        placeholder="isi password"
        autocomplete="new-password"
        {{ isset($user) ? '' : 'required' }}
    >
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4 text-start">
    <label for="role_id" class="form-label font-monospace text-slate-600 small fw-bold">ROLE / HAK AKSES</label>
    <select 
        name="role_id" 
        id="role_id"
        class="form-select bg-light border-0 text-slate-800 @error('role_id') is-invalid @enderror"
        required
    >
        <option value="" disabled {{ !old('role_id', $user->role_id ?? '') ? 'selected' : '' }}>-- pilih role --</option>
        @foreach($roles as $role)
            <option 
                value="{{ $role->id }}"
                @selected(old('role_id', $user->role_id ?? '') == $role->id)
            >
                {{ ucfirst($role->name) }}
            </option>
        @endforeach
    </select>
    @error('role_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex justify-content-end gap-2 pt-3 border-top">
    <a href="{{ route('admin.users') }}" class="btn btn-light text-slate-600 rounded-3 px-4 fw-medium">
        Batal
    </a>
    <button type="submit" class="btn text-white fw-semibold rounded-3 px-4 shadow-sm border-0" style="background-color: #4f46e5;">
        <i class="bi bi-save me-1"></i> Simpan
    </button>
</div>