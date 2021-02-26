@extends('layouts.index')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         @if (session('message'))
                <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message') }}
                </div>
            @elseif(session('message1'))
                <div class="alert alert-danger" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('message1') }}
                </div>
            @endif
          
            <div class="card">
                <div class="card-header">Data Provinsi</div>

                <div class="card-body">
                    <a href="{{ route('provinsi.create') }}" class="btn btn-outline-primary form-control">
                        Tambah data
                    </a>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <th>No</th>
                            <th>Kode Provinsi</th>
                            <th>Nama Provinsi</th>
                            <th>Action</th> 
                        </thead>

                        <tbody>
                        @php $no = 1; @endphp
                            @foreach ($provinsi as $data)
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $data->kode_provinsi }} </td>
                                <td> {{ $data->nama_provinsi}} </td>
                                <td>
                                    <form action="{{ route('provinsi.destroy',$data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('provinsi.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('provinsi.show', $data->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> </a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('css')

@endsection
<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    });
</script>
@section('js')

@endsection
