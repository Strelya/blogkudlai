                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Popular Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        @foreach ($popular_posts as $popular_post)
                                        <a href="{{ route('posts.single', ['slug' => $popular_post->slug])}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="{{ $popular_post->getImage()}}" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{ $popular_post->title}}</h5>
                                                <small>{{ $popular_post->getPostdate()}}</small>
                                                <small>| <i class="fa fa-eye"></i> {{ $popular_post->views}}</small>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Categories</h2>
                                <div class="link-widget">
                                    <ul>
                                        @foreach ($cats as $cat)
                                        <li><a href="{{ route('categories.single', ['slug' => $cat->slug]) }}">{{ $cat->title}} <span>({{ $cat->posts_count}})</span></a></li>
                                        @endforeach
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->