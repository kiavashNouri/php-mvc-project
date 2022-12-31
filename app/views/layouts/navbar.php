<nav class="navbar navbar-expand-sm navbar-light bg-dark">
<?php var_dump($_GET['url']); ?>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?php echo urlRoot?>/public/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">products</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">contacts</a>
            </li>
        </ul>

        <ul class="navbar-nav mt-2 w-100 flex-row-reverse px-4">
            <li class="nav-item">
                <a class="nav-link text-white <?php echo $_GET['url']=="auths/register"?'btn btn-warning':'ok'; ?>" href="<?php echo urlRoot?>/public/auths/register">register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?php echo $_GET['url']=="auths/login"?'btn btn-success':''; ?>" href="<?php echo urlRoot?>/public/auths/login">login</a>
            </li>
        </ul>
    </div>
</nav>
