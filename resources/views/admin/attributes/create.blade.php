@extends('admin.app')
@section('title')  @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-cogs"></i> TASKS</h1>
    </div>
</div>
@include('admin.partials.flash')
<div class="form-row user">
    <div class="col-md-3">
           <!--  <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                </ul> -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.attributes.store') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Task Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="name">Task Name:</label>
                                    <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter task name"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required="required"
                                    />
                                </div>


                                <div class="form-group">
                                    <label class="control-label" for="price">Task Budget:</label>
                                    <input
                                    class="form-control"
                                    type="number"
                                    placeholder="Enter task Budget"
                                    id="price"
                                    name="price"
                                    value="{{ old('price') }}"
                                    required="required"
                                    />
                                </div>



                                <div class="form-group">
                                    <label class="control-label" for="brand_id">Project</label>
                                    <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror" required="required">
                                        <option value="0">Attach a Project </option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_id') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="name">Start Date</label>
                                    <input
                                    class="form-control"
                                    type="date"
                                    placeholder="Enter start date"
                                    id="start"
                                    name="start"
                                    value="{{ old('start') }}"
                                    required="required"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="end">Start Date</label>
                                    <input
                                    class="form-control"
                                    type="date"
                                    placeholder="Enter end date"
                                    id="end"
                                    name="end"
                                    min="start"
                                    value="{{ old('end') }}"
                                    required="required"
                                    />
                                </div>


                                <div class="form-group">
                                    <label class="control-label" for="brand_id">Employee</label>
                                    <select name="employee_id" id="employee_id" class="form-control @error('employee_id') is-invalid @enderror" required="required">
                                        <option value="0">Attach a employee </option>
                                        @foreach($employee as $employe)
                                        <option value="{{ $employe->id }}">{{ $employe->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('employee_id') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Task</button>
                                        <a class="btn btn-danger" href="{{ route('admin.attributes.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
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
