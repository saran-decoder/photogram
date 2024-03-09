            <div class="tab-pane fade" id="blogs" role="tabpanel">
                <div class="container">
                    <!-- Card header START -->
                    <div class="border-0 pb-4 px-0 d-flex align-items-end justify-content-end">
                        <label class="blog-post rounded-1 p-1">
                            <input type="file" accept="image/*" name="blog_image" class="custom-file-input file pe-2" id="blog_image" multiple required hidden>
                            <span class="upload-button d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h9v2H5v14h14v-9h2v9q0 .825-.587 1.413T19 21zm3-4v-2h8v2zm0-3v-2h8v2zm0-3V9h8v2zm9-2V7h-2V5h2V3h2v2h2v2h-2v2z"/>
                                </svg>
                            </span>
                        </label>
                    </div>
                    <!-- Card header END -->
                    <div class="row gy-3 g-md-3 hcf-isotope-grid" data-masonry='{"percentPosition": true }'>
                        <div class="col-12 col-md-6 col-lg-6 wrap">
                            <div class="blog-card-list">
                                <article class="blog-card">
                                    <figure class="blog-card-image">
                                        <img src="<?=$post['image_uri']?>" alt="An orange painted blue, cut in half laying on a blue background" />
                                    </figure>
                                    <div class="blog-card-header">
                                        <a href="#">When life gives you oranges</a>
                                        <button class="icon-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="blog-card-footer">
                                        <div class="blog-card-meta blog-card-meta">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 56 56">
                                                <path fill="currentColor" d="M4.727 20.64c0 9.985 8.367 19.805 21.562 28.243c.516.304 1.219.633 1.711.633s1.195-.328 1.688-.633c13.218-8.438 21.586-18.258 21.586-28.242c0-8.297-5.696-14.157-13.29-14.157c-4.359 0-7.875 2.063-9.984 5.227c-2.11-3.14-5.648-5.227-9.984-5.227c-7.594 0-13.29 5.86-13.29 14.157m3.773 0c0-6.234 4.031-10.382 9.469-10.382c4.406 0 6.914 2.742 8.437 5.086c.633.937 1.032 1.195 1.594 1.195c.563 0 .914-.281 1.594-1.195c1.593-2.297 4.054-5.086 8.437-5.086c5.438 0 9.469 4.148 9.469 10.383c0 8.718-9.211 18.117-19.031 24.632c-.235.164-.375.282-.469.282c-.094 0-.258-.117-.492-.282C17.71 38.758 8.5 29.36 8.5 20.641"/>
                                            </svg>
                                            10k
                                        </div>
                                        <div class="blog-card-meta blog-card-meta">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
                                                <rect x="2" y="4" width="20" height="18" rx="4" />
                                                <path d="M8 2v4" />
                                                <path d="M16 2v4" />
                                                <path d="M2 10h20" />
                                            </svg>
                                            Jul 26, 2019
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>