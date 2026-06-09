
document.getElementById("contactForm").addEventListener("submit", function(e){
    e.preventDefault();

    let formData = new FormData(this);

    fetch("sendmail.php", {
        method: "POST",
        body: formData
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
