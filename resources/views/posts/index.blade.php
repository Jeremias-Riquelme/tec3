@extends('layouts.app')

@section('content')

@foreach ($posts as $post)
<div class="row">
  <div class="col-md-3">
    <div class="card">
        <div class="card-header">
        
                @if ($post->image)
                    <img  class="img-thumbnail" src="{{ Storage::url($post->image->url)}}" alt="">
                @else
                    <img class="img-thumbnail"  src="https://media.istockphoto.com/id/1295900106/es/foto/cient%C3%ADficos-de-datos-programador-masculino-que-utiliza-el-ordenador-port%C3%A1til-analizando-y.jpg?s=612x612&w=0&k=20&c=ihG1nb1xTqsl8l2_sOTjtuSiIPGb-JfJ0Zmc4WEc19k=" alt="">
                @endif
        </div>
        <div class="card-body">
            {{$post->body}}
        </div>
        <div class="card-footer">
            @foreach ($post->tags as $tag)
            <a href="" class="badge text-bg-dark bg-{{$tag->color}}-600">{{$tag->name}}</a> 
            @endforeach  
        </div>
    </div>
  </div>
</div>
  
@endforeach
{{$posts->links()}}
@endsection