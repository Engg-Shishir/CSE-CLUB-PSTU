<div class="row support-row" style="margin-top:20px;">
  <h2>Contact Us</h2>
  <form  action="<?= url("/message"); ?>" method="POST" id="messageForm">
    <div class="row row-input">
      <input name="fname" type="text" class="small" placeholder="First name" />
      <input name="lname" type="text" class="small" placeholder="Last name" />
    </div>
    <div class="row row-input">
      <input name="email" type="email" class="lg" placeholder="Email" />
    </div>
    <div class="row row-input">
      <input name="company" type="text" class="small" placeholder="Company" />
      <input name="subject" type="text" class="small" placeholder="Subject" />
    </div>
    <div class="row row-input">
      <textarea name="des" class="lg" placeholder="Describe your support"
        style="padding:5px; align-items:center;"></textarea>
    </div>
    <div class="row row-input">
      <a href="">
        <button class="glowing-btn" type="button" id="messageFormBtn">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Submit
        </button>
      </a>
    </div>
  </form>
</div>