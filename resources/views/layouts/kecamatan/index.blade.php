@extends('layouts.index')
@section('css')

@endsection

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
                <div class="card-header">Data Kecamatan</div>
                <a href="{{route('kecamatan.create')}}" class="btn btn-outline-primary form-control">Tambah Data</a>
            </div>

             <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr class="bg-info">
                        <th scope="col">No</th>
                        <th scope="col">Kode Kecamatan</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Nama Kecamatan</th>
                        <th scope="col">Action</th>
                       </tr>  
                    </thead>
                    <tbody>
                         @php $no= 1; @endphp
                         @foreach($kecamatan as $data)
                            <tr>
                                <th scoppe="row">{{$no++}}</th>
                                <td>{{$data->kode_kecamatan}}</td>
                                <td>{{$data->kota->nama_kota}}</td>
                                <td>{{$data->nama_kecamatan}}</td>
                                <td><form action="{{route('kecamatan.destroy',$data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('kecamatan.show',$data->id)}}" class="btn btn-outline-success btn-sm"><i class="fa fa-eye"></a></i>
                                    <a href="{{route('kecamatan.edit',$data->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></a></i>
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Hapus?')"><i class="fa fa-trash-alt">
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
</div>
@endsection
@section('js')
@endsection


