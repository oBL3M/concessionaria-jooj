
function idsearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sid");
  filter = input.value.toUpperCase();
  table = document.getElementById("lista");
  tr = table.getElementsByTagName("tr");


  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function marcasearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("smarca");
  filter = input.value.toUpperCase();
  table = document.getElementById("lista");
  tr = table.getElementsByTagName("tr");


  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function carrosearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("scarro");
  filter = input.value.toUpperCase();
  table = document.getElementById("lista");
  tr = table.getElementsByTagName("tr");


  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

var APP = {

  init: function () {
      var btnEnviar = document.querySelector("#btnEnviar");
      var btnsExcluir = document.querySelectorAll("table .delete");

      if (btnEnviar) {
          btnEnviar.addEventListener("click", function () {
              APP.enviarCarro();
          });
      }

      if (btnsExcluir) {
          for (btn of btnsExcluir) {
              btn.addEventListener("click", function (e) {
                  var id = e.currentTarget.getAttribute("data-id");
                  if (id && confirm("Tem certeza que deseja excluir o registro ID " + id + "?")) {
                      APP.excluirCarro(id);
                  }
              });
          }
      }

  },

  enviarCarro: function () {

      var form = document.querySelector("form");

      if (form.reportValidity()) {

          var id = document.querySelector("#id").value;
          var marca = document.querySelector("#marca").value;
          var carro = document.querySelector("#carro").value;
          var fab = document.querySelector("#fab").value;
          var quilometros = document.querySelector("#quilometros").value;
          var preco = document.querySelector("#preco").value;

          var formdata = new FormData();
          formdata.append("id", id);
          formdata.append("marca", marca);
          formdata.append("carro", carro);
          formdata.append("fab", fab);
          formdata.append("quilometros", quilometros);
          formdata.append("preco", preco);

          var requestOptions = {
              method: 'POST',
              body: formdata,
              redirect: 'follow'
          };

          var codigoHttp = null;
          var operacao = "insert";
          var rota = "mvc/action/AddCarro.php";

          if (id && id > 0) {
              operacao = "update";
              rota = "mvc/action/AlterarCarro.php";
          }

          fetch(rota, requestOptions)
              .then(response => {
                  codigoHttp = response.status;
                  return response.text()
              })
              .then(message => {
                  if (codigoHttp == 200) {

                      if (operacao == "insert") {
                          alert("Carro foi cadastrado com o código " + message);
                      } else {
                          alert("Dados do carro foram atualizados");
                      }

                  } else if (codigoHttp == 422) {
                      alert("Dados inválidos! Verifique se os campos estão preenchidos corretamente e tente novamente.");
                  } else if (codigoHttp == 500) {
                      alert("Erro: " + message);
                  } else {
                      alert("Erro " + message);
                  }
              }
              );
      }
  },

  excluirCarro: function (id) {
      var codigoHttp = null;
      var formdata = new FormData();
      formdata.append("id", id);

      var requestOptions = {
          method: 'POST',
          body: formdata,
          redirect: 'follow'
      };

      fetch("mvc/action/ExcluirCarro.php", requestOptions)
          .then(response => {
              codigoHttp = response.status;
              return response.text();
          })
          .then(message => {
              if (codigoHttp == 200) {
                  window.location.reload();
              } else {
                  alert("Erro " + message);
              }
          }).catch(message => {
              alert("Erro " + message);
          });
  }

}

APP.init();