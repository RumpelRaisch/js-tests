<?php if (false === defined('HTTP_BASE')) {return;} ?>
<?php require '../../helper/LoremIpsum.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Rainer Schulz">
    <link rel="icon" href="<?php echo HTTP_BASE; ?>favicon.ico">

    <title><?php echo $data['title']; ?></title>

    <link href="<?php echo HTTP_BASE; ?>../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo HTTP_BASE; ?>css/bootstrap.darkly.min.css" rel="stylesheet">
    <link href="<?php echo HTTP_BASE; ?>../node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="<?php echo HTTP_BASE; ?>css/common.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="<?php echo HTTP_BASE; ?>"><i class="fa fa-bug"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" data-history href="<?php echo HTTP_BASE; ?>one.html">one</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-history href="<?php echo HTTP_BASE; ?>two.html">two</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-history href="<?php echo HTTP_BASE; ?>three.html">three</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">esp</a>
            <div class="dropdown-menu" aria-labelledby="dropdown">
              <a class="dropdown-item" data-history href="<?php echo HTTP_BASE; ?>un.html">un</a>
              <a class="dropdown-item" data-history href="<?php echo HTTP_BASE; ?>dos.html">dos</a>
              <a class="dropdown-item" data-history href="<?php echo HTTP_BASE; ?>tres.html">tres</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </nav>

    <main role="main">
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3"><i class="fab fa-js-square"></i> JavaScript Tests</h1>
          <p class="lead"><i class="fa fa-history"></i> History API</p>
          <?php echo LoremIpsum::get(3); ?>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Quo Vadis &raquo;</a></p>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card bg-primary mb-4">
              <div class="card-body">
                <pre class="card-text" id="output"><?php echo $data['text']; ?></pre>
              </div>
            </div>
          </div>
            <div class="col-md-12">
              <div class="card bg-secondary mb-4">
                <div class="card-body">
                  <h4 class="card-title">debug</h4>
                  <pre class="card-text"><?php print_r(DEBUG); ?></pre>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card border-light mb-4">
              <div class="card-header">Lorem</div>
              <div class="card-body">
                <h4 class="card-title">Ipsum</h4>
                <?php echo LoremIpsum::get(3, 'card-text'); ?>
                <p class="card-text"><a class="btn btn-success" href="#" role="button">Quo Vadis &raquo;</a></p>
              </div>
              <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                foo
                <span class="badge badge-primary badge-pill"><?php echo random_int(1, 10); ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-light mb-4">
              <div class="card-header">Lorem</div>
              <div class="card-body">
                <h4 class="card-title">Ipsum</h4>
                <?php echo LoremIpsum::get(4, 'card-text'); ?>
                <p class="card-text"><a class="btn btn-warning" href="#" role="button">Quo Vadis &raquo;</a></p>
              </div>
              <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                bar
                <span class="badge badge-primary badge-pill"><?php echo random_int(1, 10); ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-light mb-4">
              <div class="card-header">Lorem</div>
              <div class="card-body">
                <h4 class="card-title">Ipsum</h4>
                <?php echo LoremIpsum::get(2, 'card-text'); ?>
                <p class="card-text"><a class="btn btn-danger" href="#" role="button">Quo Vadis &raquo;</a></p>
              </div>
              <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                baz
                <span class="badge badge-primary badge-pill"><?php echo random_int(1, 10); ?></span>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div> <!-- /.container -->
    </main>

    <footer class="container">
      <p>&copy; Company 2017-2018</p>
    </footer>

    <script src="<?php echo HTTP_BASE; ?>../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo HTTP_BASE; ?>../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo HTTP_BASE; ?>../node_modules/tooltip.js/dist/umd/tooltip.min.js"></script>
    <script src="<?php echo HTTP_BASE; ?>../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo HTTP_BASE; ?>js/common.js"></script>
  </body>
</html>
