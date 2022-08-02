// Register postMessage Listener for the iframe.

if (window.addEventListener) {
    window.addEventListener("message", messageListener, false)
    log("addEventListener successful", "debug");
    }else if(window.attachEvent) {
    window.attachEvent("onmessage", messageListener);
    log("attachEvent successful", "debug");
    }else{
    log("Could not attach message listener", "debug");
    throw new Error("Can't attach message listener");
    }
    
    function messageListener(event) {
        try {
            //this is how we extract the message from the incoming events, data format should look like {"action":"inlineCheckout","checkoutSession":"error","result":"missing data in the credit card form"
            var data = JSON.parse(event.data);
            //insert logic here to handle success events or errors, if any
        }
        catch (exc) {

        }
    }