@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kota') }}</div>

                <div class="card-body">
                <form  action="{{route('kota.store')}}" method="post">
                    @csrf
                   <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label"><b>Kode Kota</b></label>
                        <input type="number" class="form-control @error('kode_kota') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="kode_kota">
                        @error ('kode_kota')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                     </div>
                     <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="id_provinsi" class="form-control" >
                            @foreach($provinsi as $data)
                                <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label"><b>Nama Kota</b></label>
                        <input type="text" class="form-control @error('nama_kota') is-invalid @enderror" id="exampleInputPassword1" name="nama_kota">
                        @error ('nama_kota')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                     </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection