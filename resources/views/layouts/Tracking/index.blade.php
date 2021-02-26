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
                <div class="card-header">{{ __('Data Corona') }}
                <a href="{{route('tracking.create')}}" class="float-right btn btn-outline-primary">Tambah Data</a>
            </div>

            <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                               <thead>
                                       <tr class="bg-info">
                                            <th scope="col">No</th>
                                            <th scope="col"><center>Lokasi</center></th>
                                            <th scope="col"><center>RW</center></th>
                                            <th scope="col"><center>Positif</center></th>
                                            <th scope="col"><center>Sembuh</center></th>
                                            <th scope="col"><center>Meninggal</center></th>
                                            <th scope="col"><center>Tanggal</center></th>
                                            <th scope="col"><center>Action</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no=1;
                                    @endphp
                                    @foreach($tracking as $data)

                                        <tr>
                                            <th scope="row"><center>{{$no++}}</center></th>
                                            <td>Kelurahan : {{$data->rw->kelurahan->nama_kelurahan}}<br>
                                            Kecamatan : {{$data->rw->kelurahan->kecamatan->nama_kecamatan}}<br>
                                            Kota : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}<br>
                                            Provinsi : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}</td>
                                            <td><center>{{$data->rw->nama_rw}}</center></td>
                                            <td><center>{{$data->positif}}</center></td>
                                            <td><center>{{$data->sembuh}}</center></td>
                                            <td><center>{{$data->meninggal}}</center></td>
                                            <td><center>{{$data->tanggal}}</center></td>
                                            <td>
                                            <form action="{{route('tracking.destroy',$data->id)}}"  method="POST">
                                            @csrf
                                            @method('DELETE')
                                    <a href="{{route('tracking.edit',$data->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></a></i>
                                    <button type="submit"  class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Hapus?')"><i class="fa fa-trash-alt">
                                            </form>
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
@push('index')
<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    });
</script>
@endpush
@section('js')
@endsection