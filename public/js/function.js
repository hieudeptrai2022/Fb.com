var userSettings = document.querySelector(".user-settings");
var darkBtn = document.getElementById("dark-button");
var LoadMoreBackground =document.querySelector(".btn-LoadMore");
function UserSettingToggle(){
    userSettings.classList.toggle("user-setting-showup-toggle");
}
// darkBtn.onclick = function(){
//     darkBtn.classList.toggle("dark-mode-on");
// }

function darkModeON(){
    darkBtn.classList.toggle("dark-mode-on");
   document.body.classList.toggle("dark-theme");
};

function LoadMoreToggle(){
    LoadMoreBackground.classList.toggle("loadMoreToggle");
};

function index() {
    alert("Đăng nhập thành công !");
    setTimeout(function () {
        window.location.href = "../layouts/header.php";
    },3000);
}

function index1() {
    alert("Đăng ký thành công !");
    setTimeout(function () {
        window.location.href = "login.php";
    },3000);
}