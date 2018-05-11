<h1>Labas, jūsų užsakymas</h1>


<li>Kiekis: {{ $total }}</li>
<li>Viso: {{ $totalPrice }}</li>
@foreach($products as $product)
    <li>{{ $product['dish']['title'] }}</li>
@endforeach
