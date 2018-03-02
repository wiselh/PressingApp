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

                        <img class="img-avatar img-avatar32" src='{{asset("$logo")}}' alt="">
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
                    <form action="/profile/{{Auth::user()->id}}" method="post">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="form-group mb-15">
                            <label for="side-overlay-profile-name">Nom de l'Utilisateur</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="username"
                                       name="username" placeholder="Nom de l'Utilisateur.." value="{{ Auth::user()->username }}">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="fullname">Nom Complete</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="fullname"
                                       name="fullname" placeholder="Votre Nom.." value="{{ Auth::user()->fullname }}">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="side-overlay-profile-name">Telephone</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="tele"
                                       name="tele" placeholder="Telephone de l'Utilisateur.." value="{{ Auth::user()->tele }}">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="side-overlay-profile-name">Adresse</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="adresse"
                                       name="adresse" placeholder="Adresse de l'Utilisateur.." value="{{ Auth::user()->adresse }}">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="side-overlay-profile-email">Adresse Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="side-overlay-profile-email"
                                       name="email" placeholder="Votre Email..." value="{{ Auth::user()->email }}">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="side-overlay-profile-password">Nouveau mot de pass</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="side-overlay-profile-password"
                                       name="password" placeholder="Nouveau Mot de pass..">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                        </div>
                        <div class="form-group mb-15">
                            <label for="side-overlay-profile-password-confirm">Confirme le Mot de pass</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="side-overlay-profile-password-confirm"
                                       name="side-overlay-profile-password-confirm" placeholder="Confirmer le mot de pass..">
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
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