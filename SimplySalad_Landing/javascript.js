"https://cdn.emailjs.com/sdk/2.3.2/email.min.js"
    (function(){
        emailjs.init('<YOUR_USER_ID>');
    })();
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault();
        // generate a five-digit number for the contact_number variable
        this.contact_number.value = Math.random() * 100000 | 0;
        // these IDs from the previous steps
        emailjs.sendForm('<YOUR_SERVICE_ID>', '<YOUR_TEMPLATE_ID>', this)
            .then(function() {
                alert('Your message has been sent!');
            }, function(error) {
                alert('There was an error sending your message. Please try again later.');
            });
    });
