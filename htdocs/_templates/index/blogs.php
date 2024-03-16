                <div class="album py-5 w-100" id="offcanvas-blogs-tab" role="tabpanel">
                    <div class="container">
                        <div class="row">
                            <?php
                                $blogs = Post::getAllBlogs();
                                use Carbon\Carbon;

                                if (!empty($blogs)) {
                                    foreach ($blogs as $blog) {
                                        $b = new Post($blog['id']);
                                        $uploaded_time = Carbon::parse($b->getUploadedTime());
                                        $uploaded_time_str = $uploaded_time->Format("M j, Y");
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 pt-4 wrap" id="blog-<?=$blog['id']?>">
                                <div class="blog-card-list" data-id="<?=$blog['id']?>">
                                    <article class="blog-card">
                                        <figure class="blog-card-image">
                                            <img src="<?=$blog['banner']?>" class="w-100" alt="Banner background Image">
                                        </figure>
                                        <div class="blog-card-header">
                                            <a href="#"><?=$blog['title']?></a>
                                            <?php
                                                if (Session::isAuthenticated()) {
                                                    $is_like = new BlogLike($blog['id']);
                                                    if ($is_like->is_liked() ? $is_like->is_liked()['owner'] : 0 == Session::getUser()->getUsername()) {
                                                        if ($is_like->is_liked()['status'] == 'liked') {
                                            ?>
                                            <!-- unlike button -->
                                            <button class="icon-button blog-like liked b-liked" id="like-<?=$blog['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326c1.194-.397 2.562-1.016 4.01-1.826M34.959 27l6.878 8.5m.001-8.5l-6.879 8.5"/>
                                                </svg>
                                            </button>
                                            <button class="icon-button blog-like b-like d-none" id="like-<?=$blog['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                    <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                </svg>
                                            </button>
                                            <?php } else { ?>
                                            <!-- like button -->
                                            <button class="icon-button blog-like b-like" id="like-<?=$blog['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                    <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                </svg>
                                            </button>
                                            <button class="icon-button blog-like b-liked d-none" id="like-<?=$blog['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326c1.194-.397 2.562-1.016 4.01-1.826M34.959 27l6.878 8.5m.001-8.5l-6.879 8.5"/>
                                                </svg>
                                            </button>
                                            <?php
                                                    }
                                                        } else { ?>
                                            <!-- like button -->
                                            <button class="icon-button blog-like" id="like-<?=$blog['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                    <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                </svg>
                                            </button>
                                            <?php } } ?>
                                        </div>
                                        <div class="blog-card-footer">
                                            <div class="blog-card-meta blog-card-meta">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="m20.975 12.185l-.739-.128zm-.705 4.08l-.74-.128zM6.938 20.477l-.747.065zm-.812-9.393l.747-.064zm7.869-5.863l.74.122zm-.663 4.045l.74.121zm-6.634.411l-.49-.568zm1.439-1.24l.49.569zm2.381-3.653l-.726-.189zm.476-1.834l.726.188zm1.674-.886l-.23.714zm.145.047l.229-.714zM9.862 6.463l.662.353zm4.043-3.215l-.726.188zm-2.23-1.116l-.326-.675zM3.971 21.471l-.748.064zM3 10.234l.747-.064a.75.75 0 0 0-1.497.064zm17.236 1.823l-.705 4.08l1.478.256l.705-4.08zm-6.991 9.193H8.596v1.5h4.649zm-5.56-.837l-.812-9.393l-1.495.129l.813 9.393zm11.846-4.276c-.507 2.93-3.15 5.113-6.286 5.113v1.5c3.826 0 7.126-2.669 7.764-6.357zM13.255 5.1l-.663 4.045l1.48.242l.663-4.044zm-6.067 5.146l1.438-1.24l-.979-1.136L6.21 9.11zm4.056-5.274l.476-1.834l-1.452-.376l-.476 1.833zm1.194-2.194l.145.047l.459-1.428l-.145-.047zm-1.915 4.038a8.378 8.378 0 0 0 .721-1.844l-1.452-.377A6.878 6.878 0 0 1 9.2 6.11zm2.06-3.991a.885.885 0 0 1 .596.61l1.452-.376a2.385 2.385 0 0 0-1.589-1.662zm-.863.313a.515.515 0 0 1 .28-.33l-.651-1.351c-.532.256-.932.73-1.081 1.305zm.28-.33a.596.596 0 0 1 .438-.03l.459-1.428a2.096 2.096 0 0 0-1.548.107zm2.154 8.176h5.18v-1.5h-5.18zM4.719 21.406L3.747 10.17l-1.494.129l.971 11.236zm-.969.107V10.234h-1.5v11.279zm-.526.022a.263.263 0 0 1 .263-.285v1.5c.726 0 1.294-.622 1.232-1.344zM14.735 5.343a5.533 5.533 0 0 0-.104-2.284l-1.452.377a4.03 4.03 0 0 1 .076 1.664zM8.596 21.25a.916.916 0 0 1-.911-.837l-1.494.129a2.416 2.416 0 0 0 2.405 2.208zm.03-12.244c.68-.586 1.413-1.283 1.898-2.19L9.2 6.109c-.346.649-.897 1.196-1.553 1.76zm13.088 3.307a2.416 2.416 0 0 0-2.38-2.829v1.5c.567 0 1 .512.902 1.073zM3.487 21.25c.146 0 .263.118.263.263h-1.5c0 .682.553 1.237 1.237 1.237zm9.105-12.105a1.583 1.583 0 0 0 1.562 1.84v-1.5a.083.083 0 0 1-.082-.098zm-5.72 1.875a.918.918 0 0 1 .316-.774l-.98-1.137a2.418 2.418 0 0 0-.83 2.04z"/>
                                                </svg>
                                                <p class="m-0" id="b-like-count-<?=$blog['id']?>"><?=$blog['like_count']?></p>
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
                            <?php
                                    }
                                } else {
                            ?>
                                <h5 class="text-muted text-center mt-4">No Blog's Posted Yet.</h5>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>