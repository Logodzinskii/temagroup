<div class="modal offer" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title ">Форма обратной связи</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section class="modal-body p-0 m-3 d-flex justify-content-around align-items-start flex-wrap bg-dark text-white">
                <form class="container " id="orderForm">
                    @csrf
                    <h2 class="text-center">Свяжитесь со мной</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2 ">
                        <input type="hidden" name="category" value="0">
                        <input type="hidden" name="article" value="0">
                        <input type="hidden" name="sumForm" value="0">
                        <div class="col">
                            <div class="mb-6">
                                <label for="InputName" class="form-label">Ваше имя</label>
                                <input type="text" name="firstname" class="form-control" id="InputName" value="" data-valid="0" required>
                                <div class="valid-feedback">
                                    ok
                                </div>
                                <div class="invalid-feedback">
                                    Пожалуйста, сообщите ваше имя и фамилию.
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="InputEmail" class="form-label">Email для связи с вами</label>
                                <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" data-valid="0" required>
                                <div class="valid-feedback">
                                    ok
                                </div>
                                <div class="invalid-feedback">
                                    Пожалуйста, укажите вашу почту.
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="InputTel" class="form-label">Ваш контактный телефон</label>
                                <input type="tel" name="tel" class="form-control" id="InputTel" data-valid="0"/>
                                <div class="valid-feedback">
                                    ok
                                </div>
                                <div class="invalid-feedback">
                                    Пожалуйста, укажите вашу почту.
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-6">
                                <label for="Textarea" class="form-label">Дополнительная информация</label>
                                <textarea class="form-control" name="body" id="Textarea" rows="7" data-valid="0" placeholder="Например: уточнение по параметрам кухни, или необходимости индивидуального расчета" required></textarea>
                            </div>
                            <input type="hidden"  name="kitchenConfigurations" value="" />
                        </div>
                    </div>
                    <div class="mb-3 form-label">
                        <input type="checkbox" name="privacy" class="form-check-input form-control" id="exampleCheck1" data-valid="0">
                        <label class="form-check-label" for="exampleCheck1">Я соглашаюсь с <a href="/privacy/" class="link-secondary">политикой обработки персональных данных</a></label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-submit btn btn-sm" disabled>Отправить</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Сообщение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-success text-white">

                <p>Благодарим за ваше обращение в нашу компанию. </p>
                <p>Мы свяжемся с вами для уточнения заказа.</p>

            </div>
            <div class="bg-warning">
                <p>Окончательная стоимость заказа обговаривается
                    при заключении договора.
                    Стоимость указанная в расчете калькулятора не является окончательной.</p>
            </div>
        </div>
    </div>
</div>
