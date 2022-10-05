<section class="p-0 m-0 col-12 d-flex flex-wrap justify-content-start " style="min-height: 80vh">
    <table class="table xs-auto" >
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
        <div style="display: none">{{$i=1}}</div>
        @foreach($orders['data'] as $order)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td >{{$order['userEmail']}}</td>
                <td>{{$order['name']}}</td>
                <td ><a href="/cart/{{$order['id']}}">Детали</a></td>
                <td>{{$order['totalPrice']}}</td>
                <td>{{$order['status']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            @foreach($orders['links'] as $link)
                @if($link['active'] === true)
                    <li class="page-item active"><a class="page-link" href="{{$link['url']}}">{{$link['label']}}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{$link['url']}}">{{html_entity_decode($link['label'])}}</a></li>

                @endif
                    @endforeach

        </ul>
    </nav>

</section>
