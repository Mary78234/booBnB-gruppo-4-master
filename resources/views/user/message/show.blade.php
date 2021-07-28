@extends('layouts.app')

@section('content')
<div class="container">
    <div class="messagio_am">
        <h2>title</h2>
        <h4>inviato da "mail" il "data</h4>
        <h4>"nome casa"</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci possimus quam, dignissimos asperiores, beatae sed odit rem laboriosam cumque neque laborum consequatur molestiae deserunt rerum veritatis? Labore similique pariatur voluptates unde, rem asperiores ullam inventore dolore veritatis impedit, officia dolorem perspiciatis animi! Corporis, reiciendis nihil officiis, adipisci aliquid, quam esse unde amet cumque itaque omnis! Numquam officia facere corporis fuga, magnam optio. In ipsum nemo voluptatum iure consequatur molestias facere dolore. Obcaecati, repellat laboriosam voluptates magnam exercitationem ipsam iusto! Quia provident dolorum id impedit ad minima odio suscipit est, tempora inventore animi atque. Ipsum eligendi error iste? Dicta minima iste, quos dignissimos suscipit rerum consectetur consequatur quibusdam distinctio deserunt mollitia? Repellat iusto et accusamus explicabo qui laudantium nulla ducimus repudiandae, nobis nostrum ad officia in quam labore, quasi ipsam? Recusandae error tempora distinctio modi similique optio aliquid excepturi repellendus nam, aut provident a praesentium veritatis aliquam, magnam perspiciatis laboriosam minima maiores officia assumenda perferendis exercitationem rem? Vero possimus accusamus suscipit fugit dignissimos exercitationem repellendus? Numquam corporis architecto omnis ipsum porro quibusdam, voluptate debitis inventore consectetur delectus aut quod, soluta temporibus possimus nam quia quis. Quos quod laborum sapiente. Rem expedita ex accusantium dicta sequi rerum labore corrupti repellendus ullam numquam.</p>
        <div>
            <a href="{{ route('user.message.index') }}">Torna a messaggi</a>
            <a href="/">Vedi la Casa</a>
        </div>
    </div>
</div>
@endsection