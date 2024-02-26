            <div class="tab-pane fade active show" id="posts" role="tabpanel">
                <div class="container">
                    <div class="row gy-3 g-md-3 hcf-isotope-grid" data-masonry='{"percentPosition": true }'>
                        <?php
                            $userPosts = Post::getUserposts();
                            foreach ($userPosts as $post) {
                        ?>
                        <div class="col-12 col-md-6 col-lg-3 hcf-isotope-item">
                            <a class="hcf-masonry-card rounded rounded-4" type="button" id="post-<?=$post['id']?>">
                                <img class="card-img img-fluid" loading="lazy" src="<?=$post['image_uri']?>" alt="Your Post">
                            </a>
                            <!-- Modal -->
                            <div id="post-<?=$post['id']?>" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-live="assertive" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6 bg-img d-none d-sm-flex align-items-end" style="background-image: url('https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1331&q=80')">
                                                <div class="pb-5 pt-5 text-white">
                                                    <div> "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque error esse et ex "</div>
                                                    <h6>Adam Stuart, Super Paints</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6 py-5 px-sm-5 ">
                                                <h2>Sign Up</h2>
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputEmail4">Email</label>
                                                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputPassword4">Password</label>
                                                            <input type="text" class="form-control" id="inputPassword4" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputAddress">Address</label>
                                                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputAddress2">Address 2</label>
                                                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputCity">City</label>
                                                            <input type="text" class="form-control" id="inputCity">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">State</label>
                                                            <select id="inputState" class="form-control">
                                                                <option selected>Choose...</option>
                                                                <option>New York</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <button type="submit" class="btn btn-cta btn-cstm-success"  data-dismiss="modal" aria-label="Close">Sign Up</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    </div>
                                </div>
                            </div>
                            <!-- Modal Ends -->
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>