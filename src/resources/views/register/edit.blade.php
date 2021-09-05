@extends('layout.master')
@section('content')
    <form id="registration-form-update" class="form-horizontal" role="form" method="POST" action="{{ route('register.update', ['id' => $register->id]) }}">
        <input type="hidden" name="_method" value="PATCH">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Registration</div>
            <div class="panel-body">
                <div id="response" class="alert hide" role="alert"></div>
                <div id="success" class="alert alert-success hide" role="alert"></div>
                <div id="error" class="alert alert-danger hide" role="alert"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Country Code</label>
                    <div class="col-sm-10">
                        <select name="country_code" class="form-control" required>
                            <option value="">--Please select--</option>
                            @foreach($countryCodes as $codes)
                                @if($register->country_code == $codes)
                                    <option value="{{ $codes }}" selected>{{ $codes }}</option>
                                @else
                                    <option value="{{ $codes }}" >{{ $codes }}</option>
                                @endif
                            @endforeach
                        </select>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ $register->name }}" required />
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="company" class="form-control" value="{{ $register->company }}">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Street Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="street" class="form-control" value="{{ $register->street }}" required />
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Street Number</label>
                    <div class="col-sm-10">
                        <input type="text" name="street_no" class="form-control" value="{{ $register->street_no }}" required />
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Zip Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="zip_code" class="form-control" value="{{ $register->zip_code }}" required />
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" name="city" class="form-control" value="{{ $register->city }}" required />
                        <p class="help-block"></p>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-sm btn-info btn-addon"><i class="glyphicon glyphicon-ok"></i>Update</button>
                <a href="{{ route('register.list') }}" class="btn btn-default btn-sm btn-addon"><i class="glyphicon glyphicon-remove"></i>Back</a>
            </div>
        </div>
    </form>
@endsection
