@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
         <img src="{{$user->profile->profileImage()}}" alt="" class="rounded-circle" width="100px" height="100px">
        </div>
        <div class="col-9 pt-2">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{$user->username}}</div>
                  
                  <follow-button user-id='{{ $user->id }}' follows='{{ $follows }}'></follow-button>
                </div>
                
            @can('update',$user->profile)
                <a href="/p/create">Add New Post</a>
            @endcan
            </div>
            @can('update',$user->profile)
               <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            
            <div class="d-flex">
                <div class="pr-4"><strong>{{$postsCount}}</strong>posts</div>
                <div class="pr-4"><strong>{{$followersCount}}</strong>followers</div>
                <div class="pr-4"><strong>{{$followingCount}}</strong>following</div>
            </div>

            <div class="pt-2 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url}}</a></div>
         </div>
    </div>

    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
              <a href="{{ route('post.show', $post->id)}}">
              
              <img src="/storage/{{$post->image}}" alt="" class='w-100'>
              </a>
               
            </div>
        @endforeach
    </div>
</div>
@endsection
