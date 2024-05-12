@extends('layouts.content')

@section('main-content')
    @extends('layouts.app')

    @section('title', 'Lista de Usuarios')

    @section('content')
        <div class="container">
            <h2>Lista de Usuarios</h2>

            <div class="text-end mb-5">
                <a href="{{ route('admin.create') }}" class="btn btn-delete" style="background-color: black; color: white;">Añadir nuevo usuario</a>
            </div>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Cargo</th>
                            <th>Salario</th>
                            <th>Foto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->cargo }}</td>
                                <td>{{ $row->salario }}</td>
                                <td>
                                    <div class="showPhoto">
                                    <div id="imagePreview" style="@if ($row->photo != '') background-image:url('{{ url('/') }}/uploads/{{ $row->photo }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif;">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit', ['id' => $row->id]) }}" class="btn btn-edit">Editar</a>
                                    <button class="btn btn-delete" onClick="deleteFunction('{{ $row->id }}')">Eliminar</button>                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No se encontraron usuarios</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @include ('admin.modal_delete')
@endsection
 
@push('js')
<script>
    function deleteFunction(id) {
        document.getElementById('delete_id').value = id;
        $("#modalDelete").modal('show');
    }
</script>
@endpush
@endsection
<style>
    .showPhoto {
        width: 100%;
        height: 80px;
        margin: auto;
    }
 
    .showPhoto>div {
        width: 100%;
        height: 100%;
        border-radius: 20%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .table .btn-edit {
        border: 2px solid black;
        border-radius: 5px;
        color: black;
    }

    .table .btn-delete {
        background-color: black;
        border: 2px solid black;
        border-radius: 5px;
        color: white;
    }
</style>
