@extends('layouts.backend')

@section('data')
{{ $complete->nama_lengkap }}
@endsection

@section('status')
{{ $user->role }}
@endsection

@section('content')
            <!--breadcrumb-->				
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tables</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<h4 class="mb-0 text-uppercase text-center">Data user yang bergejala covid-19</h4>
				<hr/>
            <!--end breadcrumb-->

				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Gejala</th>
                        <th>Keadaan Darurat ?</th>
                        <th>Butuh Ambulan ?</th>
                        <th>Tanggal</th>
                        <!-- <th>Updated at</th> -->
                    </tr>
								</thead>
								<tbody>
								<?php $no=1; ?>
								@foreach ($data as $row)
                                    @if(($row->keadaan ?? '') == 'ya')
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td><a href="{{url('/datapersonalgejala/'.$row->id)}}">{{$row->nama_lengkap}}</a></td>
                                            <td><div class="text-danger">{{$row->gejala}}</div></td>
                                            <td><div class="text-danger">{{$row->keadaan}}</div></td>
                                            <td>{{$row->ambulan}}</td>
                                            <td>{{$row->created_at}}</td>					
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td><a href="{{url('/datapersonalgejala/'.$row->id)}}">{{$row->nama_lengkap}}</a></td>
                                            <td>{{$row->gejala}}</td>
                                            <td>{{$row->keadaan}}</td>
                                            <td>{{$row->ambulan}}</td>
                                            <td>{{$row->created_at}}</td>					
                                        </tr>
                                    @endif
                                @endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>
@endsection