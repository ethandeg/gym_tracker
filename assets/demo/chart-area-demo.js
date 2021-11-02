// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
console.log(workoutLengthByDate)
let date = new Date();
let month = date.getMonth()+1;
let day = date.getDate();
let output = date.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;
const dates = [{date: date.toDateString().substring(4,11), dateString: output}];
for(let i = 0; i < 6; i++){
  date.setDate(date.getDate() -1)
  month = date.getMonth() + 1;
  day = date.getDate();
  output = date.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;

  dates.push({date: date.toDateString().substring(4,11), dateString: output});
}
const workoutDates = workoutLengthByDate.map(date => date.workout_date);
dates.forEach(d => {
  if(!workoutDates.includes(d.dateString)){
  workoutLengthByDate.push({total_minutes: 0, workout_date: d.dateString})
}
})
dates.reverse();
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: dates.map(date => date.date),
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [10, 25, 100, 32, 11, 200, 25],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 200,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
