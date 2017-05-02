@extends('layouts.app')

@section('meta-title', $blog->title)

@section('content')

<div class="main-container">

            <div class="left-container">
                <div class="heading">
                    <div id="featured-image">
                        <img src="{{ asset('featured/images/' . $blog->id. '.png') }}" class="featured" alt="The uploaded featured image">
                    </div><!-- /.featured-image -->
                    <h1 class="blog--title is--padded-top-40">{!! $blog->title !!}</h1>
                    <div id="app">

                    </div>
                    <p id="published--at">Created on: <span><i class="fa fa-calendar" aria-hidden="true"></i></span> {!! date('F d, Y', strtotime($blog->created_at)) !!} </p>
                    <p id="published--at">Written by <small>Sehinde Raji</small></p>
                    <p class="is--beige is--lower">@markdown($blog->body)</p>

                </div><!-- /.heading -->

                <div class="button-blog">
                    <div class="previous">
                        @if($previous)
                            <ul>
                                <li>
                                    <a href="{{ URL::to( '/blogs/' . $previous->id ) }}"><i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>

                        @endif
                    </div><!-- /.left -->

                    <div class="centre">
                        <ul>
                            <li><a href="/blogs"><button class="btn-primary" type="button">Back</button></a></li>
                        </ul>

                    </div><!-- /.centre -->

                    <div class="next">
                        @if($next)
                            <ul>
                                <li>
                                    <a href="{{ URL::to( '/blogs/' . $next->id ) }}"><i class="fa fa-chevron-circle-right fa-2x" aria-hidden="true"></i></a>
                                </li>
                            </ul>

                        @endif
                    </div><!-- /.right -->

                </div><!-- /.button-blog -->
            </div><!-- /.left-container -->

            <div class="right-container">
                <div class="social-container">
                    <h2 class="is--padded side-heading">Comments:</h2>
                        @if(isset($comments['root']))
                            @include('blogs.comments.list', ['collection' => $comments['root']])
                            @include('blogs.comments.form')
                        @else
                            <p class="comment-heading">No historical comments today</p>
                            @include('blogs.comments.form')
                        @endif

                    <div class="social-buttons is--margin-top-50">

                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-575c2d11e407df7a"></script>


                    </div><!-- /.social-buttons -->


                    <div class="tag-buttons">
                        @unless($blog->tags->isEmpty())
                            <h2 class="side-heading">Tags:</h2>
                            <ul class="tag--centre">
                                @foreach($blog->tags as $tag)
                                    <a href="{{ url('/blogs', $blog->id) }}"><button class="btn-tag">{{ $tag->name }}</button></a>
                                @endforeach
                            </ul>
                        @endunless
                    </div><!-- /.tag-buttons -->
                </div><!-- /.social-container -->
            </div><!-- /.right-container -->

    </div><!-- /.main-container -->


@stop
