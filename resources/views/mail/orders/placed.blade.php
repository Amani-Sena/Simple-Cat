<x-mail::message>
# Pedido Realizado com sucesso!

Agradecemos sinceramente pelo seu pedido! Estamos felizes por você ter escolhido nossa empresa e já estamos trabalhando para o envio. O número do seu pedido é: {{ $order->id }}

<x-mail::button :url="$url">
Ver pedido
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
