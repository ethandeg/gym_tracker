Date.prototype.toDateInputValue = (function () {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
});

let date = getTodaysDate()
if ($("#workout_date")) {
    $("#workout_date").val(date);
}
if ($("#meal_date")) {
    $("#meal_date").val(date);
}
if ($("#weighin_date")) {
    $("#weighin_date").val(date);
}
if ($("#weight_goal_start")) {
    $("#weight_goal_start").val(date);
}


