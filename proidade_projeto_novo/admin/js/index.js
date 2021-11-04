let table = document.querySelector("#table_data");
let form = document.querySelector("#form_cadastro");
let btnHide = document.querySelector("#btn_hide_table");
let btnShow = document.querySelector("#btn_show_table");

btnHide.addEventListener("click", () => {
  table.style.display = "none";
  form.style.display = "block";
  btnHide.style.display = "none";
  btnShow.style.display = "block";
});

btnShow.addEventListener("click", () => {
  table.style.display = "block";
  form.style.display = "none";
  btnShow.style.display = "none";
  btnHide.style.display = "block";
});
