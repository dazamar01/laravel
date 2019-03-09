function creteDynamicAlert(divContenedor, tipo, mensaje) {
  let tipoAlerta = null;
  switch (tipo) {
    case "success":
      tipoAlerta = 'success';
      break;
    case "warning":
      tipoAlerta = 'warning';
      break;
    case "danger":
      tipoAlerta = 'danger';
      break;
    default:
      tipoAlerta = 'info';
      break;
  }

  let numero = Math.floor(Math.random() * 1000) + 1;
  let elidentificador = 'div-fg-' + numero;
  let alerta = $(`
<div id="${elidentificador}" class="alert alert-${tipoAlerta} alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    ${mensaje}
    <br>
</div>
    `).clone();

  $('#' + divContenedor).append(alerta);
}