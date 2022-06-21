<form action="../../../controller/pages/profile.php" method="POST">
  <div class="inputsContainer">
    <div class="inputContainer">
      <label for="name">Nome</label>
      <input type="text" name="name" placeholder="Digite seu Nome (Obrigatório)" required value="<?php echo $user['name'] ?>">
    </div>
    <div class="inputContainer">
      <label for="CPF">CPF</label>
      <input type="text" name="CPF" placeholder="Digite seu CPF (opcional)" value="<?php echo $user['CPF'] ?>">
    </div>
    <div class="inputContainer">
      <label for="birthDate">Data de nascimento</label>
      <input type="text" name="birthDate" placeholder="Insira sua data de nascimento aqui (opcional)" value="<?php echo $user['birthDate'] ?>">
    </div>
    <div class="inputContainer">
      <label for="avatar">avatar</label>
      <input type="url" name="avatar" placeholder="Insira seu avatar aqui (opcional)" value="<?php echo $user['avatar'] ?>">
    </div>
  </div>
  <div class="buttonContainer">
    <button type="submit" class="buttonSend">Salvar alterações 👉</button>
  </div>
</form>