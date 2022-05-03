function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label + '<br>' + Math.round(series.percent) + '%</div>'
}
function formatMoney(argument) {
    return argument.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' VNĐ';
}
function formatDate(argument) {
    var date = new Date(argument);
    return date.getDate().toString() + '/' + (date.getMonth() + 1).toString() + '/' + date.getFullYear().toString();
}
