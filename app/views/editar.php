<div class="row container">
  <div class="col s12">
    <h3 class="light">Alteração do Cadastro</h3>
  </div>

  <div class="col s12">
    <form action="?router=Site/editar/" method="post">
      <div class="input-field col s12">
        <label for="nome">Digite seu nome *</label>
        <input type="text" name="nome" id="nome" value="<?= $user['nome']; ?>" required>
      </div>

      <div class="input-field col s12 m6">
        <label for="email">Digite seu e-mail *</label>
        <input type="email" name="email" id="email" value="<?= $user['email']; ?>" required>
      </div>

      <div class="input-field col s12 m6">
        <label for="tel">Digite seu telefone</label>
        <input type="tel" name="tel" id="tel" value="<?= $user['tel']; ?>">
      </div>

      <div class="input-field col s12">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <input type="submit" value="Confirmar" class="btn-small">
        <input type="reset" value="limpar" class="btn-small red">
      </div>
    </form>
  </div>
</div>