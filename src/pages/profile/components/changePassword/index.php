<form action="../../../controller/pages/changePassword.php" method="POST">
  <div class="inputsContainer">
    <div class="inputContainer">
      <label for="password">Senha</label>
      <input type="password" name="password" placeholder="Digite sua nova senha (Obrigatório)" required minlength="6">
    </div>
    <div class="inputContainer">
      <label for="passwordConfirm">Confirme sua senha</label>
      <input type="password" name="passwordConfirm" placeholder="Confirme sua senha (Obrigatório)" required minlength="6">
    </div>
  </div>
  <div class="buttonContainer">
    <button type="submit" class="buttonSend">Salvar alterações 👉</button>
  </div>
</form>