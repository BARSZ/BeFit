//Button events for closing and opening forms
let editProfileButton = document.getElementById("editProfileButton");
editProfileButton.addEventListener("click", openForm);
editProfileButton.addEventListener("click", closeTopUp);
editProfileButton.addEventListener("click", closeExtendMembership);

let topUpButton = document.getElementById("btnTopUpCredits");
topUpButton.addEventListener("click", openTopUp);
topUpButton.addEventListener("click", closeForm);
topUpButton.addEventListener("click", closeExtendMembership);

let btnExtendMembership = document.getElementById("btnExtendMembership");
btnExtendMembership.addEventListener("click", openExtendMembership);
btnExtendMembership.addEventListener("click", closeForm);
btnExtendMembership.addEventListener("click", closeTopUp);

let cancelExtendMembership = document.getElementById("btnCancelMembershipChanges");
cancelExtendMembership.addEventListener("click", closeExtendMembership);

let cancelTopUp = document.getElementById("btnCancelTopUp");
cancelTopUp.addEventListener("click", closeTopUp);

let cancelEditDetails = document.getElementById("btnCancelEditDetails");
cancelEditDetails.addEventListener("click", closeForm);

let confirmChanges = document.getElementById("btnConfirmEditChanges");
confirmChanges.addEventListener("click", refreshPage);
function refreshPage() {
    parent.window.location.reload(true);
}

//functions for opening and closing the different forms
function openForm() {
    document.getElementById("myForm").style.display = "block";
}
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
function openTopUp() {
    document.getElementById("topUp").style.display = "block";
}
function closeTopUp() {
    document.getElementById("topUp").style.display = "none";
}
function openExtendMembership() {
    document.getElementById("extendMembership").style.display = "block";
}
function closeExtendMembership() {
    document.getElementById("extendMembership").style.display = "none";
}