@extends('admin.template.app')

@section('title', 'User')

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit User</h5>
                <a href="{{ route('user.index') }}">
                    <button type="button" class="btn btn btn-outline-danger" fdprocessedid="g81fsj"><i
                            class='bx bxs-chevron-left'></i>&nbsp;Kembali</button>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama', $user->nama) }}" placeholder="Nama" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="email" autocomplete="off" id="email" name="email" required
                                    class="form-control" value="{{ old('email', $user->email) }}" placeholder="Email"
                                    aria-label="Email" aria-describedby="email2" />
                                <span class="input-group-text" id="email2">@example.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" id="password" name="password"
                                fdprocessedid="jw8hfo" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="phone">Whatsapp</label>
                        <div class="col-sm-10">
                            <input type="text" id="whatsapp" name="whatsapp"
                                value="{{ old('whatsapp', $user->whatsapp) }}" required class="form-control phone-mask"
                                placeholder="088377189910" aria-describedby="phone" />
                        </div>
                    </div>
                    <hr class="mb-3 " />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="level" class="form-label">Level</label>
                                <select id="level" name="level" class="form-select" fdprocessedid="2tnrtb"
                                    placeholder="Pilih Level">
                                    <option disabled selected value="">Pilih Level</option>
                                    <option value="user" {{ $user->level == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">avatar</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div> --}}
                    </div>

                    <div class="row ">
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
