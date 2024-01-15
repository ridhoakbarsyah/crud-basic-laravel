@extends('students.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>CRUD BASIC LARAVEL</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/student/create') }}" class="btn btn-success btn-sm" title="Add New Data">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Data
                        </a>
                       
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Program Studi</th>
                                        <th>Nomor WhatsApp</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $index + $students->firstItem() }}</th>
                                        <td>{{ $item->nim }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->program_study }}</td>
                                        <td>{{ $item->mobile }}</td>
 
                                        <td>
                                        <div class="text-right items-center">
                                            <a href="{{ url('/student/' . $item->id) }}" title="View Data" class="mr-1">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Detail</button>
                                            </a>
                                            
                                            <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Change Data" class="mr-1">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i> Ubah</button>
                                            </a>
                                            
                                            <form method="POST" action="{{ url('/student' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Data" onclick="return confirm(&quot;Sure delete the data?&quot;)">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{ $students->links() }}
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection