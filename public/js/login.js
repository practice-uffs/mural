const form = document.getElementById('login-form')
const btn_submit = document.getElementById('btn-submit')
const btn_loading = document.getElementById('btn-loading')

btn_loading.style.visibility = "hidden";

form.addEventListener('submit', ()=>{
    btn_loading.style.visibility = "visible";
    btn_submit.remove();
})