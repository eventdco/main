<?php 
  $class = "";
  if ( "index.php" == basename($_SERVER['PHP_SELF']) ) {
    $class = "bg";
  }
?>
<div class="page <?php echo $class; ?>">
  <?php if ( "index.php" != basename($_SERVER['PHP_SELF']) ) { ?>
    <header id="header" class="site-header">
      <nav class="row nav nav-main" role="navigation">
        <div class="col-xs-6">
          <a href="#" class="nav-main-link">
            <svg width="24px" height="20px" viewBox="0 0 24 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                <rect d="M0,0 L0,4 L24,4 L24,0 L0,0 Z M0,0" id="Rectangle-1" fill="#CACACA" x="0" y="0" width="24" height="4"></rect>
                <rect d="M0,8 L0,12 L24,12 L24,8 L0,8 Z M0,8" id="Rectangle-1-copy" fill="#CACACA" x="0" y="8" width="24" height="4"></rect>
                <rect d="M0,16 L0,20 L24,20 L24,16 L0,16 Z M0,16" id="Rectangle-1-copy-2" fill="#CACACA" x="0" y="16" width="24" height="4"></rect>
              </g>
            </svg>
          </a>
        </div>
        <div class="col-xs-6">
          <a href="/">Event'D</a>
        </div>
      </nav>
    </header>
  <?php } ?>

  <div id="main" class="site-main">


