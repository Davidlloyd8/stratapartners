
const form = document.getElementById("contactForm")
form.addEventListener("submit", function(e){
    e.preventDefault();

    const formData = new FormData(form);

    fetch("sendmail.php", {
        method: "POST",
        body: formData,
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === "success"){
            alert("Message sent successfully!");
            document.getElementById("contactForm").reset();
        } else {
            alert("Failed to send message.");
        }
    })
    .catch(err => {
        console.log(err);
        alert("Something went wrong!");
    });
});
