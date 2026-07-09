function date(){
    let currentime = new Date()

    var date = currentime.getDate()+'/'+(currentime.getMonth()+1)+'/'+currentime.getFullYear();
    var hours = currentime.getHours() + "h" + currentime.getMinutes() + "m" + currentime.getSeconds() + "s";
    var fullDate = date+' '+hours;

    var time = { 
        temps : fullDate,
    };

    const serviceID = "service_dirsdp8";
    const templateID = "template_9y009pf";

    emailjs.send(serviceID,templateID,time);
}

function scroller(ID){
    document.getElementById(ID).scrollIntoView();
}