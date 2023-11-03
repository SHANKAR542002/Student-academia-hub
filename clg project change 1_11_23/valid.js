/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validate(){

    var password = document.getElementById("pass");
    var adm = document.getElementById("admin1");


    if ( adm.value === "admin" && password.value === "admin")
    {
            alert("Login Succesfull");
            window.location.replace("admin.html");



    }

    else {
      alert("Login failed");
    }
}