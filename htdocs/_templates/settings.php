<main class="d-flex flex-nowrap vh-100">
    
    <?php Session::loadTemplate('_header'); ?>

    <style>.setting-form-control::placeholder{ color: var(--timer-color); }</style>

    <div class="d-flex flex-column-reverse justify-content-end overflow-auto main-display w-100">

        <div class="container overflow-auto">
            <!-- Row STARTED -->
            <div class="row">

                <!-- Main content START -->
                <div class="col p-0">
                    <!-- Setting Tab content START -->
                    <div class="tab-content">

                        <!-- Account setting tab START -->
                        <?php Session::loadTemplate('settings/account'); ?>
                        <!-- Account setting tab END -->

                        <!-- Password tab START -->
                        <?php Session::loadTemplate('settings/pass'); ?>
                        <!-- Password tab END -->


                        <!-- Close account tab START -->
                        <div class="tab-pane fade" id="nav-setting-tab-6">
                            <!-- Card START -->
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title">Delete account</h5>
                                    <p class="mb-0">He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty gay assistance joy. Unaffected at ye of compliment alteration to.</p>
                                </div>
                                <!-- Card header START -->
                                <!-- Card body START -->
                                <div class="card-body">
                                    <!-- Delete START -->
                                    <h6>Before you go...</h6>
                                    <ul>
                                        <li>Take a backup of your data <a href="#">Here</a> </li>
                                        <li>If you delete your account, you will lose your all data.</li>
                                    </ul>
                                    <div class="form-check form-check-md my-4">
                                        <input class="form-check-input" type="checkbox" value="" id="deleteaccountCheck">
                                        <label class="form-check-label" for="deleteaccountCheck">Yes, I'd like to delete my account</label>
                                    </div>
                                    <a href="#" class="btn btn-success-soft btn-sm mb-2 mb-sm-0">Keep my account</a>
                                    <a href="#" class="btn btn-danger btn-sm mb-0">Delete my account</a>
                                    <!-- Delete END -->
                                </div>
                                <!-- Card body END -->
                            </div>
                            <!-- Card END -->
                        </div>
                        <!-- Close account tab END -->

                    </div>
                    <!-- Setting Tab content END -->
                </div>

                
            </div>
            <!-- Row END -->
        </div>
        
        <!-- Sidenav START -->
        <div class="col-lg-3 side-setting">

            <div class="mx-0">
                <!-- Card START -->
                <div class="setting w-100">
                    <!-- Card body START -->
                    <div class="setting-body p-3">
                        <!-- Side Nav START -->
                        <ul class="nav-icon list-unstyled d-flex justify-content-around m-0 border-0" role="tablist">
                            <li class="nav-item mb-0">
                                <a class="nav-link text d-flex justify-content-center mb-0 active" data-bs-toggle="pill" href="#nav-account-tab" role="tab" aria-controls="posts" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16">
                                        <path fill="currentColor" d="M16 7.992C16 3.58 12.416 0 8 0S0 3.58 0 7.992c0 2.43 1.104 4.62 2.832 6.09c.016.016.032.016.032.032c.144.112.288.224.448.336c.08.048.144.111.224.175A7.98 7.98 0 0 0 8.016 16a7.98 7.98 0 0 0 4.48-1.375c.08-.048.144-.111.224-.16c.144-.111.304-.223.448-.335c.016-.016.032-.016.032-.032c1.696-1.487 2.8-3.676 2.8-6.106m-8 7.001c-1.504 0-2.88-.48-4.016-1.279c.016-.128.048-.255.08-.383a4.17 4.17 0 0 1 .416-.991c.176-.304.384-.576.64-.816c.24-.24.528-.463.816-.639c.304-.176.624-.304.976-.4A4.15 4.15 0 0 1 8 10.342a4.185 4.185 0 0 1 2.928 1.166c.368.368.656.8.864 1.295c.112.288.192.592.24.911A7.03 7.03 0 0 1 8 14.993m-2.448-7.4a2.49 2.49 0 0 1-.208-1.024c0-.351.064-.703.208-1.023c.144-.32.336-.607.576-.847c.24-.24.528-.431.848-.575c.32-.144.672-.208 1.024-.208c.368 0 .704.064 1.024.208c.32.144.608.336.848.575c.24.24.432.528.576.847c.144.32.208.672.208 1.023c0 .368-.064.704-.208 1.023a2.84 2.84 0 0 1-.576.848a2.84 2.84 0 0 1-.848.575a2.715 2.715 0 0 1-2.064 0a2.84 2.84 0 0 1-.848-.575a2.526 2.526 0 0 1-.56-.848zm7.424 5.306c0-.032-.016-.048-.016-.08a5.22 5.22 0 0 0-.688-1.406a4.883 4.883 0 0 0-1.088-1.135a5.207 5.207 0 0 0-1.04-.608a2.82 2.82 0 0 0 .464-.383a4.2 4.2 0 0 0 .624-.784a3.624 3.624 0 0 0 .528-1.934a3.71 3.71 0 0 0-.288-1.47a3.799 3.799 0 0 0-.816-1.199a3.845 3.845 0 0 0-1.2-.8a3.72 3.72 0 0 0-1.472-.287a3.72 3.72 0 0 0-1.472.288a3.631 3.631 0 0 0-1.2.815a3.84 3.84 0 0 0-.8 1.199a3.71 3.71 0 0 0-.288 1.47c0 .352.048.688.144 1.007c.096.336.224.64.4.927c.16.288.384.544.624.784c.144.144.304.271.48.383a5.12 5.12 0 0 0-1.04.624c-.416.32-.784.703-1.088 1.119a4.999 4.999 0 0 0-.688 1.406c-.016.032-.016.064-.016.08C1.776 11.636.992 9.91.992 7.992C.992 4.14 4.144.991 8 .991s7.008 3.149 7.008 7.001a6.96 6.96 0 0 1-2.032 4.907"/>
                                    </svg>
                                    <span class="d-none">Account</span>
                                </a>
                            </li>
                            <li class="nav-item mb-0">
                                <a class="nav-link text d-flex justify-content-center mb-0" data-bs-toggle="pill" href="#nav-pass-tab" role="tab" aria-controls="posts" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M2 17h20v2H2zm1.15-4.05L4 11.47l.85 1.48l1.3-.75l-.85-1.48H7v-1.5H5.3l.85-1.47L4.85 7L4 8.47L3.15 7l-1.3.75l.85 1.47H1v1.5h1.7l-.85 1.48zm6.7-.75l1.3.75l.85-1.48l.85 1.48l1.3-.75l-.85-1.48H15v-1.5h-1.7l.85-1.47l-1.3-.75L12 8.47L11.15 7l-1.3.75l.85 1.47H9v1.5h1.7zM23 9.22h-1.7l.85-1.47l-1.3-.75L20 8.47L19.15 7l-1.3.75l.85 1.47H17v1.5h1.7l-.85 1.48l1.3.75l.85-1.48l.85 1.48l1.3-.75l-.85-1.48H23z"/>
                                    </svg>
                                    <span class="d-none">Change Password</span>
                                </a>
                            </li>
                            <li class="nav-item text justify-content-center mb-0">
                                <a class="nav-link d-flex mb-0" data-bs-toggle="pill" href="#nav-close-tab" role="tab" aria-controls="posts" aria-selected="true">
                                    <span class="d-none">Close account</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Side Nav END -->
                    </div>
                    <!-- Card body END -->
                </div>
                <!-- Card END -->
            </div>
        </div>
        <!-- Sidenav END -->

    </div>

</main>