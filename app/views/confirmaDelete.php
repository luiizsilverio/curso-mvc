<div class="row container">
  <div class="col s12">
    <h3 class="light"><?= $nome; ?></h3>
    <h4 class="light">Confirma exclusão desse Usuário?</h4>
    <p>
      <a href="?router=Site/excluir/&id=<?= $id; ?>" class="btn-small red">SIM</a>
      <a href="?router=Site/consulta/" class="btn-small">NÃO</a>
    </p>
  </div>
