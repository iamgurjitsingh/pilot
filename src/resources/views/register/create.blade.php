@extends('layout.master')
@section('content')
    <form id="registration-form" class="form-horizontal" role="form" method="POST" action="{{ route('register.store') }}">
        <div class="panel panel-default">
            <div class="panel-heading">Create Registration</div>
            <div class="panel-body">
                <div id="response" class="alert hide" role="alert"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Country Code</label>
                    <div class="col-sm-10">
                        <select name="country_code" class="form-control" required>
                            <option value="">--Please select--</option>
                            @foreach($countryCodes as $codes)
                                <option value="{{ $codes }}">{{ $codes }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="company" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Street Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="street" class="form-control" value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Street Number</label>
                    <div class="col-sm-10">
                        <input type="text" name="street_no" class="form-control" value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Zip Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="zip_code" class="form-control" value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" name="city" class="form-control" value="" required />
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" id="saveRegister" class="btn btn-sm btn-success btn-addon"><i class="glyphicon glyphicon-ok"></i>Create</button>
                <a href="{{ route('register.list') }}" class="btn btn-default btn-sm btn-addon"><i class="glyphicon glyphicon-remove"></i>Back</a>
            </div>
        </div>
    </form>
@endsection
