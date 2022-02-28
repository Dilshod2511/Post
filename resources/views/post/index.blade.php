@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="bg-white wa m-4">
            <form action="/post" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group m-3">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" placeholder="Post Somithing"
                              class="p-3 w-100 bg-light rounded @error('body') border border-danger @enderror"></textarea>
                </div>

                @error('body')
                 <div class="text-danger m-3">
                     {{$message}}
                 </div>
                @enderror
                  <div class="m-3" >
                      <button class="btn btn-primary">Post</button>
                  </div>
            </form>

          @if($posts->count())

              @foreach($posts as $post)

                  <div class="ml-3 mr-3 mb-0">
                      <a href="" class="text-bold pr-2">{{$post->user->name}}</a>
                      <span class="text-dark text-small">{{$post->created_at->diffForHumans()}}</span>

                      <p class='p-0 m-0'>{{$post->body}}</p>
                  </div>

                  <div class="d-flex align-items-center">

                      @if(!$post->likesBy(auth()->user()))
                      <form action='/posts/{{$post->id}}/likes' method="post" enctype="multipart/form-data" class="d-inline ">
                          @csrf
                       <button class="p-0 m-0 d-inline bg-white border-0 mr-2 ml-3 mb-2 text-primary" type="submit">Like</button>

                      </form>
                      @else
                      <form action="{{route('posts.likes',$post->id)}}" method="post" enctype="multipart/form-data" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="p-0 m-0 d-inline bg-white border-0 mr-2 mb-2 ml-3  text-primary" type="submit">Unlike</button>
                      </form>
                      @endif
                      <span class="mb-2 mr-2">{{$post->likes->count()}} {{Str::plural('like',$post->likes->count())}}</span>

                  </div>

                  @endforeach
                  <div class="d-flex justify-content-center m-4">
                      {{$posts->links()}}
                  </div>
              @else
                  <p class="m-4">There are not post</p>
            @endif

        </div>

    </div>
@endsection

