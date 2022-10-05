<section class="p-0 m-0 col-12 d-flex flex-wrap justify-content-start" style="min-height: 80vh">
    <table class="table xs-auto">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col" class="d-none d-lg-block">email</th>
            <th scope="col">name</th>
            <th scope="col" class="d-none d-lg-block">Кухня</th>
            <th scope="col">Итоговая цена</th>
            <th scope="col">Статус заказа</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">1</th>
                <td class="d-none d-lg-block">{{$order['userEmail']}}</td>
                <td>{{$order['name']}}</td>
                <td class="d-none d-lg-block">{{$order['kitchenConfigurations']}}</td>
                <td>{{$order['totalPrice']}}</td>
                <td>{{$order['status']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
