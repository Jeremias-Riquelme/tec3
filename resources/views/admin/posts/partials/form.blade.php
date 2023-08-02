<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del post']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div> 

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Ingrese el slug del post','readonly']) !!}
   
    @error('slug')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div> 

<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
   
    @error('category_id')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>

    @foreach ($tags as $tag)

    <label class="mr-2">
        {!! Form::checkbox('tags[]', $tag->id, null) !!}
        {{$tag->name}}
    </label>   

    @endforeach
    <hr>

    @error('tags')
    <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>

    <label>
     {!! Form::radio('status', 1, true) !!}
     Borrador
    </label>

    <label>
     {!! Form::radio('status', 2) !!}
     Publicado
    </label>

    <hr>

    @error('status')
    <small class="text-danger">{{$message}}</small>
    @enderror
  
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($post->image)
                    <img  id="picture" class="img-thumbnail" src="{{ Storage::url($post->image->url)}}" alt="">
                @else
                    <img id="picture" class="img-thumbnail"  src="https://media.istockphoto.com/id/1295900106/es/foto/cient%C3%ADficos-de-datos-programador-masculino-que-utiliza-el-ordenador-port%C3%A1til-analizando-y.jpg?s=612x612&w=0&k=20&c=ihG1nb1xTqsl8l2_sOTjtuSiIPGb-JfJ0Zmc4WEc19k=" alt="">
                @endif
           
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Agregar imagen') !!}
            {!! Form::file('file', ['class'=>'form-control-file','accept' =>'image/*']) !!}
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit perspiciatis incidunt itaque iste reiciendis aperiam repudiandae dicta quam sint velit labore, fuga ab accusantium! Dignissimos velit incidunt quisquam modi rerum.</p>
           
            @error('file')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}

    @error('extract')
     <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del Post') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    
    @error('body')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
