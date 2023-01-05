@h2dk(Готовы сделать заказ?)
<section class="p-0 m-0 d-flex justify-content-around align-items-start flex-wrap" id="form">
    <form class="" id="orderForm">
        <h2>Отправьте заявку на расчет</h2>
        @csrf
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
        <div class="mb-6">
            <label for="Textarea" class="form-label">Дополнительная информация</label>
            <textarea class="form-control" name="body" id="Textarea" rows="3" data-valid="0" placeholder="Например: уточнение по параметрам кухни, или необходимости индивидуального расчета" required></textarea>
        </div>
        <input type="hidden" class="sumForm" name="sumForm" value="0"/>
        <input type="hidden"  name="kitchenConfigurations" value="Default" />
        <button type="submit" class="btn btn-outline-secondary btn-submit col-10 col-sm-10 col-md-6 " disabled>
            Отправить
            <div class="btn-outline-secondary-inners"></div>
        </button>
    </form>
    <div class="" style="max-width: 400px">
        <h2 class="card-title text-center">Или воспользуйтесь калькулятором</h2>
        <img src="{{asset('images/k3.jpg')}}"  class="card-img-top" alt="кухня на заказ компания-тема">
        <div class="card-body d-flex justify-content-center">
            <a href="/calculate/modelfirst" class="btn btn-outline-secondary">
                Расчитать
                <div class="btn-outline-secondary-inners"></div>
            </a>
        </div>
    </div>

</section>
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
