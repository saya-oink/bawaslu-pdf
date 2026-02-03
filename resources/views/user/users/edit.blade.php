@extends('layouts.app')

@section('title','Edit User')

@section('content')
<div class="d-flex">

            {{-- PAGE TITLE --}}
            <div class="mb-4">
                <h4 class="fw-bold mb-1">Edit User</h4>
                <p class="text-muted mb-0">Perbarui data pengguna</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">

                    {{-- VALIDATION ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('admin.users.update',$user->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- AVATAR --}}
                        <div class="mb-4 text-center">

                            @if($user->avatar)
                                <img src="{{ asset('storage/'.$user->avatar) }}"
                                     class="rounded-circle shadow-sm mb-2"
                                     style="width:100px;height:100px;object-fit:cover;transition:.3s;"
                                     onmouseover="this.style.transform='scale(1.05)'"
                                     onmouseout="this.style.transform='scale(1)'">
                            @else
                                <div class="rounded-circle bg-danger text-white d-flex
                                            align-items-center justify-content-center mx-auto mb-2 shadow-sm"
                                     style="width:100px;height:100px;font-size:32px;">
                                    {{ strtoupper(substr($user->name,0,1)) }}
                                </div>
                            @endif

                            <input type="file"
                                   name="avatar"
                                   class="form-control mt-2"
                                   accept="image/png,image/jpeg">
                            <small class="text-muted">JPG / PNG • Maks 2MB</small>

                        </div>

                        {{-- NAMA --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name',$user->name) }}"
                                   required>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email',$user->email) }}"
                                   required>
                        </div>

                        {{-- ROLE --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="user"  {{ $user->role=='user'?'selected':'' }}>User</option>
                                <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                            </select>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Password <span class="text-muted">(kosongkan jika tidak diubah)</span>
                            </label>
                            <input type="password"
                                   name="password"
                                   class="form-control">
                        </div>

                        {{-- ACTION --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.users.index') }}"
                               class="btn btn-light">
                                Kembali
                            </a>

                            <button class="btn btn-danger px-4">
                                Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
