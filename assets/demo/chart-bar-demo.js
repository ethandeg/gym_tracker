// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
const mealDates = mealCaloriesByDate.map(date => date.meal_date);
dates.forEach(d => {
  if(!mealDates.includes(d.dateString)){
  mealCaloriesByDate.push({total_calories: 0, meal_date: d.dateString})
}
})
mealCaloriesByDate.sort((a, b) => (a.meal_date > b.meal_date) ? 1 : -1);
let totalCaloriesEachDay = mealCaloriesByDate.map(num => Number(num.total_calories));
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: dates.map(date => date.date),
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: totalCaloriesEachDay,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 8
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: Math.max(...totalCaloriesEachDay) === 0 ? 5 : Math.max(...totalCaloriesEachDay),
          maxTicksLimit: 10
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
