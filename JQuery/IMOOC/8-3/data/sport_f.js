var data = [{
    "name": "足球"
}, {
    "name": "散步"
}, {
    "name": "篮球"
}, {
    "name": "乒乓球"
}, {
    "name": "骑自行车"
}];
$.each(data, function (index, sport) {
    if (index == 1)
        $("ul").append("<li>" + sport["name"] + "</li>");
});