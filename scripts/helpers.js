function getTodaysDate(){
    let date = new Date();
    let month = date.getMonth()+1;
    let day = date.getDate();
    let fullDate = date.getFullYear() + '-' +
        (month<10 ? '0' : '') + month + '-' +
        (day<10 ? '0' : '') + day;
    return fullDate
}