Olá {{$user->name ?? "Cliente Practice"}}!
Sua solicitação "#{{$item->id ?? ""}} - {{$item->title ?? ""}}" mudou de status para: 

@if($item->status == 1)
    Aguardando Aprovação.
@elseif($item->status == 2)
    Em progresso.
@elseif($item->status == 3)
    Concluída.
@elseif($item->status == 4)
    Recusado.
@endif
 Para saber mais acesse sua solictação no nosso sistema