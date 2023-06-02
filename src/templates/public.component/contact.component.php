<form class="form-contact-component" onsubmit="return false">
    <div class="input col-2">
        <h4>Contact Us</h4>
    </div>
    <div class="successfully">
        <i class="fas fa-check"></i>
        <p>Message sent successfully!</p>
    </div>
    <div class="input">
        <label>Name</label>
        <input type="text" name="mail_name" placeholder="Your name">
    </div>
    <div class="input">
        <label>Subject</label>
        <input type="text" name="mail_subject" placeholder="Your subject">
    </div>
    <div class="input col-2">
        <label>Address</label>
        <input type="text" name="mail_location" placeholder="Your address">
    </div>
    <div class="input">
        <label>Email</label>
        <input type="text" name="mail_email" placeholder="Your email">
    </div>
    <div class="input">
        <label>Phone</label>
        <input type="text" name="mail_phone" placeholder="Your phone">
    </div>
    <div class="input col-2">
        <label>Message</label>
        <textarea name="mail_message" cols="30" rows="10" placeholder="Your message"></textarea>
    </div>
    <div class="input col-2 bg-transparent">
        <p class="message"></p>
    </div>
    <div class="input col-2">
        <button class="btn" name="mail_submit">
            <span>Send</span>
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
</form>