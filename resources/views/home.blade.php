@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        <li><a href="/" >Главная</a></li>
                        <li><a href="/admin/">Заказы пользователей</a></li>
                        <li><a href="/admin/kitchen/edit/">Редактирование стоимости кухни</a></li>
                        <li><a href="/admin/content/edit/">Редактирование страниц</a></li>
                        <li><a href="/admin/offers/edit/">Редактирование товаров</a></li>
                    </ul>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
