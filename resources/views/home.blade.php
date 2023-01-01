@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Личный кабинет') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-unstyled form-text-link-dark">
                        <li class="list-unstyled"><a href="/">Главная</a></li>
                        <li class="list-unstyled"><a href="/admin/">Заказы пользователей</a></li>
                        <li class="list-unstyled"><a href="/admin/kitchen/edit/">Редактирование стоимости кухни</a></li>
                        <li class="list-unstyled"><a href="/admin/content/edit/">Редактирование страниц</a></li>
                        <li class="list-unstyled"><a href="/admin/offers/edit/">Редактирование товаров</a></li>
                        <li class="list-unstyled"><a href="/admin/complete-project/">Редактирование готовых проектов</a></li>
                    </ul>
                    {{ __('Вход выполнен успешно!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
