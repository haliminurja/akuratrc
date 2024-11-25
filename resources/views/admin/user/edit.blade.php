@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/select/bootstrap-select.min.css') }}">
@endsection

@section('title-header')
    <h3>Mengedit Administrator</h3>
@endsection

@section('content')
    <div class="flex-column-fluid">
        <div class="card mb-5 mb-xl-8 border-2 shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Mengedit Administrator</span>
                </h3>

            </div>
            <form action="{{ route('admin.user.update', ['user' => $id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="card-body">
                    @include('errors.alert')
                    <div class="row justify-content-md-center">
                        <div class="col-sm-6 align-content-center">
                            <div class="d-flex flex-column fv-row mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold required mb-2">
                                    <span>Nama</span>
                                </label>
                                <input type="text" name="nama_petugas" class="form-control form-control-sm "  value="{{ $one?->nama_petugas }}" required/>
                            </div>
                            <div class="d-flex flex-column fv-row mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold required mb-2">
                                    <span>Alamat</span>
                                </label>
                                <input type="text" name="alamat" class="form-control form-control-sm "  value="{{ $one?->alamat }}" required/>
                            </div>
                            <div class="d-flex flex-column fv-row mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold required mb-2">
                                    <span>Telepon</span>
                                </label>
                                <input type="text" name="telp" class="form-control form-control-sm "  value="{{ $one?->telp }}" required/>
                            </div>
                            <div class="d-flex flex-column fv-row mb-8">

                                <label class="d-flex align-items-center fs-6 fw-bold required mb-2">
                                    <span>Email</span>
                                </label>

                                <input type="text" name="email" class="form-control form-control-sm "
                                       value="{{ $one?->email }}" required/>
                            </div>
                            <div class="d-flex flex-column fv-row mb-8">

                                <label class="d-flex align-items-center fs-6 fw-bold required mb-2">
                                    <span>Username</span>
                                </label>

                                <input type="text" name="username" class="form-control form-control-sm "
                                       value="{{ $one?->username }}" required/>
                            </div>
                            <div class="d-flex flex-column fv-row mb-8" data-kt-password-meter="true">

                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span>Password</span>
                                </label>
                                <input type="text" name="password" class="form-control form-control-sm"/>
                            </div>
                            <div class="d-flex flex-column fv-row mb-8">

                                <label class="d-flex align-items-center fs-6 fw-bold required mb-2">
                                    <span>Status</span>
                                </label>
                                @php
                                    if ($one?->status == 'y') {
                                        $active = 'checked';
                                        $block = '';
                                    } else {
                                        $active = '';
                                        $block = 'checked';
                                    }
                                @endphp

                                <div class="d-flex fv-row mb-2">
                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid">

                                        <input {{ $active }} class="form-check-input me-3" name="status"
                                               type="radio" value="y" id="kt_modal_update_role_option_2">


                                        <label class="form-check-label" for="kt_modal_update_role_option_2">
                                            <div class="fw-bolder text-gray-800">Aktif</div>
                                        </label>

                                    </div>
                                    <!--end::Radio-->
                                </div>
                                <div class="d-flex fv-row">
                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid">

                                        <input {{ $block }} class="form-check-input me-3" name="status"
                                               type="radio" value="t" id="kt_modal_update_role_option_2">


                                        <label class="form-check-label" for="kt_modal_update_role_option_2">
                                            <div class="fw-bolder text-gray-800">Tidak Aktif</div>
                                        </label>

                                    </div>
                                    <!--end::Radio-->
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-sm btn-primary w-250px" id="btnSubmit">
                                    <span class="indicator-label">Save</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('assets/plugins/custom/select/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/select/bootstrap-select.min.js') }}"></script>
@endsection
