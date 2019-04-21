<form class="contact-form form" method="POST" action="">
  <div class="form-group">
    <label for="cf-first-name" class="label-required">First Name</label>
    <input class="form-control" type="text" id="cf-first-name" name="firstname" required />
  </div>
  <div class="form-group">
    <label for="cf-last-name" class="label-required">Last Name</label>
    <input class="form-control" type="text" id="cf-last-name" name="lastname" required />
  </div>
  <div class="form-group">
    <label for="cf-email" class="label-required">Email</label>
    <input class="form-control" type="email" id="cf-email" name="email" required />
  </div>
  <div class="form-group">
    <label for="cf-phone">Phone</label>
    <input class="form-control" type="tel" id="cf-phone" name="phone" />
  </div>
  <div class="cf-type">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="type" value="current" id="cf-type-current">
      <label class="form-check-label" for="cf-type-current">
        Current Student
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="type" value="prospective" id="cf-type-prospective">
      <label class="form-check-label" for="cf-type-prospective">
        Prospective Student
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="type" value="instructor" id="cf-type-instructor">
      <label class="form-check-label" for="cf-type-instructor">
        Instructor
      </label>
    </div>
  </div>
  <div class="form-group">
    <label for="cf-message">Message</label>
    <textarea class="form-control" id="cf-message" name="message"></textarea>
  </div>
  <div class="submit-container">
    <input type="submit" value="Submit" class="btn btn-primary" />
  </div>
</form>