/*
Template Name: Minia - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Dashboard Init Js File
*/

// get colors array from the string
function getChartColorsArray(chartId) {
    var colors = $(chartId).attr('data-colors');
    var colors = JSON.parse(colors);
    return colors.map(function(value){
        var newValue = value.replace(' ', '');
        if(newValue.indexOf('--') != -1) {
            var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
            if(color) return color;
        } else {
            return newValue;
        }
    })
}
// get array from the string
function getChartInfoArray(chartId,attrName) {
    return JSON.parse($(chartId).attr(attrName));
}

//  MINI CHART

// mini-1
var minichart1Colors = getChartColorsArray("#mini-chart1");
var options = {
    series: [{
        data: [2, 10, 18, 22, 36, 15, 47, 75, 65, 19, 14, 2, 47, 42, 15, ]
    }],
    chart: {
        type: 'line',
        height: 50,
        sparkline: {
            enabled: true
        }
    },
    colors: minichart1Colors,
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    tooltip: {
        fixed: {
            enabled: false
        },
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    }
};

var chart = new ApexCharts(document.querySelector("#mini-chart1"), options);
chart.render();

// mini-2
var minichart2Colors = getChartColorsArray("#mini-chart2");
var options = {
    series: [{
        data: [15, 42, 47, 2, 14, 19, 65, 75, 47, 15, 42, 47, 2, 14, 12, ]
    }],
    chart: {
        type: 'line',
        height: 50,
        sparkline: {
            enabled: true
        }
    },
    colors: minichart2Colors,
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    tooltip: {
        fixed: {
            enabled: false
        },
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    }
};

var chart = new ApexCharts(document.querySelector("#mini-chart2"), options);
chart.render();

// mini-3
var minichart3Colors = getChartColorsArray("#mini-chart3");
var options = {
    series: [{
        data: [47, 15, 2, 67, 22, 20, 36, 60, 60, 30, 50, 11, 12, 3, 8, ]
    }],
    chart: {
        type: 'line',
        height: 50,
        sparkline: {
            enabled: true
        }
    },
    colors: minichart3Colors,
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    tooltip: {
        fixed: {
            enabled: false
        },
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    }
};

var chart = new ApexCharts(document.querySelector("#mini-chart3"), options);
chart.render();

// mini-4
var minichart4Colors = getChartColorsArray("#mini-chart4");
var options = {
    series: [{
        data: [12, 14, 2, 47, 42, 15, 47, 75, 65, 19, 14, 2, 47, 42, 15, ]
    }],
    chart: {
        type: 'line',
        height: 50,
        sparkline: {
            enabled: true
        }
    },
    colors: minichart4Colors,
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    tooltip: {
        fixed: {
            enabled: false
        },
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    }
};

var chart = new ApexCharts(document.querySelector("#mini-chart4"), options);
chart.render();