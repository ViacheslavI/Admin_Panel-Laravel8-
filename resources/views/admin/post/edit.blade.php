@extends('layouts.admin_layout')
@section('title', 'Edit post')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit post {{$post->title}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary ">
                        <form method="POST" action="{{route('post.update',$post->id)}}">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" value="{{$post->title}}" name="title" class="form-control"
                                           id="name-post"
                                           placeholder="Enter name post" required>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select category</label>
                                        <select class="form-control" name="cat_id" id="" required>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"
                                                        @if($category->id==$post->cat_id )selected @endif>{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="editor" name="text " id=""
                                              style="width: 100%">{{$post->text}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">Feature Image</label>
                                    <img src="/{{$post->img}}" alt="" class="img-uploaded"
                                         style="display: block; width: 150px;">
                                    <input type="text" value="{{$post->img}}" class="form-control" id="feature_image"
                                           name="feature_image" value="" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image">Select Image</a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
