<nav class="navbar navbar-expand-sm navbar-light bg-primary">
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo urlRoot ?>/public/dashboards/index">dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo urlRoot ?>/public/seoes/index">seo</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo urlRoot ?>/public/sliders/index">slider</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo urlRoot ?>/public/categories/index">category</a>
            </li>
        </ul>

        <ul class="navbar-nav mt-2 w-100 flex-row-reverse px-4">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo urlRoot ?>/public/home/index">home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo urlRoot ?>/public/auths/login">logout</a>
            </li>
        </ul>
    </div>
</nav>
