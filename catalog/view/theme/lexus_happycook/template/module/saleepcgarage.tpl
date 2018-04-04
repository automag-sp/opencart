<div class="box hidden-xs">
    <div class="box-heading">Гараж</div>
    <div class="box-content filter-content">
      <?
      if (isset($g11)) {

        ?>
          <script type="text/javascript">
              (function ($) {
                  var mark_id_set = function () {
                      $('select[name=mark_id] option[value=<?php print $g11['mark_id']?>]').attr('selected', 'selected').trigger('change');
                  };
                  var model_id_set = function () {
                      if ($('#model_id').attr('disabled')) {
                          return 0;
                      }
                      $('#model_id').find('option[value=<?php print $g11['model_id']?>]').prop('selected', 'selected').trigger('change');
                      clearInterval(iModel);
                  };
                  var mod_id_set = function () {
                      if ($('#modification_id').attr('disabled')) {
                          return 0;
                      }
                      $('#modification_id').find('option[value=<?php print $g11['modification_id']?>]').prop('selected', 'selected').trigger('change');
                      clearInterval(iMod);
                  };
                  setTimeout(mark_id_set, 500);
                  var iModel = setInterval(model_id_set, 150);
                  var iMod = setInterval(mod_id_set, 150);
              })(jQuery)
          </script>
        <?
      }
      ?>
        <form action="/index.php?route=saleepc/general/save_model" method="POST">
            <div style="height: 27px">
                <select name="mark_id" id="mark_id">
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
                </select>&nbsp;&nbsp;
            </div>
            <div>
                <select name="model_id" id="model_id" disabled="disabled" title="Модель">
                    <option value="0">- Модель -</option>
                </select>
            </div>
            <div>
                <select name="modification_id" id="modification_id" disabled="disabled">
                    <option value="0">- Модификация -</option>
                </select>
            </div>
            <div class="garage">
                <input type="submit" class="button" id="garage_sbm" value="<?php print $submit_text ?>" disabled="disabled"/>
            </div>
        </form>
    </div>
</div>