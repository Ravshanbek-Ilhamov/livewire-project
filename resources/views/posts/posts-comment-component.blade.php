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
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">John Doe</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">Jan 1, 2022</time></a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
                      </ul>
                    </div><!-- End meta top -->

                    <div class="content">
                      <p>{{$detailingPost->description}}</p>

                      <p>{{$detailingPost->text}}</p>

                    </div><!-- End post content -->

                    <div class="meta-bottom">
                      <i class="bi bi-folder"></i>
                      <ul class="cats">
                        <li><a href="#">Business</a></li>
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

                  <h4 class="comments-count">8 Comments</h4>

                  <div id="comment-1" class="comment">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan,2022</time>
                        <p>
                          Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                          Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                        </p>
                      </div>
                    </div>
                  </div><!-- End comment #1 -->

                  <div id="comment-2" class="comment">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan,2022</time>
                        <p>
                          Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                        </p>
                      </div>
                    </div>

                    <div id="comment-reply-1" class="comment comment-reply">
                      <div class="d-flex">
                        <div class="comment-img"><img src="assets/img/blog/comments-3.jpg" alt=""></div>
                        <div>
                          <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                          <time datetime="2020-01-01">01 Jan,2022</time>
                          <p>
                            Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                            Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                            Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                          </p>
                        </div>
                      </div>

                      <div id="comment-reply-2" class="comment comment-reply">
                        <div class="d-flex">
                          <div class="comment-img"><img src="assets/img/blog/comments-4.jpg" alt=""></div>
                          <div>
                            <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                            <time datetime="2020-01-01">01 Jan,2022</time>
                            <p>
                              Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                            </p>
                          </div>
                        </div>

                      </div><!-- End comment reply #2-->

                    </div><!-- End comment reply #1-->

                  </div><!-- End comment #2-->

                  <div id="comment-3" class="comment">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets/img/blog/comments-5.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan,2022</time>
                        <p>
                          Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut quam ut. Voluptatem est accusamus iste at.
                          Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio veniam. Quam officia sit nostrum dolorem.
                        </p>
                      </div>
                    </div>

                  </div><!-- End comment #3 -->

                  <div id="comment-4" class="comment">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets/img/blog/comments-6.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan,2022</time>
                        <p>
                          Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore. Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.
                        </p>
                      </div>
                    </div>

                  </div><!-- End comment #4 -->

                </div>

              </section><!-- /Blog Comments Section -->

              <!-- Comment Form Section -->
              <section id="comment-form" class="comment-form section">
                <div class="container">

                  <form action="">

                    <h4>Post Comment</h4>
                    <p>Your email address will not be published. Required fields are marked * </p>
                    <div class="row">
                      <div class="col form-group">
                        <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
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
                      <li><a href="#">{{$category->name}} <span>({{$category->posts->count()}} )</span></a></li>
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
