<div class="row container">
  <div class="col s12">
    <h3 class="light">Cadastro</h3>
  </div>

  <div class="col s12">
    <form action="?router=Site/cadastro/" method="post">
      <div class="input-field col s12">
        <label for="nome">Digite seu nome *</label>
        <input type="text" name="nome" id="nome" value="<?= $nome; ?>" required>
      </div>

      <div class="input-field col s12 m6">
        <label for="email">Digite seu e-mail *</label>
        <input type="email" name="email" id="email" value="<?= $email; ?>" required>
      </div>

      <div class="input-field col s12 m6">
        <label for="tel">Digite seu telefone</label>
        <input type="tel" name="tel" id="tel" value="<?= $tel; ?>">
      </div>

      <div class="input-field col s12">
        <?php if ($erro) { ?>
          <p class="red-text"><?= $erro; ?></p>
        <?php } ?>
        <input type="submit" value="enviar" class="btn-small">
        <input type="reset" value="limpar" class="btn-small red">
      </div>
    </form>
  </div>
</div>