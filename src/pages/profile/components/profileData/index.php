<form action="../../../controller/pages/profile.php" method="POST">
  <div class="inputsContainer">
    <div class="inputContainer">
      <label for="name">Nome</label>
      <input type="text" name="name" placeholder="Digite seu Nome (Obrigatório)" required value="<?php echo $user['name'] ?>">
    </div>
    <div class="inputContainer">
      <label for="CPF">CPF</label>
      <input type="text" name="CPF" placeholder="Digite seu CPF (opcional)" value="<?php echo $user['CPF'] ?>" onkeyup="maskCPF(this)" maxlength="14">
    </div>
    <div class="inputContainer">
      <label for="birthDate">Data de nascimento</label>
      <input type="text" name="birthDate" placeholder="Insira sua data de nascimento aqui (opcional)" value="<?php echo $user['birthDate'] ?>" onkeyup="maskDate(this)" maxlength="10">
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
<script>
  function getMaskCpf(value = '') {

    const numbers = value.replace(/\D/g, '');
    if (numbers.length <= 6) {
      const numbersMask = numbers.replace(/^(\d{3})(\d)/, '$1.$2');
      return numbersMask;
    }

    if (numbers.length < 10) {
      const numbersMask = numbers.replace(/^(\d{3})(\d{3})(\d)/, '$1.$2.$3');
      return numbersMask;
    }

    const numbersMask = numbers.replace(
      /^(\d{3})(\d{3})(\d{3})(\d)/,
      '$1.$2.$3-$4'
    );
    return numbersMask;
  }

  function maskCPF(input) {
    const value = input.value;
    input.value = getMaskCpf(value);
  }


  function getMaskDate(value) {
    const dateNumbers = value.replace(/\D/g, '');
    if (dateNumbers.length > 4) {
      const dateNumbersMask = dateNumbers.replace(
        /(\d{2})(\d{2})(\d)/,
        '$1/$2/$3'
      );
      return dateNumbersMask;
    }
    const dateNumbersMask = dateNumbers.replace(/^(\d{2})(\d)/, '$1/$2');
    return dateNumbersMask;
  }

  function maskDate(input) {
    const value = input.value;
    input.value = getMaskDate(value);
  }
</script>