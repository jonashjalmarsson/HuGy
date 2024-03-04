window.HuGy = window.HuGy || {};
window.HuGy.setNewDate = function() {
  let output = getWeekDate(new Date());
  document.querySelector(".top-links-wrapper .weektext").innerHTML = output;
}

function getWeekDate(curr) {
  let d = new Date(curr);
  let month = ["januari", "februari", "mars", "april", "maj", "juni", "juli", "augusti", "september", "oktober", "november", "december"]
  let curr_date_month = d.getDate() + " " + month[d.getMonth()];
  
  d.setHours(0,0,0,0);
  d.setDate(d.getDate() + 4 - (d.getDay() || 7));
  let week1 = new Date(d.getFullYear(), 0, 4);
  let week = 1 + Math.round(((d - week1) / 86400000 - 3 + (week1.getDay() + 1) % 7) / 7);
  week = (week < 10) ? "0" + week : week;
  
  return curr_date_month + ", vecka " + week;
}
