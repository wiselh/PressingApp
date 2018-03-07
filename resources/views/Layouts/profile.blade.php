
<!-- Side Overlay-->
<aside id="side-overlay">
    <!-- Side Overlay Scroll Container -->
    <div id="side-overlay-scroll">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow">
            <div class="content-header-section align-parent">
                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Side Overlay -->

                <!-- User Info -->
                <div class="content-header-item">
                    <a class="img-link mr-5" href="">

                        <img class="img-avatar img-avatar32" src='{{asset(Auth::user()->picture)}}' alt="">
                    </a>
                    <a class="align-middle link-effect text-primary-dark font-w600" href=""></a>
                    <b>{{ Auth::user()->fullname }}</b>
                </div>
                <!-- END User Info -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">

            <!-- Profile -->
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Profile
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="/profile/{{Auth::user()->id}}" method="post" enctype="multipart/form-data" class="profile-form">
                        {{ method_field('PUT') }}
                        {{csrf_field()}}

                        <div class="form-group mb-15">
                            <label for="profile_pictures">Photo de Profile <span style="font-size: 11px;color: #00dd00">(optionnel)</span></label>
                            <div class="input-group floating">
                                <input type="file" id="profile_picture" name="profile_picture">
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="profile_username">Nom de l'Utilisateur</label>
                            <div class="input-group floating">
                                <input type="text" class="form-control" id="profile_username"
                                       name="profile_username" placeholder="Nom de l'Utilisateur.." value="{{ Auth::user()->username }}">
                                <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>

                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="profile_fullname">Nom Complete</label>
                            <div class="input-group floating">
                                <input type="text" class="form-control" id="profile_fullname"
                                       name="profile_fullname" placeholder="Votre Nom.." value="{{ Auth::user()->fullname }}">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="profile_tele">Telephone</label>
                            <div class="input-group floating">
                                <input type="text" class="form-control" id="profile_tele"
                                       name="profile_tele" placeholder="Telephone de l'Utilisateur.." value="{{ Auth::user()->tele }}">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="profile_adresse">Adresse</label>
                            <div class="input-group floating">
                                <input type="text" class="form-control" id="profile_adresse"
                                       name="profile_adresse" placeholder="Adresse de l'Utilisateur.." value="{{ Auth::user()->adresse }}">
                                <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="profile_email">Adresse Email</label>
                            <div class="input-group floating">
                                <input type="email" class="form-control" id="profile_email"
                                       name="profile_email" placeholder="Votre Email..." value="{{ Auth::user()->email }}">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-block btn-alt-primary">
                                    <i class="fa fa-refresh mr-5"></i> Mise A Jour
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Profile -->

            <!-- Profile -->
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Changer le mot de pass
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="/profile/password/{{Auth::user()->id}}" method="post" class="password-form">
                        {{csrf_field()}}
                        <div class="form-group mb-15">
                            <label for="profile_password">Nouveau mot de pass</label>
                            <div class="input-group floating">
                                <input type="password" class="form-control" id="profile_password"
                                       name="profile_password" placeholder="Nouveau Mot de pass..">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="profile_confirm_password">Confirme le Mot de pass</label>
                            <div class="input-group floating">
                                <input type="password" class="form-control" id="profile_confirm_password"
                                       name="profile_confirm_password" placeholder="Confirmer le mot de pass..">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-block btn-alt-primary">
                                    <i class="fa fa-refresh mr-5"></i> Mise A Jour
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Profile -->

        </div>
        <!-- END Side Content -->
    </div>
    <!-- END Side Overlay Scroll Container -->
</aside>
<!-- END Side Overlay -->