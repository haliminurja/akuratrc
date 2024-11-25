@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/select/bootstrap-select.min.css') }}">
@endsection

@section('content')
    <div class="flex-column-fluid">
        <div class="card mb-5 mb-xl-8 border-2 shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">kontak</span>
                </h3>

            </div>
            <form action="{{ route('admin.kontak.update', $id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('errors.alert')
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>alamat</span>
                        </label>
                        <textarea type="text" name="alamat" class="form-control form-control-sm " required>{{$one?->alamat}}</textarea>

                    </div>

                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>maps</span>
                        </label>
                        <input type="text" name="maps" class="form-control form-control-sm " value="{{$one?->maps}}" required />
                    </div>

                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>email</span>
                        </label>
                        <input type="text" name="email" class="form-control form-control-sm " value="{{$one?->email}}" required />
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>telepon</span>
                        </label>
                        <input type="text" name="telp" class="form-control form-control-sm " value="{{$one?->telp}}" required />
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                            <span>Status</span>
                        </label>
                        @php
                            if ($one->status == 'y') {
                                $active = 'checked';
                                $block = '';
                            } else {
                                $active = '';
                                $block = 'checked';
                            }
                        @endphp
                        <div class="d-flex fv-row mb-2">
                            <div class="form-check form-check-custom form-check-solid">
                                <input {{ $active }} class="form-check-input me-3" name="status" type="radio"
                                    value="y" id="kt_modal_update_role_option_1">
                                <label class="form-check-label" for="kt_modal_update_role_option_1">
                                    <div class="fw-bolder text-gray-800">Ya</div>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex fv-row">
                            <div class="form-check form-check-custom form-check-solid">
                                <input {{ $block }} class="form-check-input me-3" name="status" type="radio"
                                    value="t" id="kt_modal_update_role_option_2">
                                <label class="form-check-label" for="kt_modal_update_role_option_2">
                                    <div class="fw-bolder text-gray-800">Tidak Aktif</div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary w-250px" id="btnSubmit">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('assets/plugins/custom/select/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/select/bootstrap-select.min.js') }}"></script>
    <script>
        window.onbeforeunload = function() {
            $("button[type=submit]").prop("disabled", "disabled");
        }
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
@endsection
