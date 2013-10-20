    </div> <?php // !.site-main ?>
    
    <!-- <footer id="footer" class="site-footer">
      <p>&copy; 2013 Event'D. All rights reserved.</p>
    </footer> -->

  </div> <?php // !.page ?>

  <div class="nav-user-account">
    <ul class="nav items">
      <li><a href="#my-account">My Account</a></li>
      <li><a href="#parties">Parties</a></li>
      <li><a href="#logout">Logout</a></li>
    </ul>
  </div>

<div class="modal fade create-form">
  <div class="modal-header">
    <div class="row">
      <h3 class="col-xs-8">Create Event</h3>
      <div class="cols-xs-4 text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
<!--         <button type="button" class="btn btn-primary" aria-hidden="true">Save</button>
 -->      </div>
    </div>
  </div>
  <div class="modal-body">
    <form action="/" method="post" class="form-create-event">
      
      
      <fieldset>
        <label for="event-name">Event Name</label>
        <input name="event-name" id="event-name" class="event-name" type="text" />
      </fieldset>

      <fieldset>
        <label>Event Type</label>
        <select>
          <option>Birthday</option>
          <option>Wedding</option>
        </select>
      </fieldset>

      <fieldset>
        <label for="event-number-people">Number Of People</label>
        <input name="event-number-people" id="event-number-people" class="event-number-people" type="number" />
      </fieldset>

      <fieldset>
        <label>Location</label>
        <select>
          <option>Chicago, IL</option>
          <option>Chicago, IL</option>
        </select>
      </fieldset>


     <fieldset class="field-budget">
      <label for="event-budget">Event Budget</label>
      <div class="row">
        <select class="col-xs-6">
          <option>Min</option>
          <option>100</option>
          <option>200</option>
          <option>300</option>
          <option>400</option>
          <option>500</option>
          <option>600</option>
          <option>700</option>
          <option>800</option>
          <option>900</option>
          <option>1000</option>
        </select>
        <select class="col-xs-6">
          <option>Max</option>
          <option>100</option>
          <option>200</option>
          <option>300</option>
          <option>400</option>
          <option>500</option>
          <option>600</option>
          <option>700</option>
          <option>800</option>
          <option>900</option>
          <option>1000</option>
        </select>
      </div>
       <!-- <input name="event-budget" id="event-budget" class="event-budget" type="text" /> -->
     </fieldset>
            
      
      <fieldset>
        <label for="event-additional">Additional Details</label>
        <textarea name="event-additional" id="event-additional"></textarea>
      </fieldset>
      
    
    </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-primary" aria-hidden="true">Save</button>
  </div>
</div>

  <?php // SCRIPT FRAMEWORK ?>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="//code.jquery.com/jquery.js"><\/script>')</script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/hammer.js/1.0.5/hammer.min.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

  <?php // SCRIPT PLUGINS ?>

  <?php // SITE SCRIPT ?>
  <script src="assets/js/script.js"></script>

</body>
</html>