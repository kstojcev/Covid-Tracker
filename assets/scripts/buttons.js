$(function () {
  let dailyBtn = $("#dailyBtn");
  let monthlyBtn = $("#monthlyBtn");
  let threeMonthsBtn = $("#threeMonthsBtn");
  let dailyData = $("#dailyData");
  let monthlyData = $("#monthlyData");
  let threeMonthsData = $("#threeMonthsData");
  let globalDataTitle = $("#globalDataTitle");
  let monthlyCharts = $("#monthlyCharts");
  let threeMonthsCharts = $("#threeMonthsCharts");

  threeMonthsData.hide();
  monthlyData.hide();

  monthlyCharts.hide();
  threeMonthsCharts.hide();

  let buttons = [dailyBtn, monthlyBtn, threeMonthsBtn];

  function clearButtonColors() {
    buttons.forEach((button) => {
      button.removeClass("clickedBtn");
    });
  }

  function addButtonColor(node) {
    node.addClass("clickedBtn");
    node.find("span").addClass("clickedBtn");
  }

  dailyBtn.on("click", function () {
    clearButtonColors();
    addButtonColor(dailyBtn);
    globalDataTitle.text("Daily data:");
    dailyData.show();
    monthlyData.hide();
    threeMonthsData.hide();
    monthlyCharts.hide();
    threeMonthsCharts.hide();
  });

  monthlyBtn.on("click", function () {
    clearButtonColors();
    addButtonColor(monthlyBtn);
    globalDataTitle.text("Monthly data:");
    monthlyData.show();
    dailyData.hide();
    threeMonthsData.hide();
    monthlyCharts.show();
    threeMonthsCharts.hide();
  });
  threeMonthsBtn.on("click", function () {
    clearButtonColors();
    addButtonColor(threeMonthsBtn);
    globalDataTitle.text("Data for the past three months:");
    threeMonthsData.show();
    dailyData.hide();
    monthlyData.hide();
    monthlyCharts.hide();
    threeMonthsCharts.show();
  });
});
