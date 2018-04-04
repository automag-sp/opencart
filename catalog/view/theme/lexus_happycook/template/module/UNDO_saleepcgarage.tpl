<div class="box">
  <div class="box-heading">Гараж</div>
  <div class="box-content">
    <?
    //if (iss($_COOKIE["garage"]));
    ?>
    <form action="#" method="get">
      <input type="hidden" name="garage" value="set" />
      <table class="CarDrpDn">
        <tr><td>
            <select name="mark_id" id="mark_id" class="StyleSelectBox">
              <option value="0">- Марка -</option>
              <option value="502">Alfa Romeo</option>
              <option value="504">Audi</option>
              <option value="511">BMW</option>
              <option value="602">Chevrolet</option>
              <option value="514">Citroen</option>
              <option value="649">Daewoo</option>
              <option value="524">Fiat</option>
              <option value="525">Ford</option>
              <option value="533">Honda</option>
              <option value="647">Hyundai</option>
              <option value="1234">Infiniti</option>
              <option value="540">Jaguar</option>
              <option value="648">Kia</option>
              <option value="546">Lancia</option>
              <option value="1292">Land Rover</option>
              <option value="874">Lexus</option>
              <option value="552">Mazda</option>
              <option value="553">Mercedes</option>
              <option value="555">Mitsubishi</option>
              <option value="558">Nissan</option>
              <option value="561">Opel</option>
              <option value="563">Peugeot</option>
              <option value="565">Porsche</option>
              <option value="566">Renault</option>
              <option value="568">Rover</option>
              <option value="569">Saab</option>
              <option value="573">Seat</option>
              <option value="575">Skoda</option>
              <option value="639">Ssang Yong</option>
              <option value="576">Subaru</option>
              <option value="577">Suzuki</option>
              <option value="579">Toyota</option>
              <option value="587">Volkswagen</option>
              <option value="586">Volvo</option>
            </select>&nbsp;&nbsp;</td></tr>
        <tr><td>
            <select name="model_id" id="model_id" disabled="disabled" class="StyleSelectBox">
              <option value="0">- Модель -</option>
            </select>
          </td></tr><tr><td>
            <select name="modification_id" id="modification_id" disabled="disabled" class="StyleSelectBox">
              <option value="0">- Модификация -</option>
            </select>
          </td></tr><tr><td><input type="submit" id="garage_sbm" value="Запомнить" disabled="disabled" /> </td></tr>
      </table>
    </form>
  </div>
</div>