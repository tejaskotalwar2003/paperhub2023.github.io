function emailSend(){
/* free library*/
Email.send({
    Host : "smtp.elasticemail.com",
    Username : "Tejaskotalwar07@gmail.com",
    Password : "214C2216B029B2AD6996CE072D6E5C8759B5",
    To : 'tejaskotalwar07@gmail.com',
    From : "document.getElementById("email").value,
    Subject : "New Contact Form Enquiry",
    Body : "And this is the body"
}).then(
  message => alert(message)
);
}