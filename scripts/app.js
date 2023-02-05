var addTaskIcon = document.getElementById("add-task-icon");
var addTaskIconOne = document.getElementById("add-task-icon-one");
var addTaskContainer = document.getElementById("add-task-helper");
var taskClose = document.getElementById("task-close");
var formBlur = document.getElementById("form-blur");

function showAdd(){
    addTaskContainer.classList.toggle("active");
    formBlur.classList.toggle("active");
};

taskClose.addEventListener("click",function(){
    addTaskContainer.classList.toggle("active");
    formBlur.classList.toggle("active");
});


var todayDayApp = document.getElementById("today-date-app");

var date = new Date();

var dateDays = date.getDate();

if(dateDays <=9){
    dateDays = "0" + dateDays;
}

var dateMonths = date.getMonth();
dateMonths = dateMonths + 1;

if(dateMonths <=10){
    dateMonths = "0" + dateMonths;
}

var dateYear = date.getFullYear();

todayDayApp.innerHTML =  dateYear + "-" + dateMonths + "-" +  dateDays;



var appContainerBig = document.getElementById("app-container-big");
var tasksCount = document.getElementById("task-counts");

var appContainerBigKids = appContainerBig.childElementCount;
tasksCount.textContent = appContainerBigKids;







