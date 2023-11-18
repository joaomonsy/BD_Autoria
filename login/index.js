var formSignin = document.querySelector('#signin')
var formSignup = document.querySelector('#signup')
var btnColor = document.querySelector('.btnColor')
var msg = document.querySelector('.message')
var container = document.querySelector('.container')

document.querySelector('#btnSignin')
  .addEventListener('click', () => {
    formSignin.style.left = "35px"
    formSignup.style.left = "450px"
    btnColor.style.left = "0px"
    msg.style.marginTop = "275px"
    msg.style.height = "60%"
    msg.style.transition = "all 450ms"
    container.style.height = "500px"
    container.style.transition = "all 500ms"
})

document.querySelector('#btnSignup')
  .addEventListener('click', () => {
    formSignin.style.left = "-450px"
    formSignup.style.left = "35px"
    btnColor.style.left = "110px"
    msg.style.height = "80%"
    msg.style.marginTop = "395px"
    msg.style.transition = "all 450ms"
    container.style.height = "590px"
    container.style.width = "370px"
    container.style.transition = "all 500ms"
})


