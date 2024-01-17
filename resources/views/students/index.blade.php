@extends('students.layout')
@section('content')

    <div class="container">
        <div class="row">
            @if(auth()->check()) {{-- Pastikan pengguna masuk --}}
            <p class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom mr-4 ml-4">Selamat datang, {{ auth()->user()->name }}</p>
            @endif
            
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom mr-4 ml-4">
                <ul class="nav nav-pills mb-2">
                    <li class="nav-item"><a href="/sesi/logout" class="nav-link">Logout</a></li>
                </ul>
            </header>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Mahasiswa</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/student/create') }}" class="btn btn-success btn-sm" title="Add New Data">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data
                        </a>
                        <div class="table-responsive mb-4 mr-4 mt-4 ml-4">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Program Studi</th>
                                        <th>Nomor WhatsApp</th>
                                        <th class="mr-4 mt-4 ml-4 mb-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $item->nim }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->prodi->program_study }}</td>
                                        <td>{{ $item->mobile }}</td>
 
                                        <td>
                                        <div class="text-right items-center">
                                            <a href="{{ url('/student/' . $item->id) }}" title="View Data" class="btn btn-info btn-sm mr-2 ml-2 mb-2">
                                                Detail
                                            </a>    
                                            <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Change Data" class="btn btn-primary btn-sm mr-2 ml-2 mb-2">
                                                Ubah
                                            </a>
    
                                            <form method="POST" action="{{ url('/student' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Data" onclick="return confirm(&quot;Sure delete the data?&quot;)">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{-- {{ $students->links() }} --}}
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection