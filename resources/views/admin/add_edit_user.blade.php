@extends('layouts.content')
@section('main-content')

<div class="container">
    <div class="col-md-12">
        <div class="form-appl">
            <h3>{{$title}}</h3>
            <form class="form1" method="post" action="@if (isset($edit->id)) {{ route('admin.update', ['id' => $edit->id]) }} @else {{ route('admin.store') }} @endif" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12 mb-3">
                    <label for="">Nombre completo del empleado</label>
                    <input class="form-control" type="text" name="name" placeholder="Nombre del empleado" value="@if (isset($edit->id)) {{ $edit->name }}@else {{ old('name') }} @endif">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Correo electrónico del empleado</label>
                    <input class="form-control" type="text" name="email" placeholder="Correo electrónico del empleado" value="@if (isset($edit->id)) {{ $edit->email }}@else {{ old('email') }} @endif">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Cargo del empleado</label>
                    <input class="form-control" type="text" name="cargo" placeholder="El cargo del empleado" value="@if (isset($edit->id)) {{ $edit->cargo }}@else {{ old('cargo') }} @endif">
                    @error('cargo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Salario del empleado</label>
                    <input class="form-control" type="number" name="salario" placeholder="El salario del empleado" value="@if (isset($edit->id)) {{ $edit->salario }}@else {{ old('salario') }} @endif" required min="0">
                    @error('salario')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-5">
                    <label for="">Foto del empleado</label>
                    <div class="avatar-upload">
                        <div>
                            <input type='file' id="imageUpload" name="photo" accept=".png, .jpg, .jpeg" onchange="previewImage(this)" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="@if (isset($edit->id) && $edit->photo != '') background-image:url('{{ url('/') }}/uploads/{{ $edit->photo }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif"></div>
                        </div>
                    </div>
                    @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" class="btn btn-black" value="Agregar">
                <a class="btn btn-black" href="{{ route('admin.index') }}">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
                $("#imagePreview").hide();
                $("#imagePreview").fadeIn(700);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
    }

    .avatar-upload .avatar-preview {
        width: 67%;
        height: 147px;
        position: relative;
        border-radius: 3%;
        border: 6px solid #F8F8F8;
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 3%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .btn-black {
        background-color: black !important;
        color: white !important;
    }
</style>
