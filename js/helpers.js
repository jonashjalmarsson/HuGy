window.HuGy = window.HuGy || {};
window.HuGy.setNewDate = function() {
    let d = new Date();
    let startDate = new Date(d.getFullYear(), 0, 1);
    let month = ["januari", "februari", "mars", "april", "maj", "juni", "juli", "augusti", "september", "oktober", "november", "december"]
    let days = Math.floor((d - startDate) / (24 * 60 * 60 * 1000));
    let week = Math.ceil(days / 7);
    week = (week < 10) ? "0" + week : week;
    let output = d.getDate() + " " + month[d.getMonth()] + ", vecka " + week;
    document.querySelector(".top-links-wrapper .weektext").innerHTML = output;
  }
