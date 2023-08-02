@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('category.index') }}" class="btn btn-primary text-white float-right"> Back </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name"> Name </label>
                            <span> {{ $category->name }} </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug"> Slug </label>
                            <span> {{ $category->slug }} </span>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description"> Description </label>
                            <span> {{ $category->description }} </span>
                        </div>
                        <div class="col-md-12 mb-5">
                            <label for="image"> Image </label>
                            <img src="{{ asset('uploads/category/' . $category->image) }}" alt="" width="80px"
                                height="80px" class="mt-3">
                        </div>
                        <div class="col-md-6 mb-3">
                            <h3> SEO Tags </h3>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status"> Status </label>
                            @if ($category->status == '1')
                                <input type="checkbox" name="status" id="status"
                                    {{ $category->status == '1' ? 'checked' : '' }} @disabled(true)>
                            @else
                                <input type="checkbox" name="status" id="status">
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="meta_title"> Meta Title </label>
                            <span> {{ $category->meta_title }} </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="meta_keyword"> Meta Keyword </label>
                            <span> {{ $category->meta_keyword }} </span>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_description"> Meta Description </label>
                            <span> {{ $category->meta_description }} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
