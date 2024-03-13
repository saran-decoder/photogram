                <div class="album py-5 w-100" id="offcanvas-blogs-tab" role="tabpanel">
                    <div class="container">
                        <div class="row" data-masonry='{"percentPosition": true }'>
                            <?php
                                $blogs = Post::getAllBlogs();
                                use Carbon\Carbon;

                                foreach ($blogs as $blog) {
                                    $b = new Post($blog['id']);
                                    $uploaded_time = Carbon::parse($b->getUploadedTime());
                                    $uploaded_time_str = $uploaded_time->Format("M j, Y");
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 pt-4 wrap" id="blog-<?=$blog['id']?>">
                                <div class="blog-card-list">
                                    <article class="blog-card">
                                        <figure class="blog-card-image">
                                            <img src="<?=$blog['banner']?>" class="w-100" alt="Banner background Image">
                                        </figure>
                                        <div class="blog-card-header">
                                            <a href="#"><?=$blog['title']?></a>
                                            <?php
                                                if (Session::isAuthenticated()) {
                                                    $islike = new Like($post['id']);
                                                    if ($islike->is_liked() ? $islike->is_liked()['owner'] : 0 == Session::getUser()->getUsername()) {
                                                        if ($islike->is_liked()['status'] == 'liked') {
                                            ?>
                                            <!-- unlike button -->
                                            <button class="icon-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326c1.194-.397 2.562-1.016 4.01-1.826M34.959 27l6.878 8.5m.001-8.5l-6.879 8.5"/>
                                                </svg>
                                            </button>
                                            <?php } else { ?>
                                            <!-- liked button -->
                                            <button class="icon-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                    <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                </svg>
                                            </button>
                                            <?php
                                                    }
                                                        } else { ?>
                                            <!-- liked button -->
                                            <button class="icon-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                    <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                </svg>
                                            </button>
                                            <?php } } ?>
                                        </div>
                                        <div class="blog-card-footer">
                                            <div class="blog-card-meta blog-card-meta" id="b-like-count-<?=$post['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 56 56">
                                                    <path fill="currentColor" d="M4.727 20.64c0 9.985 8.367 19.805 21.562 28.243c.516.304 1.219.633 1.711.633s1.195-.328 1.688-.633c13.218-8.438 21.586-18.258 21.586-28.242c0-8.297-5.696-14.157-13.29-14.157c-4.359 0-7.875 2.063-9.984 5.227c-2.11-3.14-5.648-5.227-9.984-5.227c-7.594 0-13.29 5.86-13.29 14.157m3.773 0c0-6.234 4.031-10.382 9.469-10.382c4.406 0 6.914 2.742 8.437 5.086c.633.937 1.032 1.195 1.594 1.195c.563 0 .914-.281 1.594-1.195c1.593-2.297 4.054-5.086 8.437-5.086c5.438 0 9.469 4.148 9.469 10.383c0 8.718-9.211 18.117-19.031 24.632c-.235.164-.375.282-.469.282c-.094 0-.258-.117-.492-.282C17.71 38.758 8.5 29.36 8.5 20.641"></path>
                                                </svg>
                                                <?=$b->getLikeCount()?>
                                            </div>
                                            <div class="blog-card-meta blog-card-meta">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
                                                    <rect x="2" y="4" width="20" height="18" rx="4" />
                                                    <path d="M8 2v4" />
                                                    <path d="M16 2v4" />
                                                    <path d="M2 10h20" />
                                                </svg>
                                                <?=$uploaded_time_str?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>