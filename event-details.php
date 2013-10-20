<?php include 'layout/_doctype.php'; ?>
<?php include 'layout/_header.php'; ?>

  <div class="primary" role="content">
    <div class="event-details">
      <h2>Your Event</h2>
      <p>Title: <strong>Gerrard's 2nd birthday</strong></p>
      <p>Type: <strong>Birthday Party</strong></p>
      <p>Number of People: <strong>20</strong></p>
      <p>Budget: <strong>$600 - $800</strong></p>
      <p>Additional Details: <strong>Lots of ribbons and gilter!</strong></p>
    </div>
    <div class="planner-list">
      <a href="index.php#listing-page" class="btn btn-default">Keep Browsing Planners</a>
      <ul class="items">
        <li class="row">
          <a href="profile.php">
            <div class="col-xs-4">
              <img src="/assets/images/planner/planner-pic1.jpg" />
            </div>
            <div class="col-xs-8 confirmation">
              <p>Sheila V.</p>
              <p class="status confirmed">confirmed</p>
            </div>
          </a>
        </li>
        <li class="row">
          <div class="col-xs-4">
            <img src="/assets/images/planner/planner-pic2.jpg" />
          </div>
          <div class="col-xs-8 confirmation">
            <p>Franchesca D.</p>
            <p class="status pending">pending confirmation...</p>
          </div>
        </li>
        <li class="row">
          <div class="col-xs-4">
            <img src="/assets/images/planner/planner-pic3.jpg" />
          </div>
          <div class="col-xs-8 confirmation">
            <p>Demitri F.</p>
            <p class="status pending">pending confirmation...</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

<?php include 'layout/_footer.php'; ?>