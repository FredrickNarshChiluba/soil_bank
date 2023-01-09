@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
=@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Project - Create Project</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.products.store') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Project Data</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="name">Name</label>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter project name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- <div class="row"> -->
                                    
                                        <div class="form-group">
                                            <label class="control-label" for="price">project Budget</label>
                                            <input
                                                class="form-control @error('price') is-invalid @enderror"
                                                type="number"
                                                placeholder="Enter project budget"
                                                id="price"
                                                name="price"
                                                value="{{ old('price') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="brand_id">Categories</label>
                                                        <select name="categories_id" id="categories_id" class="form-control @error('categories_id') is-invalid @enderror">
                                                            <option value="0">Select a Project category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback active">
                                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('categories_id') <span>{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                

                                <div class="w3-cell-row">
                                      <div class="w3-container w3-cell w3-mobile w3-cell-middle" style="width:49%; padding:0">

                                        Start Date  <input id="from" class="w3-input w3-large w3-round" onfocus="swapTypes('from')" onchange="enableInput(this);" placeholder="Project start Date" type="date" name="start" min="<?php echo date("Y-m-d"); ?>"  required>
                                      </div>
                                      <div class="w3-container w3-cell w3-cell-middle w3-mobile" style="width:2%">
                                          <span class="w3-large w3-center">To</span>
                                      </div>
                                      <div class="w3-container w3-cell w3-cell-middle w3-mobile" style="width:49%; padding:0">
                                        <!-- max="2019-06-16" / min="2019-06-16" [Formats] -->
                                        End Date  <input min="" id="to" class="w3-input w3-large w3-round" placeholder="Project End Date"  onfocus="swapTypes('to')" type="date" name="end" required >
                                      </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label" for="description">Description</label>
                                    <textarea name="description" id="description" rows="2" class="form-control"></textarea>
                                </div>
                              
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Project</button>
                                        <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#categories').select2();
        });

        function Datepickerctrl(){
            var startDate=$("from").val();
            var endDate=$("to").val();
            if (startDate != '' && endDate !='') {
                if (Date.parse(endDate)>Date.parse(startDate)) {
                    $('to').val();
                    alert("start date can't b greater than end date");

                }
            }
            return false;
            // .datepicker({minDate:startDate.data('DateTimepicker').date() });
            // function setMinDate(){
            //     return to.data('DateTimepicker').minDate(from.data('DateTimepicker').date());
            }

        }
        var bound =false;
        function bindMinToFrom(){
            return bound || from.on('dp.change',setMinDate);

        }
        to.on('dp.change',()=>{
            bindMinToFrom();
            bound=true;
            setMinDate();
        });
    </script>
@endpush
