@extends('layouts.dashboard')

@section('breadcrumb')
	<li class="breadcrumb-item">Dashboard</li>
	<li class="breadcrumb-item active">Kompetensi Keahlian</li>
@endsection

@section('content')

	<div class="row">
         <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                       <div class="card-title">{{ __('Tambah Kompetensi Keahlian') }}</div>
                     
                        <form method="post" action="{{ url('/dashboard/data-kompetensi') }}">
                           @csrf
                           
                           <div class="form-group">
                              <label>Nama Kompetensi Keahlian</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                              <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                           </div>
                           
                           <button type="submit" class="btn btn-success btn-rounded">
                                 <i class="mdi mdi-check"></i> Simpan
                           </button>
                        
                        </form>
                  </div>
              </div>     
            </div>
            
	</div>
     <div class="row">
           <div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="card-title">Data Kompetensi Keahlian</div>
               <form class="form-inline my-2 my-lg-0 mt-5" action="{{ url('dashboard/data-kompetensi') }}" method="GET">
									<input class="form-control mr-sm-2"  type="text" name="query" value="{{ $query }}" placeholder="Cari...">
									<button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Search</button>
								</form>        
						<div class="table-responsive mb-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">DIBUAT</th>
								    <th scope="col"></th>                                        
                                        </tr>
                                    </thead>
                                    <tbody>
								@php 
								$i=1;
								@endphp
								@foreach($skills as $value)
                                        <tr>					    
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->created_at->format('d M, Y') }}</td>
					
                                            <td>										                           
                               	 		  <div class="hide-menu">
                                    			<a href="javascript:void(0)" class="text-dark" id="actiondd" role="button" data-toggle="dropdown">
                                       				<i class="mdi mdi-dots-vertical"></i>
                                    			</a>
                                    				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="actiondd">
                                        			<a class="dropdown-item" href="{{ url('dashboard/data-kompetensi/'.$value->id.'/edit') }}"><i class="ti-pencil"></i> Edit </a>
											<form method="post" action="{{ url('dashboard/data-kompetensi', $value->id) }}" id="delete{{ $value->id }}">
												@csrf
												@method('delete')
												
												<button type="button" class="dropdown-item" onclick="deleteData({{ $value->id }})">
													<i class="ti-trash"></i> Hapus
												</button>	
											
											</form>																																																
                                        			                    							                                                                            
                                				</div>
                            				</div>								
								    </td>					
                                        </tr>
								@php
								$i++;
								@endphp
								@endforeach                                  
                                    </tbody>
                                </table>
                            </div>

					  <!-- Pagination -->
					@if($skills->lastPage() != 1)
						<div class="btn-group float-right">		
						   <a href="{{ $skills->previousPageUrl() }}" class="btn btn-success">
								<i class="mdi mdi-chevron-left"></i>
						    </a>
						    @for($i = 1; $i <= $skills->lastPage(); $i++)
								<a class="btn btn-success {{ $i == $skills->currentPage() ? 'active' : '' }}" href="{{ $kelas->url($i) }}">{{ $i }}</a>
						    @endfor
					        <a href="{{ $skills->nextPageUrl() }}" class="btn btn-success">
								<i class="mdi mdi-chevron-right"></i>
							</a>
					   </div>
					@endif
					<!-- End Pagination -->
					
					   @if(count($skills) == 0)
				  			<div class="text-center"> Tidak ada data!</div>
					   @endif
				</div>
			</div>
		</div>
     </div>

@endsection

@section('sweet')

   function deleteData(id){
      Swal.fire({
               title: 'PERINGATAN!',
               text: "Yakin ingin menghapus data kelas?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal',
            }).then((result) => {
               if (result.value) {
                     $('#delete'+id).submit();
                  }
               })
   }
   
@endsection