<div>

    @if ($post_details)
        
        <div class="container">
          <div class="row">

            <div class="col-lg-8">

              <!-- Blog Details Section -->
              <section id="blog-details" class="blog-details section">
                <div class="container">

                  <article class="article">

                    <div class="post-img">
                      <img src="assets/img/blog/blog-{{rand(1,6)}}.jpg" alt="" class="img-fluid">
                    </div>

                    <h2 class="title">{{$detailingPost->title}}</h2>

                    <div class="meta-top">
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="#">{{$detailingPost->views}}</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{$detailingPost->created_at}}</time></a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">{{$detailingPost->comments->count()}} Comments</a></li>
                        <li class="d-flex align-items-center"><a href="#" wire:click="likeDislike(1)"><i style="color: {{$likesDislike->where('value', true)->where('post_id', $detailingPost->id)->where('user_IP', request()->ip())->isNotEmpty() ? 'green' : '' }};" class="bi bi-hand-thumbs-up-fill"></i> {{$likesDislike->where('post_id',$detailingPost->id)->where('value',true)->count()}}</a></li>
                        <li class="d-flex align-items-center"><a href="#" wire:click="likeDislike(0)"><i style="color: {{$likesDislike->where('value', false)->where('post_id', $detailingPost->id)->where('user_IP', request()->ip())->isNotEmpty() ? 'red' : '' }};" class="bi bi-hand-thumbs-down-fill"></i> {{$likesDislike->where('post_id',$detailingPost->id)->where('value',false)->count()}}</a></li>
                      </ul>
                    </div><!-- End meta top -->

                    <div class="content">
                      <p>{{$detailingPost->description}}</p>

                      <p>{{$detailingPost->text}}</p> 

                    </div><!-- End post content -->

                    <div class="meta-bottom">
                      <i class="bi bi-folder"></i>
                      <ul class="cats">
                        <li><a href="#">{{$detailingPost->categories->name}}</a></li>
                        </ul>

                      <i class="bi bi-tags"></i>
                      <ul class="tags">
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">Tips</a></li>
                        <li><a href="#">Marketing</a></li>
                      </ul>
                    </div><!-- End meta bottom -->

                  </article>

                </div>
              </section><!-- /Blog Details Section -->
              <!-- Blog Comments Section -->
              <section id="blog-comments" class="blog-comments section">

                <div class="container">

                  <h4 class="comments-count">{{$detailingPost->comments->count()}} Comments</h4>
                
                  @php
                  function findChildComments($comment, $comment_form, $storingcomment)
                  {
                      if ($comment->child_comment->count() > 0) {
                          echo "<ul>";
                          foreach ($comment->child_comment as $childComment) {
                              echo "<li>";
                              echo "<div id='comment-{$childComment->id}' class='comment'>";
                              echo "  <div class='d-flex'>";
                              echo "      <div class='comment-img'>";
                              echo "          <img src='assets/img/blog/comments-" . rand(1, 6) . ".jpg' alt=''>";
                              echo "      </div>";
                              echo "      <div>";
                              echo "          <h5>";
                              echo "              <a href=''>{$childComment->user_name}</a>";
                              echo "              <a href='#comment-{$childComment->id}' class='reply' wire:click='storechildComment'>";
                              echo "                  <i class='bi bi-reply-fill'></i> Reply";
                              echo "              </a>";
                              echo "          </h5>";
                              echo "          <time datetime='{$childComment->created_at}'>{$childComment->created_at}</time>";
                              echo "          <p>{$childComment->text}</p>";
                              echo "      </div>";
                              echo "  </div>";
              
                              if ($comment_form == $childComment->id) {
                                  echo "<div class='reply-textarea mt-3 ms-5'>";
                                  echo "  <div class='row'>";
                                  echo "      <div class='col form-group'>";
                                  echo "          <textarea wire:model='storingchildcomment' class='form-control' placeholder='Your Comment*'></textarea>";
                                  echo "      </div>";
                                  echo "  </div>";
                                  echo "  <button class='btn btn-primary btn-sm mt-2' wire:click='storechildComment'>Submit Reply</button>";
                                  echo "</div>";
                              }
              
                              echo "</div>"; 
              
                              findChildComments($childComment, $comment_form, $storingcomment);
              
                              echo "</li>";
                          }
                          echo "</ul>";
                      }
                  }
              @endphp
              
              @foreach ($detailingPost->comments as $comment)
                  <div id="comment-{{$comment->id}}" class="comment">
                      <div id="coomment" class="d-flex">
                          <div class="comment-img">
                              <img src="assets/img/blog/comments-{{rand(1,6)}}.jpg" alt="">
                          </div>
                          <div>
                              <h5>
                                  <a href="">{{$comment->user_name}}</a>
                                  <a href="#coomment" class="reply" wire:click="storeParentComment({{$comment->id}})">
                                      <i class="bi bi-reply-fill"></i> Reply
                                  </a>
                              </h5>
                              <time datetime="{{$comment->created_at}}">
                                  {{$comment->created_at}}
                              </time>
                              <p>{{$comment->text}}</p>
                          </div>
                      </div>
              
                      <!-- Display reply form for the current comment -->
                      @if ($comment_form == $comment->id)
                          <div class="reply-textarea mt-3 ms-5">
                              <div class="row">
                                  <div class="col form-group">
                                      <textarea wire:model="storingchildcomment" class="form-control" placeholder="Your Comment*"></textarea>
                                  </div>
                              </div>
                              <button class="btn btn-primary btn-sm mt-2" wire:click="storechildComment">Submit Reply</button>
                          </div>
                      @endif
                  </div>
              
                  <!-- Render child comments -->
                  @php
                      findChildComments($comment, $comment_form, $storingcomment);
                  @endphp
              @endforeach
              
  
                </div>

              </section><!-- /Blog Comments Section -->

              <!-- Comment Form Section -->
              <section id="comment" class="comment-form section">
                <div class="container">

                  <form wire:submit="storeComment">

                    <h4>Post Comment</h4>
                    <p>Your email address will not be published. Required fields are marked * </p>
                    <div class="row">
                      <div class="col form-group">
                        <textarea wire:model="storingcomment" class="form-control" placeholder="Your Comment*"></textarea>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Post Comment</button>
                    </div>

                  </form>

                </div>
              </section><!-- /Comment Form Section -->

            </div>

            <div class="col-lg-4 sidebar">

              <div class="widgets-container">

            
                <!-- Categories Widget -->
                <div class="categories-widget widget-item">

                  <h3 class="widget-title">Categories</h3>
                  <ul class="mt-3">
                    @foreach ($categories as $category)
                        <li>
                            <a href="#" wire:click.prevent="filterByCategory({{ $category->id }})">
                                {{ $category->name }} 
                                <span>({{ $category->posts->count() }})</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                

                </div><!--/Categories Widget -->

                <!-- Recent Posts Widget -->
                <div class="recent-posts-widget widget-item">

                  <h3 class="widget-title">Recent Posts</h3>

                    @foreach ($recentPosts as $recents)
                      <div class="post-item">
                        <img src="assets/img/blog/blog-recent-{{rand(1,5)}}.jpg" alt="" class="flex-shrink-0">
                        <div>
                          <h4><a href="#" wire:click="post_details_page({{$recents->id}})">
                            {{$recents->title}}</a>
                          </h4>

                          <time datetime="2020-01-01">{{$recents->created_at}}</time>
                        </div>
                    </div><!-- End recent post item-->                      
                    @endforeach
                </div><!--/Recent Posts Widget -->

                <!-- Tags Widget -->
                <div class="tags-widget widget-item">

                  <h3 class="widget-title">Tags</h3>
                  <ul>
                    <li><a href="#">App</a></li>
                    <li><a href="#">IT</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Mac</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Office</a></li>
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Studio</a></li>
                    <li><a href="#">Smart</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>

                </div><!--/Tags Widget -->

              </div>

            </div>

          </div>
        </div>
    
    @else
         <!-- Page Title -->
         <div class="page-title" data-aos="fade">
          <div class="heading">
            <div class="container">
              <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                  <h1>Post Details</h1>
                  <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                </div>
              </div>
            </div>
          </div>
          <nav class="breadcrumbs">
            <div class="container">
              <ol>
                <li><a href="/">Posts</a></li>
                <li class="current">Post Details</li>
              </ol>
            </div>
          </nav>
        </div><!-- End Page Title -->

      <!-- Blog Posts Section -->
      <section id="blog-posts" class="blog-posts section">

          <div class="container">
            <div class="row gy-4">
              @foreach ($posts as $post)
                  
                  <div class="col-lg-4">
                      <article>
          
                      <div class="post-img">
                          <img src="assets/img/blog/blog-{{rand(1,6)}}.jpg" alt="" class="img-fluid">
                      </div>
          
                      <p class="post-category">{{$post->categories->name}}</p>
          
                      <h2 class="title">
                          <a href="#" wire:click="post_details_page({{$post->id}})">{{$post->title}}</a>
                      </h2>
          
                      <div class="d-flex align-items-center">
                          <img src="assets/img/blog/blog-author-{{rand(1,6)}}.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                          <div class="post-meta">
                          <p class="post-author">Maria Doe</p>
                          <p class="post-date">
                              <time datetime="2022-01-01">{{$post->created_at}}</time>
                          </p>
                          </div>
                      </div>
          
                      </article>
                  </div><!-- End post list item -->
              @endforeach
            </div>
            
          </div>

      </section><!-- /Blog Posts Section -->

      <!-- Blog Pagination Section -->
      <section id="blog-pagination" class="blog-pagination section">

          <div class="container">
            <div class="d-flex justify-content-center">
              <ul>
                <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#" class="active">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li>...</li>
                <li><a href="#">10</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>

      </section><!-- /Blog Pagination Section -->

    @endif


</div>
