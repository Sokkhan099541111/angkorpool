@extends('employer.layouts.admin')

@section('content')
<div class="card">
    <div class="card-block">
        <form action="{{ route('employer.job.edit', [ 'id' => $job->id ]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group row {{ ! $errors->has('title') ?: 'has-danger' }}">
                <label for="title" class="col-sm-12 col-md-3 col-form-label">Job Title</label>
                <div class="col-sm-12 col-md-9">
                    <input class="form-control"
                            type="text"
                            id="title"
                            name="title"
                            value="{{ !$errors->isEmpty() ? old('title') : $job->title }}">
                    @if ($errors->has('title'))
                        <div class="form-control-feedback"><small>{{ $errors->first('title') }}</small></div>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ ! $errors->has('job-opening-status') ?: 'has-danger' }}">
                <label for="job-opening-status" class="col-sm-12 col-md-3 col-form-label">Job Opening Status</label>
                <div class="col-sm-12 col-md-9">
                    <select class="form-control" id="job-opening-status" name="job-opening-status">
                        @foreach($job_opening_statuses as $job_opening_status)
                            <option value="{{ $job_opening_status->id }}"
                                {{ !$errors->isEmpty() ?
                                        (old('job-opening-status') == $job_opening_status->id ? 'selected' : '') :
                                        ( $job->status == $job_opening_status->id ? 'selected' : '') }}>
                                {{ $job_opening_status->caption }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('job-opening-status'))
                        <div class="form-control-feedback"><small>{{ $errors->first('job-opening-status') }}</small></div>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ ! $errors->has('job-type') ?: 'has-danger' }}">
                <label for="job-type" class="col-sm-12 col-md-3 col-form-label">Job Type</label>
                <div class="col-sm-12 col-md-9">
                    <select class="form-control" id="job-type" name="job-type">
                        <option value="">--Select--</option>
                        @foreach($job_types as $job_type)
                            <option value="{{ $job_type->id }}"
                                {{ !$errors->isEmpty() ?
                                        (old('job-type') == $job_type->id ? 'selected' : '') :
                                        ( $job->job_type_id == $job_type->id ? 'selected' : '') }}>
                                {{ $job_type->caption }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('job-type'))
                        <div class="form-control-feedback"><small>{{ $errors->first('job-type') }}</small></div>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ ! $errors->has('salary') ?: 'has-danger' }}">
                <label for="salary" class="col-sm-12 col-md-3 col-form-label">Salary</label>
                <div class="col-sm-12 col-md-9">
                    <input class="form-control" type="text" id="salary" name="salary" value="{{ !$errors->isEmpty() ? old('salary') : $job->salary }}">
                    @if ($errors->has('salary'))
                        <div class="form-control-feedback"><small>{{ $errors->first('salary') }}</small></div>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ ! $errors->has('industry') ?: 'has-danger' }}">
                <label for="industry" class="col-sm-12 col-md-3 col-form-label">Industry</label>
                <div class="col-sm-12 col-md-9">
                    <select class="form-control" id="industry" name="industry">
                        <option value="">--Select--</option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}"
                                {{ !$errors->isEmpty() ?
                                        (old('industry') == $industry->id ? 'selected' : '') :
                                        ( $job->industry_id == $industry->id ? 'selected' : '') }}>
                                {{ $industry->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('industry'))
                        <div class="form-control-feedback"><small>{{ $errors->first('industry') }}</small></div>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ ! $errors->has('work-experience') ?: 'has-danger' }}">
                <label for="work-experience" class="col-sm-12 col-md-3 col-form-label">Work Experience</label>
                <div class="col-sm-12 col-md-9">
                    <input class="form-control" type="text" id="work-experience" name="work-experience" value="{{ !$errors->isEmpty() ? old('work-experience') : $job->work_experience }}">
                    @if ($errors->has('work-experience'))
                        <div class="form-control-feedback"><small>{{ $errors->first('work-experience') }}</small></div>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ ! $errors->has('number-of-position') ?: 'has-danger' }}">
                <label for="number-of-position" class="col-sm-12 col-md-3 col-form-label">No. Of Positions</label>
                <div class="col-sm-12 col-md-9">
                    <input class="form-control" type="text" id="number-of-position" name="number-of-position" value="{{ !$errors->isEmpty() ? old('number-of-position') : $job->number_of_positions }}">
                    @if ($errors->has('number-of-position'))
                        <div class="form-control-feedback"><small>{{ $errors->first('number-of-position') }}</small></div>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ ! $errors->has('location') ?: 'has-danger' }}">
                <label for="location" class="col-sm-12 col-md-3 col-form-label">Location</label>
                <div class="col-sm-12 col-md-9">
                    <select class="form-control" id="location" name="location">
                        <option value="">--Select--</option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->code }}"
                                {{ !$errors->isEmpty() ?
                                        (old('location') == $province->code ? 'selected' : '') :
                                        ( $job->province_code == $province->code ? 'selected' : '') }}>
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('location'))
                        <div class="form-control-feedback"><small>{{ $errors->first('location') }}</small></div>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ ! $errors->has('description') ?: 'has-danger' }}">
                <label for="description" class="col-sm-12 col-md-3 col-form-label">Description</label>
                <div class="col-sm-12 col-md-9">
                    <textarea class="form-control" type="text" id="description" name="description">{{ !$errors->isEmpty() ? old('description') : $job->description }}</textarea>
                    @if ($errors->has('description'))
                        <div class="form-control-feedback"><small>{{ $errors->first('description') }}</small></div>
                    @endif
                </div>
            </div>
            <div class="form-group row {{ ! $errors->has('closing-date') ?: 'has-danger' }}">
                <label for="closing-date" class="col-sm-12 col-md-3 col-form-label">Closing Date</label>
                <div class="col-sm-12 col-md-9">
                    <input class="form-control date"
                        type="text" id="closing-date"
                        name="closing-date"
                        placeholder="yyyy-mm-dd"
                        value="{{ !$errors->isEmpty() ? old('closing-date') : $job->closing_date->format('Y-m-d') }}">
                    @if ($errors->has('closing-date'))
                        <div class="form-control-feedback"><small>{{ $errors->first('closing-date') }}</small></div>
                    @endif
                </div>
            </div>
            <input type="checkbox" name="publish" id="publish" class="hide">
            <div class="form-group row mb-0">
                <div class="col-sm-12 col-md-9 offset-md-3 d-flex flex-column flex-md-row">
                    <button class="btn btn-secondary mb-1 mb-md-0 mr-md-1">Save</button>
                    <button class="btn btn-secondary" id="btn-publish">Save & Publish</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('script')
<script>
    $('#btn-publish').click(function(e){
        e.preventDefault();
        $('#publish').prop('checked', true);
        $('form').submit();
    });
</script>
@stop
