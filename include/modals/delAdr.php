<?php check_prolog();

?>

<div id="modal-delAdr" class="modal modal-thanks">
    <form action="?"
          class="cabinet-address-formedit form">
    <div class="modal-body modal-edit" style="padding: 30px">
        <a href="#" class="modal-close-btn" aria-label="Закрыть">
            <svg width="24" height="24"><use xlink:href="#icon-close"/></svg>
        </a>
        <input  id = "idadr"   type="hidden" class="input cabinet-address-input-id" >
                <div class="cabinet-address-form-inputs">
                    <div class="cabinet-address-form-row flex-row">
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Название </span>
                                <input id = "nameadr" type="text"
                                       class="input cabinet-address-input-title"
                                       required>
                            </label>
                        </div>
                        <div class="cabinet-address-form-col flex-row-item">
                            <div class="form-block">
                                <span class="form-block-title">Населённый пункт</span>
                                <div id="one_string" class="form-block-select ordering-delivery-city-select">
                                    <input id = "city" name="address"  type="search" class="input cabinet-address-input-city" required>
                                </div>
                            </div>
                        </div>
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Улица</span>
                                <input id = "street" type="text"
                                       class="input cabinet-address-input-street"
                                       required>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="cabinet-address-form-inputs cabinet-address-form-inputs-small">
                    <div class="cabinet-address-form-row flex-row">
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Дом</span>
                                <input id = "home" type="text"
                                       class="input cabinet-address-input-home"
                                       required>
                            </label>
                        </div>
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Корпус</span>
                                <input id = "korpus" type="text"
                                       class="input cabinet-address-input-korpus">
                            </label>
                        </div>
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Строение</span>
                                <input id = "stroenie" type="text"
                                       class="input cabinet-address-input-stroenie">
                            </label>
                        </div>
                        <div class="cabinet-address-form-col flex-row-item">
                            <label class="form-block">
                                <span class="form-block-title">Квартира</span>
                                <input id = "kvartira" type="text"
                                       class="input cabinet-address-input-kvartira">
                            </label>
                        </div>
                    </div>
                </div>
                <label class="form-block">
                    <span class="form-block-title">Комментарий курьеру:</span>
                    <textarea id = "coment"
                            class="input textarea cabinet-address-input-comment"
                            placeholder="Напишите ваш комментарий"></textarea>
                </label>
                <div class="cabinet-address-form-submit-wrapp submit-wrapp">

                    <ul class="cabinet-address-form-btns">
                        <li>
                            <button class="btn btn-full btn-green submit">
                                Сохранить
                            </button>
                        </li>
                        <li>
                            <a href="#"
                               class="btn btn-full cabinet-address-form-del modal-close-link"">Отменить</a>
                        </li>
                    </ul>
                </div>
    </div>
    </form>
</div>

