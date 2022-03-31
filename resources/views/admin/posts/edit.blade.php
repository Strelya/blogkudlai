@extends('admin.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Административная часть</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                    <li class="breadcrumb-item active">Административная часть</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Редактирование статьи "{{ $post->title }}"</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label>Название статьи</label>
                    <input type="text" class="form-control @error('title')
                        is-invalid
                    @enderror" name="title" value="{{ $post->title }}">
                    <div class="form-group">
                        <label for="description">Цитата</label>
                        <textarea class="form-control @error('description')
                        is-invalid
                    @enderror" id="description" name="description" rows="3">{{ $post->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea class="form-control @error('content')
                        is-invalid
                    @enderror" id="content" name="content" rows="5">{{ $post->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Категория</label>
                        <select class="form-control @error('category_id')
                        is-invalid
                    @enderror" id="category_id" name="category_id">
                            <option>Выберите рубрику</option>
                            @foreach ($categories as $k => $v)
                            <option value="{{ $k }}" @if($k==$post->category_id) selected @endif >{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Multiple</label>
                        <select class="select2" multiple="multiple" id="tags" name="tags[]" data-placeholder="Выберите тег" style="width: 100%;">
                            @foreach ($tags as $k => $v)
                            <option value="{{ $k }}" @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif >{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                <label class="custom-file-label" for="thumbnail">Выберите изображение</label>
                            </div>
                        </div>
                        <div><img src="{{ $post->getImage() }}" alt="" class="img-thumbnail"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection