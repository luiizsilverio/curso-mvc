<div class="row container">
  <div class="col s12">
    <h3 class="light">Consulta</h3>
  </div>

  <div class="col s12">
    <table>
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Ações</th>
      </tr>
        <?php foreach ($users as $user) { ?>
          <tr>
            <td><?= $user['nome']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['tel']; ?> </td>
            <td>
              <a href="?router=Site/edit/&id=<?= $user['id']; ?>">Alterar</a> |
              <a href="?router=Site/delete/&id=<?= $user['id']; ?>">Excluir</a>
            </td>
          </tr>
        <?php } ?>
    </table>
    
  </div>
</div>