@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-lef">  
            <h2>Articles</h2>
        </div>
        <div class="pull-right">
            @can('article-create')
                <a href="{{ route('articles.create') }}" class="btn btn-success">Create New Article</a>
            @endcan
        </div>
    </div>
</div>

@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Body</th>
        <th width="280px">Action</th>
    </tr>

    @foreach($articles as $article)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $article->title }}</td>
        <td>{{ $article->body }}</td>
        <td>
            <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Show</a>
                @can('article-edit')
                <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                @endcan

                @csrf
                @method('DELETE')
                @can('article-delete')
                <button type="submit" class="btn btn-danger">
                    DELETE
                </button>
                                  
                @endcan
                </form>
        </td>

    </tr>
    @endforeach
</table>
{!! $articles->links() !!}    
@endsection