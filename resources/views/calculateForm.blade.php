<section class="d-flex justify-content-center align-items-center row col-12" style="min-height: 80vh">

    <form class="col-12 col-md-8 col-lg-8" method="post" action="{{ url('order-user') }}">
        @csrf
        <h1 class="text-center">Основные настройки</h1>
        <div class="d-flex col-12 justify-content-start">
            <div class="input-group">
                <div class="input-group-text">
                    <input class="form-check-input" type="radio" value="" name="matherial" aria-label="Radio button for following text input">
                </div>
                <span class="form-control">Пленка</span>
            </div>
            <div class="input-group">
                <div class="input-group-text">
                    <input class="form-check-input" type="radio" value="" name="matherial" aria-label="Radio button for following text input">
                </div>
                <span class="form-control">Пластик</span>
            </div>
            <div class="input-group">
                <div class="input-group-text">
                    <input class="form-check-input" type="radio" value="" name="matherial" aria-label="Radio button for following text input">
                </div>
                <span class="form-control">Эмаль</span>
            </div>
        </div>
        <h1 class="text-center">Вид Фасадов</h1>
        <div class="d-flex justify-content-between">
            <div class="input-group ">
                <span class="form-control" >Модерн</span>
                <div class="input-group-text">
                    <input class="form-check-input" type="radio" value="" name="facade" aria-label="Radio button for following text input">
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-2"></div>
            <div class="input-group ">
                <div class="input-group-text">
                    <input class="form-check-input" type="radio" value="" name="facade" aria-label="Radio button for following text input">
                </div>
                <span class="form-control">Современный</span>
            </div>
        </div>
        <h1>Дополнительные функции</h1>
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                </div>
                <span class="form-control">Верхние модули</span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                </div>
                <span class="form-control">Антресоли</span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                </div>
                <span class="form-control">Пеналы</span>
                <input type="number" class="form-control" aria-label="Text input with checkbox" placeholder="шт">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                </div>
                <span class="form-control">Бутылошница</span>
                <input type="number" class="form-control" aria-label="Text input with checkbox" placeholder="шт">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                </div>
                <span class="form-control">Столешница искусственный камень</span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                </div>
                <span class="form-control">Столешница пластик (максимальная длинна 2750)</span>
            </div>
        </div>
        <h1>Аксессуары</h1>
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                </div>
                <span class="form-control">Лоток под столовые приборы</span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                </div>
                <span class="form-control">Сушка для посуды в верхний модуль</span>
                <input type="number" class="form-control" aria-label="Text input with checkbox" placeholder="шт">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                </div>
                <span class="form-control">LED подсветка</span>
            </div>
        </div>
        <div class="card d-flex row justify-content-center flex-wrap text-center bg-success text-white">
            <input type="hidden" id="1" value="25000"/>
            <input type="hidden" id="2" value="25000"/>
            <input type="hidden" id="3" value="25000"/>
            <input type="hidden" id="4" value="25000"/>
            <input type="hidden" id="5" value="25000"/>
            <input type="hidden" id="kitchenLength" value="2500"/>
            <input type="hidden" id="kitchenHeight" value="2500"/>
            <h5 class="card-title" style="min-width: 50vw">Итоговая цена</h5>
            <h1 id="totalPrice" class="info card-text">0</h1>
            <a href="#" class="btn btn-secondary calculate">Сохранить</a>
        </div>
        <h1 class="text-center">Форма обратной связи</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email для связи с вами</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Мы не присылаем рекламу и спам</div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Дополнительная информация</label>
            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
    <p></p>
</section>
