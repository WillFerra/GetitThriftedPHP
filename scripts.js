// this is validation for the contact form

function clearErrors(){
    document.getElementById('error-content').innerHTML = "";
    
    document.getElementById('errors').classList.remove('d-block');
    
    document.getElementById('errors').classList.add('d-none');
}

function validateForm(){
    
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    
    var errors = "";
    
    if(isEmpty(firstName) || 
    isEmpty(lastName) ||
    isEmpty(email) ||
    isEmpty(message)){
        errors += "<li>Please fill in all fields.</li>";
    }
    
    if(isShort(message)){
        errors += "<li>Message is too short, please provide more detail.</li>";
    }
    
    
    if(errors != ""){
        document.getElementById('error-content').innerHTML = "<ul class = 'error-list'>"+errors+"</ul>";
        
        document.getElementById('errors').classList.remove('d-none');
        
        document.getElementById('errors').classList.add('d-block');
        
        return false;
    }
    else{
        return true;
    }
}

function isEmpty(field){
    if(field == ""){
        return true;
    }
    else{
        return false;
    }
}

function isShort(value){
    if(value.length < 20){
        return true;
    }
    else{
        return false;
    }
}

// this is for the counter on the products page

function increaseCount(a, b) {
    var input = b.previousElementSibling;
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value;
}

function decreaseCount(a, b) {
    var input = b.nextElementSibling;
    var value = parseInt(input.value, 10);
    if (value > 1) {
        value = isNaN(value) ? 0 : value;
        value--;
        input.value = value;
    }
}