@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class="col-md-12">

            <div class="header_page">
                <h1>Posts</h1>
            </div>

            @foreach($posts as $p)
            <article class="post">

                <header>
                    <h3><a href="{{ route('post.edit', $p->id) }}">{{ $p->title }}</a></h3>
                </header>

                <article class="body">
                    {!! $p->summary !!}
                </article>

                <footer>
                    <form method="POST" action="{{ route('post.destroy', $p->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <!--<input class="btn btn-danger" type="submit" value="Delete">-->

                        <button type="submit" class="close delete_post">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                </footer>
            </article>
            @endforeach

            <div class="pagination">
                {{ $posts->links() }}
            </div>
        </section>
    </div>
</div>
@endsection
