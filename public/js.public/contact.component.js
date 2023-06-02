const $contact_components = document.querySelectorAll(".form-contact-component");

$contact_components.forEach((form) => {
    form.onsubmit = (event) => {
        event.preventDefault();
        if (!validateForm(form)) return;
        fetch_query(new FormData(form), "mailbox", "insert").then((res) => {
            if (!res.response) return showMsg(form, res.message);
            form.reset();
            form.classList.add("success");
        });
    };
});

function validateForm(form) {
    if (form["mail_name"].value == "") return showMsg(form, "Write a name!");
    if (form["mail_subject"].value == "") return showMsg(form, "Write a subject!");
    if (form["mail_location"].value == "") return showMsg(form, "Write a address!");
    if (form["mail_email"].value == "") return showMsg(form, "Write a email!");
    if (!isEmail(form["mail_email"].value)) return showMsg(form, "Write a valid email!");
    if (form["mail_phone"].value == "") return showMsg(form, "Write a phone!");
    if (form["mail_message"].value == "") return showMsg(form, "Write a message!");
    return true;
}

function showMsg(form, msg, type = "danger") {
    const $message = form.querySelector(".message");
    $message.innerHTML = msg;
    setTimeout(() => {
        $message.innerHTML = "";
    }, 1000);
    return type == "danger" ? false : true;
}
